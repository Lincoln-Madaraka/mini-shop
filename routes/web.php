<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController; // public catalog controller
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// auth routes (Breeze)
require __DIR__.'/auth.php';

// login routes already set by Breeze; if you manually defined login route, ensure import above

// after login, redirect based on role (we'll patch the Auth controller below)

// Public catalog
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Cart & checkout (customer)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { // customer dashboard
        return view('customer.dashboard');
    })->name('customer.dashboard');

    Route::get('/cart', [CartController::class,'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class,'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class,'remove'])->name('cart.remove');

    Route::post('/checkout', [CheckoutController::class,'store'])->name('checkout.store');

    // optional: order viewing for customer
    Route::get('/orders/{order}', [CheckoutController::class,'show'])->name('orders.show');
});

// Admin routes
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('products', AdminProductController::class);
});
