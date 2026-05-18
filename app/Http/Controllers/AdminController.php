<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $userCount = User::count();

        return view('admin.dashboard', compact('productCount', 'userCount'));
    }
}
