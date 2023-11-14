<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerView;
use App\Http\Controllers\Admin\AdminPage;
use App\Http\Controllers\Admin\ControllerProductManager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', [ControllerView::class, 'home'])->name('home');
    Route::get('login', [ControllerView::class, 'login'])->name('login');
    Route::get('product', [ControllerView::class, 'product'])->name('product');
    Route::get('checkout', [ControllerView::class, 'checkout'])->name('checkout');
    Route::get('cart', [ControllerView::class, 'cart'])->name('cart');
    Route::get('grid', [ControllerView::class, 'grid'])->name('grid');
    Route::get('account', [ControllerView::class, 'account'])->name('account');
    Route::get('wishlist', [ControllerView::class, 'wishlist'])->name('wishlist');
});
Route::prefix('user')->group(function () {
});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminPage::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard', [AdminPage::class, 'dashboard']);
    Route::prefix('product')->group(function () {
        Route::get('/', [ControllerProductManager::class, 'table'])->name('product.table');
        Route::get('create', [ControllerProductManager::class, 'create'])->name('product.crate');
        Route::get('delete', [ControllerProductManager::class, 'delete']);
        Route::get('detail', [ControllerProductManager::class, 'view']);
    });
});
