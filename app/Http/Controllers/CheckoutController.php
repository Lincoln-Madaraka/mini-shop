<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

class CheckoutController extends Controller
{
    /**
     * Handle checkout and create order.
     */
    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return back()->withErrors(['cart' => 'Your cart is empty.']);
        }

        DB::beginTransaction();

        try {
            $total = 0;

            // lock products and validate stock
            foreach ($cart as $line) {
                $product = Product::lockForUpdate()->find($line['product_id']);
                if (!$product || $product->stock < $line['qty']) {
                    throw new \Exception("Insufficient stock for {$line['name']}.");
                }
            }

            // create order
            $order = Order::create([
                'user_id' => auth()->id(),
                'total'   => 0, // update later
            ]);

            // create order items & decrement stock
            foreach ($cart as $line) {
                $product   = Product::find($line['product_id']);
                $unit      = $product->price;
                $lineTotal = $unit * $line['qty'];

                $order->orderItems()->create([
                    'product_id' => $product->id,
                    'qty'        => $line['qty'],
                    'unit_price' => $unit,
                    'line_total' => $lineTotal,
                ]);

                $product->decrement('stock', $line['qty']);
                $total += $lineTotal;
            }

            // update order total
            $order->update(['total' => $total]);

            DB::commit();

            // clear cart
            session()->forget('cart');

            return redirect()->route('orders.show', $order->id)
                             ->with('success', 'Order placed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['checkout' => $e->getMessage()]);
        }
    }
}
