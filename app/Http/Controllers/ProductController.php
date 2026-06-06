<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('game', 'like', '%' . $request->search . '%')
                ->orWhere('category', 'like', '%' . $request->search . '%')
                ->orWhere('type', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->sort == 'cheapest') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'expensive') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest();
        }

        $products = $query->get();

        $wishlistProductIds = [];

        if (auth()->check()) {
            $wishlistProductIds = Wishlist::where('user_id', auth()->id())
                ->pluck('product_id')
                ->toArray();
        }

        return view('products.index', compact('products', 'wishlistProductIds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        $isWishlisted = false;

        if (auth()->check()) {
            $isWishlisted = Wishlist::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->exists();
        }

        return view('products.show', compact('product', 'relatedProducts', 'isWishlisted'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function addToCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['nullable', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($id);

        $quantity = (int) ($request->quantity ?? 1);

        if ($product->stock <= 0) {
            return back()->with('error', 'This product is out of stock.');
        }

        if ($quantity > $product->stock) {
            return back()->with(
                'error',
                'Only ' . $product->stock . ' item(s) are available.'
            );
        }

        $cart = session()->get('cart', []);

        $currentQuantity = $cart[$id]['quantity'] ?? 0;
        $newQuantity = $currentQuantity + $quantity;

        if ($newQuantity > $product->stock) {
            return back()->with(
                'error',
                'You cannot add more than the available stock. Available stock: ' .
                $product->stock
            );
        }

        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => $newQuantity,
        ];

        session()->put('cart', $cart);

        return redirect('/cart')
            ->with('success', 'Product added to cart.');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('products.cart', compact('cart'));
    }
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }
    public function increaseCart($id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect('/cart');
        }

        $product = Product::findOrFail($id);

        $newQuantity = $cart[$id]['quantity'] + 1;

        if ($newQuantity > $product->stock) {
            return redirect('/cart')->with(
                'error',
                'Maximum available stock is ' . $product->stock . '.'
            );
        }

        $cart[$id]['quantity'] = $newQuantity;

        session()->put('cart', $cart);

        return redirect('/cart')
            ->with('success', 'Cart quantity updated.');
    }
    public function decreaseCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);
            }

            session()->put('cart', $cart);
        }

        return redirect('/cart');
    }

    public function toggleWishlist($id)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $wishlistItem = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->first();

        if ($wishlistItem) {
            $wishlistItem->delete();
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
            ]);
        }

        return back();
    }
    public function wishlist()
    {
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('products.wishlist', compact('wishlistItems'));
    }
}
