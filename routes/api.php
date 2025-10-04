<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderController as ApiOrderController; 
use App\Http\Controllers\Api\ProductController as ApiProductController;


Route::get('/products', [ApiProductController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/orders', [ApiOrderController::class, 'store']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
