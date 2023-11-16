<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerView;
use App\Http\Controllers\Admin\AdminPage;
use App\Http\Controllers\Admin\ControllerProductManager;
use App\Http\Controllers\ControllerUser;

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
    Route::get('product', [ControllerView::class, 'product'])->name('product');
    Route::get('checkout', [ControllerView::class, 'checkout'])->name('checkout');
    Route::get('cart', [ControllerView::class, 'cart'])->name('cart');
    Route::get('grid', [ControllerView::class, 'grid'])->name('grid');
    Route::get('account', [ControllerView::class, 'account'])->name('account');
    Route::get('wishlist', [ControllerView::class, 'wishlist'])->name('wishlist');
});
Route::prefix('login')->group(function () {
    Route::get('/', [ControllerUser::class, 'LoginView'])->name('loginview');
    Route::post('register', [ControllerUser::class, 'Register'])->name('register');
    Route::post('login', [ControllerUser::class, 'Login'])->name('login');
});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminPage::class, 'dashboard'])->name('dashboard');

    Route::get('/dashboard', [AdminPage::class, 'dashboard']);
    Route::prefix('product')->group(function () {
        Route::get('/', [ControllerProductManager::class, 'table'])->name('product.table');
        Route::get('create', [ControllerProductManager::class, 'create'])->name('product.create');
        Route::post('create_handle', [ControllerProductManager::class, 'create_handler'])->name('product.create.handle');
        Route::get('edit/{id}', [ControllerProductManager::class, 'edit'])->name('product.edit');
        Route::post('edit_handle/{id}', [ControllerProductManager::class, 'edit_handle'])->name('product.edit.handle');
        Route::get('delete/{id}', [ControllerProductManager::class, 'delete'])->name('product.delete');
    });
});
