<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/products');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('products', ProductController::class);
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart']);

Route::get('/cart', [ProductController::class, 'cart']);
Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart']);
Route::post('/cart/increase/{id}', [ProductController::class, 'increaseCart']);
Route::post('/cart/decrease/{id}', [ProductController::class, 'decreaseCart']);

Route::get('/checkout', [ProductController::class, 'checkout']);
Route::post('/checkout/pay', [ProductController::class, 'pay']);

Route::get('/order-success', [ProductController::class, 'orderSuccess']);
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/products', [AdminProductController::class, 'index']);
    Route::get('/admin/products/create', [AdminProductController::class, 'create']);
    Route::post('/admin/products/store', [AdminProductController::class, 'store']);
    Route::delete('/admin/products/delete/{id}', [AdminProductController::class, 'destroy']);
    Route::get('/admin/products/edit/{id}', [AdminProductController::class, 'edit']);
    Route::put('/admin/products/update/{id}', [AdminProductController::class, 'update']);
});


