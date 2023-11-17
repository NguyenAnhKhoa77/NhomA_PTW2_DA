<?php

use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerView;
use App\Http\Controllers\Admin\AdminPage;
use App\Http\Controllers\Admin\ControllerBillsManager;
use App\Http\Controllers\Admin\ControllerCategoryManager;
use App\Http\Controllers\Admin\ControllerManufacturersManager;
use App\Http\Controllers\Admin\ControllerProductManager;
use App\Http\Controllers\Admin\ControllerUsersManager;
use App\Http\Controllers\ControllerGridPage;
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
    Route::prefix('grid')->group(function () {
        Route::get('/', [ControllerGridPage::class, 'index'])->name('grid');
    });
    Route::get('cart', [ControllerView::class, 'cart'])->name('cart');
    Route::get('account', [ControllerView::class, 'account'])->name('account');
    Route::prefix('wishlist')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('wishlist');
        Route::get('/add/{product}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
        Route::delete('/remove/{product}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    });

    Route::get('/search', [ControllerView::class, 'getSearch'])->name('search');
});
Route::prefix('login')->group(function () {
    Route::get('/', [ControllerUser::class, 'LoginView'])->name('loginview');
    Route::post('register', [ControllerUser::class, 'Register'])->name('register');
    Route::post('login', [ControllerUser::class, 'Login'])->name('login');
    Route::post('sign-out', [ControllerUser::class, 'signOut'])->name('sign-out');
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
    Route::prefix('category')->group(function () {
        Route::get('/', [ControllerCategoryManager::class, 'index'])->name('category.table');
        Route::get('create', [ControllerCategoryManager::class, 'create'])->name('category.create');
        Route::post('store', [ControllerCategoryManager::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [ControllerCategoryManager::class, 'edit'])->name('category.edit');
        Route::post('update/{id}', [ControllerCategoryManager::class, 'update'])->name('category.update');
        Route::get('destroy/{id}', [ControllerCategoryManager::class, 'destroy'])->name('category.destroy');
        Route::get('show', [ControllerCategoryManager::class, 'show'])->name('category.show');
    });

    Route::prefix('manufacture')->group(function () {
        Route::get('/', [ControllerManufacturersManager::class, 'index'])->name('manufacture.table');
        Route::get('create', [ControllerManufacturersManager::class, 'create'])->name('manufacture.create');
        Route::post('store', [ControllerManufacturersManager::class, 'store'])->name('manufacture.store');
        Route::get('edit/{id}', [ControllerManufacturersManager::class, 'edit'])->name('manufacture.edit');
        Route::post('update/{id}', [ControllerManufacturersManager::class, 'update'])->name('manufacture.update');
        Route::get('destroy/{id}', [ControllerManufacturersManager::class, 'destroy'])->name('manufacture.destroy');
        Route::get('show', [ControllerManufacturersManager::class, 'show'])->name('manufacture.show');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [ControllerUsersManager::class, 'index'])->name('user.table');
        Route::get('create', [ControllerUsersManager::class, 'create'])->name('user.create');
        Route::post('store', [ControllerUsersManager::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [ControllerUsersManager::class, 'edit'])->name('user.edit');
        Route::get('/user/{id}/edit', [ControllerUsersManager::class, 'edit'])->name('user.profile');
        Route::post('update/{id}', [ControllerUsersManager::class, 'update'])->name('user.update');
        Route::get('destroy/{id}', [ControllerUsersManager::class, 'destroy'])->name('user.destroy');
        Route::get('show/{id}', [ControllerUsersManager::class, 'show'])->name('user.show');
        Route::get('changepass', [ControllerUsersManager::class, 'changepass'])->name('user.changepass');
    });

    Route::prefix('bill')->group(function () {
        Route::get('/', [ControllerBillsManager::class, 'index'])->name('bill.table');
        Route::get('create', [ControllerBillsManager::class, 'create'])->name('bill.create');
        Route::post('store', [ControllerBillsManager::class, 'store'])->name('bill.store');
        Route::get('edit/{id}', [ControllerBillsManager::class, 'edit'])->name('bill.edit');
        Route::post('update/{id}', [ControllerBillsManager::class, 'update'])->name('bill.update');
        Route::get('destroy/{id}', [ControllerBillsManager::class, 'destroy'])->name('bill.destroy');
        Route::get('show/{id}', [ControllerBillsManager::class, 'show'])->name('bill.show');
    });
});
