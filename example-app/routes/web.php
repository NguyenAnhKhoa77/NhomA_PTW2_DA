<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadingController;
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
    Route::get('/', [LoadingController::class, 'home'])->name('home');
});
Route::prefix('admin')->group(function () {
    Route::get('/', function ($id) {

    });
});
