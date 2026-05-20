<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }
    public function create()
    {
        return view('admin.products.create');
    }
    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'game' => $request->game,
            'category' => $request->category,
            'type' => $request->type,
            'image' => $request->image,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect('/admin/products');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/admin/products');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'game' => $request->game,
            'category' => $request->category,
            'type' => $request->type,
            'image' => $request->image,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect('/admin/products');
    }
}
