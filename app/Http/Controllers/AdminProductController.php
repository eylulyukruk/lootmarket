<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $products = $query->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'game' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'rarity' => [
                'nullable',
                'in:Mil-Spec,Restricted,Classified,Covert,Rare Special',
            ],
            'image' => ['nullable', 'image', 'max:4096'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $storedPath = $request->file('image')
                ->store('products', 'public');

            $imagePath = '/storage/' . $storedPath;
        }

        Product::create([
            'name' => $request->name,
            'game' => $request->game,
            'category' => $request->category,
            'type' => $request->type,
            'rarity' => $request->rarity,
            'image' => $imagePath,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect('/admin/products')
            ->with('success', 'Product added successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/products')
            ->with('success', 'Product deleted successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'game' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:255'],
            'rarity' => [
                'nullable',
                'in:Mil-Spec,Restricted,Classified,Covert,Rare Special',
            ],
            'image' => ['nullable', 'image', 'max:4096'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
        ]);


        $product = Product::findOrFail($id);

        $data = [
            'name' => $request->name,
            'game' => $request->game,
            'category' => $request->category,
            'type' => $request->type,
            'rarity' => $request->rarity,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            $storedPath = $request->file('image')
                ->store('products', 'public');

            $data['image'] = '/storage/' . $storedPath;
        }

        $product->update($data);

        return redirect('/admin/products')
            ->with('success', 'Product updated successfully.');
    }
}
