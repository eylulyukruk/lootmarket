<?php

namespace App\Http\Controllers;

use App\Models\Product;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Product::select('category')
            ->selectRaw('COUNT(*) as product_count')
            ->selectRaw('SUM(stock) as total_stock')
            ->selectRaw('AVG(price) as average_price')
            ->groupBy('category')
            ->orderBy('category')
            ->get();

        return view('admin.categories.index', compact('categories'));
    }
}
