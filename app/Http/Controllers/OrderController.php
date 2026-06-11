<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect('/cart')
                ->with('error', 'Your cart is empty.');
        }

        return view('products.checkout', compact('cart'));
    }

    public function pay(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'phone_code' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:1000'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:50'],
            'shipping_method' => ['required', 'in:Free Shipping,Standard Shipping'],
            'payment_method' => ['required', 'in:Credit Card,Direct Bank Transfer,Cash on Delivery'],
        ]);

        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect('/cart')
                ->with('error', 'Your cart is empty.');
        }

        try {
            $orderId = DB::transaction(function () use ($cart, $request) {
                $subtotal = 0;
                $products = [];

                foreach ($cart as $productId => $item) {
                    $product = Product::where('id', $productId)
                        ->lockForUpdate()
                        ->firstOrFail();

                    if ($product->stock < $item['quantity']) {
                        throw new \Exception(
                            $product->name .
                            ' does not have enough stock. Available stock: ' .
                            $product->stock
                        );
                    }

                    $subtotal += $product->price * $item['quantity'];

                    $products[$productId] = $product;
                }

                $shippingPrice =
                    $request->shipping_method === 'Standard Shipping'
                        ? 4
                        : 0;

                $tax = round($subtotal * 0.08, 2);

                $grandTotal = $subtotal + $shippingPrice + $tax;

                $order = Order::create([
                    'user_id' => auth()->id(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => trim($request->phone_code . ' ' . $request->phone),
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'zip_code' => $request->zip_code,
                    'subtotal' => $subtotal,
                    'shipping_price' => $shippingPrice,
                    'total' => $grandTotal,
                    'shipping_method' => $request->shipping_method,
                    'payment_method' => $request->payment_method,
                    'status' => 'Pending',
                ]);

                foreach ($cart as $productId => $item) {
                    $product = $products[$productId];

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_name' => $product->name,
                        'product_image' => $product->image,
                        'price' => $product->price,
                        'quantity' => $item['quantity'],
                    ]);

                    $product->decrement('stock', $item['quantity']);
                }
                return $order->id;
            });
        } catch (\Exception $exception) {
            return redirect('/cart')
                ->with('error', $exception->getMessage());
        }

        session()->forget('cart');
        session()->put('last_order_id', $orderId);

        return redirect('/order-success')
            ->with('success', 'Your order has been placed successfully.');
    }

    public function orderSuccess()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $orderId = session()->get('last_order_id');

        if (!$orderId) {
            return redirect('/my-orders');
        }

        $order = Order::with('items')
            ->where('id', $orderId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('products.order-success', compact('order'));
    }

    public function myOrders()
    {
        $orders = Order::with('items')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('products.my-orders', compact('orders'));
    }
}
