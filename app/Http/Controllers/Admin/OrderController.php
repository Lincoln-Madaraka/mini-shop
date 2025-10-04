<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of all orders.
     */
    public function index()
    {
        $orders = Order::with(['user', 'items.product'])->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display a specific order.
     */
    public function show($id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }
}
