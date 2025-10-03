<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $cart = Session::get('cart', []);

        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => ($cart[$product->id]['quantity'] ?? 0) + 1,
        ];

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
