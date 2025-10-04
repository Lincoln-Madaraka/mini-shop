<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $user = $request->user();
        $items = $request->validated()['items'];

        return DB::transaction(function () use ($items, $user) {
            $order = Order::create([
                'user_id' => $user->id,
                'total' => 0,
            ]);

            $total = 0;

            foreach ($items as $item) {
                $product = Product::findOrFail($item['product_id']);

                if ($product->stock < $item['qty']) {
                    return response()->json([
                        'error' => "Insufficient stock for {$product->name}"
                    ], 422);
                }

                $lineTotal = $product->price * $item['qty'];
                $total += $lineTotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $item['qty'],
                    'unit_price' => $product->price,
                    'line_total' => $lineTotal,
                ]);

                $product->decrement('stock', $item['qty']);
            }

            $order->update(['total' => $total]);

            return response()->json($order->load('items.product'));
        });
    }
}
