<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Shop\CheckoutController;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\ProductController as ShopProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'can:admin-login'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::middleware('can:admin-only')->group(function () {
        Route::resource('product', ProductController::class);
        Route::resource('users', UserController::class);
        Route::resource('orders', AdminOrderController::class)->only(['index', 'show']);
    });
    Route::get('/show-single-assigned-product/{id}', [ProductController::class, 'showSingleAssignedProduct'])->name('single_assign_product.show');
    Route::post('/complete-product/{id}', [ProductController::class, 'productCompleteButton'])->name('complete_product.store');

});
Route::get('/products/{product}', [ShopProductController::class, 'show'])
    ->name('products.show')
    ->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('shop.checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('shop.checkout.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('shop.orders');
});

Route::post('/cart/{product}/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('shop.cart')->middleware('auth');
Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('cart.remove')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
