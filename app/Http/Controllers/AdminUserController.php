<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->get();

        return view('admin.users.index', compact('users'));
    }
}
