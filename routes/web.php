<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PayslipController;
use App\Http\Controllers\UserPayslipController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'can:admin-login'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::middleware('can:admin-only')->group(function () {
        Route::resource('product', ProductController::class);
        Route::resource('users', UserController::class);

        Route::get('/payslips', [PayslipController::class, 'index'])->name('payslips.index');
        Route::get('/payslips/{product}', [PayslipController::class, 'show'])->name('payslips.show');
        Route::get('/payslips/{product}/download', [PayslipController::class, 'download'])->name('payslips.download');
    });

    Route::get('/assigned-salaries', [ProductController::class, 'showAuthAssignedSalaries'])->name('auth_salaries.index');
    Route::get('/show-single-assigned-product/{id}', [ProductController::class, 'showSingleAssignedProduct'])->name('single_assign_product.show');
    Route::post('/complete-product/{id}', [ProductController::class, 'productCompleteButton'])->name('complete_product.store');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/my-payslips/{product}/download', [UserPayslipController::class, 'download'])
        ->name('user.payslips.download');
});

require __DIR__.'/auth.php';
