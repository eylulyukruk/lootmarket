<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\SupportMessageController;
use App\Http\Controllers\AdminSupportMessageController;
use App\Http\Controllers\OrderController;
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
    Route::get('/support-messages', [SupportMessageController::class, 'index']);
    Route::post('/support-messages', [SupportMessageController::class, 'store']);
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

Route::get('/checkout', [OrderController::class, 'checkout']);
Route::post('/checkout/pay', [OrderController::class, 'pay']);
Route::get('/order-success', [OrderController::class, 'orderSuccess']);
Route::get('/my-orders', [OrderController::class, 'myOrders']);
Route::post('/wishlist/toggle/{id}', [ProductController::class, 'toggleWishlist'])->middleware('auth');

Route::get('/wishlist', [ProductController::class, 'wishlist'])->middleware('auth');


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/products', [AdminProductController::class, 'index']);
    Route::get('/admin/products/create', [AdminProductController::class, 'create']);
    Route::post('/admin/products/store', [AdminProductController::class, 'store']);
    Route::delete('/admin/products/delete/{id}', [AdminProductController::class, 'destroy']);
    Route::get('/admin/products/edit/{id}', [AdminProductController::class, 'edit']);
    Route::put('/admin/products/update/{id}', [AdminProductController::class, 'update']);
    Route::get('/admin/orders', [AdminOrderController::class, 'index']);
    Route::post('/admin/orders/update-status/{id}', [AdminOrderController::class, 'updateStatus']);
    Route::get('/admin/users', [AdminUserController::class, 'index']);
    Route::get('/admin/categories', [AdminCategoryController::class, 'index']);
    Route::get(
        '/admin/support-messages',
        [AdminSupportMessageController::class, 'index']
    );

    Route::post(
        '/admin/support-messages/{id}/reply',
        [AdminSupportMessageController::class, 'reply']
    );
});


