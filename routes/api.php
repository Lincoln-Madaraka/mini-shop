<?php

use App\Http\Controllers\Api\ProductController as ApiProductController;
use App\Http\Controllers\Api\OrderController as ApiOrderController;

Route::get('products', [ApiProductController::class, 'index']);

// For POST /api/orders you can require auth:sanctum else another guard
Route::middleware('auth:sanctum')->post('orders', [ApiOrderController::class, 'store']);
