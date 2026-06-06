<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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

    public function pay()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect('/cart')
                ->with('error', 'Your cart is empty.');
        }

        try {
            DB::transaction(function () use ($cart) {
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

                $tax = round($subtotal * 0.08, 2);
                $grandTotal = $subtotal + $tax;

                $order = Order::create([
                    'user_id' => auth()->id(),
                    'total' => $grandTotal,
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

                    $product->decrement(
                        'stock',
                        $item['quantity']
                    );
                }
            });
        } catch (\Exception $exception) {
            return redirect('/cart')
                ->with('error', $exception->getMessage());
        }

        session()->forget('cart');

        return redirect('/order-success')
            ->with(
                'success',
                'Your order has been placed successfully.'
            );
    }

    public function orderSuccess()
    {
        return view('products.order-success');
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
