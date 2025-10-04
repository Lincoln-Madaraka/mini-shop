<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Start a query builder instance
        $products = Product::query();

        // Filter by stock / high/low price
        if ($filter = request('filter')) {
            if ($filter === 'low_stock') {
                $products->where('stock', '<', 5);
            } elseif ($filter === 'high_price') {
                $products->orderBy('price', 'desc');
            } elseif ($filter === 'low_price') {
                $products->orderBy('price', 'asc');
            }
        }

        $minPrice = request('min_price');
        $maxPrice = request('max_price');

        if ($minPrice !== null && $minPrice !== '') {
            $products->where('price', '>=', $minPrice);
        }
        if ($maxPrice !== null && $maxPrice !== '') {
            $products->where('price', '<=', $maxPrice);
        }

        $products = $products->get();

        return view('dashboard', compact('products'));
    }
}
