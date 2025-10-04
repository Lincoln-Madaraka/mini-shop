<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('shop.checkout', compact('cart', 'total'));
    }

    /**
     * Store a new order and clear the cart.
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('shop.cart')->with('error', 'Your cart is empty.');
        }

        // Calculate total
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        // Create order items and reduce stock
        foreach ($cart as $productId => $item) {
            $product = Product::find($productId);

            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'qty' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'line_total' => $item['price'] * $item['quantity'],
                ]);

                // Reduce product stock
                $product->decrement('stock', $item['quantity']);
            }
        }

        // Clear the cart
        session()->forget('cart');

        // Redirect with success message
       return redirect()->route('shop.checkout')->with([
        'order_success' => true,
        'order_id' => $order->id,
        'order_cart_items' => $cart
    ]);
    }

    /**
     * The other methods can stay empty for now.
     */
    public function create() {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
