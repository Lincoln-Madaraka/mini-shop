<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === "admin") {

            $users = User::count();
            $salaries = Product::count();

            return view('admin.index', compact('users', 'salaries'));
        } 
    }
}
