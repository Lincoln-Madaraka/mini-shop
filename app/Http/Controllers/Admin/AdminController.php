<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
   public function index()
    {
        $usersCount = User::count();
        $productCount = Product::count();
        $ordersCount = Order::count();

        return view('admin.index', compact('usersCount', 'productCount', 'ordersCount'));
    }
}
