<?php

namespace App\Http\Controllers\Shop;

use App\Models\Product;  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product)
    {
        // simple safe session cart logic (won't exceed stock)
        $cart = session()->get('cart', []);

        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'Product is out of stock.');
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = min($cart[$product->id]['quantity'] + 1, $product->stock);
        } else {
            $cart[$product->id] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => 1,
                'stock'    => $product->stock,
                'image'    => $product->image,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
