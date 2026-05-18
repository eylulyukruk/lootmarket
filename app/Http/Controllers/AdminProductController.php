<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
}
