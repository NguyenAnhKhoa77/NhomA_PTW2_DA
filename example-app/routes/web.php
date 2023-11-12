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
});
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminPage::class, 'dashboard'])->name('dashboard');
    Route::get('Create', [ControllerProductManager::class, 'create']);
    Route::get('Detail', [ControllerProductManager::class, 'detail'])->name('detail');
    Route::get('Edit', [ControllerProductManager::class, 'edit'])->name('edit');
});