<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // <-- IMPORTANT
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('shop.cart', compact('cart'));
    }

    public function add(Product $product)
    {
        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'Product is out of stock.');
        }

        $cart = session()->get('cart', []);

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

        // where to redirect: back to previous page
        return redirect()->back()->with('success', 'Product added to cart!');
        // OR: go straight to cart page:
        // return redirect()->route('cart.index')->with('success','Product added to cart!');
    }

    public function update(Request $request, Product $product)
    {
        $quantity = (int) $request->input('quantity', 1);
        $quantity = max(1, $quantity);
        if ($quantity > $product->stock) {
            return redirect()->back()->with('error', 'Quantity exceeds stock.');
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $quantity;
            session(['cart' => $cart]);
        }

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session(['cart' => $cart]);
        }
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
}
