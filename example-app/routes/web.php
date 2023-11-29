<?php

use App\Http\Controllers\ControllerCheckOut;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerView;
use App\Http\Controllers\Admin\AdminPage;
use App\Http\Controllers\Admin\ControllerBillsManager;
use App\Http\Controllers\Admin\ControllerCategoryManager;
use App\Http\Controllers\Admin\ControllerManufacturersManager;
use App\Http\Controllers\Admin\ControllerProductManager;
use App\Http\Controllers\Admin\ControllerUsersManager;
use App\Http\Controllers\ControllerCart;
use App\Http\Controllers\ControllerDetail;
use App\Http\Controllers\Admin\ControllerComment;
use App\Http\Controllers\ControllerGridPage;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;

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
    Route::get('detail/{id}', [ControllerDetail::class, 'index'])->name('detail');
    Route::get('/success', [PaymentController::class, 'success'])->name('success');
    //Checkout
    Route::prefix('/check-out')->middleware('auth')->group(function () {
        Route::get('/', [ControllerCheckOut::class, 'index'])->name('check-out');
        Route::get('/check-out-momo', [ControllerCheckOut::class, 'checkoutMomo'])->name('check-out-momo');
        Route::post('/process-check-out', [ControllerCheckOut::class, 'processCheckout'])->name('process.check-out');
        Route::post('/process-check-out-momo', [ControllerCheckOut::class, 'processCheckoutMomo'])->name('process.check-out-momo');
        Route::get('/thank-you', [ControllerCheckOut::class, 'thanksPage'])->name('thank-you');
        Route::get('/check-out-paypal', [PaymentController::class, 'checkoutPaypal'])->name('check-out-paypal');
        Route::get('/success', [PaymentController::class, 'success'])->name('success');
        Route::get('/error', [PaymentController::class, 'error'])->name('error');
        Route::post('payment', [PaymentController::class, 'pay'])->name('payment');
    });


    Route::prefix('wishlist')->middleware('auth')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('wishlist');
        Route::get('/add/{product}', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
        Route::delete('/remove/{product}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    });
    Route::prefix('contact')->group(function () {
        Route::get('/', [ControllerView::class, 'contact'])->name('contact');
        Route::post('/', [ControllerView::class, 'contactForm'])->name('contact');
    });
    Route::post('comment', [ControllerView::class, 'comment'])->name('comment');

    Route::prefix('grid')->group(function () {
        Route::get('/', [ControllerGridPage::class, 'search'])->name('grid');
    });

    Route::prefix('cart')->group(function () {
        Route::get('', [ControllerCart::class, 'cart'])->name('cart');
        //Thêm sản phẩm vào giỏ hàng
        Route::post('add-to-cart/{productId}', [ControllerCart::class, 'addToCart'])->name('cart.add');
        //Xóa sản phẩm vào giỏ hàng
        Route::delete('remove/{productId}', [ControllerCart::class, 'removeFromCart'])->name('cart.remove');
        //Cập nhật giỏ hàng
        Route::post('update', [ControllerCart::class, 'updateCart'])->name('cart.update');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::post('logout', [ControllerUser::class, 'Logout'])->name('logout');
    Route::get('logout', function () {
        return redirect()->route('home');
    });
});
Route::prefix('login')->group(function () {
    Route::get('/', [ControllerUser::class, 'LoginView'])->name('login.view');
    Route::post('/', [ControllerUser::class, 'Login'])->name('login');
    Route::get('register', [ControllerUser::class, 'RegisterView'])->name('register.view');
    Route::post('register', [ControllerUser::class, 'Register'])->name('register');
});

Route::prefix('/account')->middleware('auth')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('/update-profile/{account}', [UserProfileController::class, 'updateProfile'])->name('update.profile');
    Route::get('/address', [UserProfileController::class, 'address'])->name('address');
    Route::get('/orders', [UserProfileController::class, 'orders'])->name('orders');
    Route::get('/change-password', [UserProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/change-password', [UserProfileController::class, 'changePasswordProcess'])->name('change.password.process');
});

Route::prefix('admin')->middleware('auth', 'manage')->group(function () {
    Route::get('/', [AdminPage::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminPage::class, 'dashboard']);
    Route::prefix('product')->group(function () {
        Route::get('/', [ControllerProductManager::class, 'table'])->name('product.table');
        Route::get('create', [ControllerProductManager::class, 'create'])->name('product.create');
        Route::post('create', [ControllerProductManager::class, 'create_handler'])->name('product.create.handle');
        Route::get('edit/{id}', [ControllerProductManager::class, 'edit'])->name('product.edit');
        Route::post('edit/{token_id}', [ControllerProductManager::class, 'edit_handle'])->name('product.edit.handle');
        Route::get('delete/{id}', [ControllerProductManager::class, 'delete'])->name('product.delete');
        Route::get('addsize/{id}', [ControllerProductManager::class, ''])->name('product.addsize');
        Route::put('/user/{id}/lock', [UserController::class, 'lockUser'])->name('user.lock');
        Route::put('/user/{id}/unlock', [UserController::class, 'unlockUser'])->name('user.unlock');
        
        //
        Route::post('/submit-form', [FormController::class, 'submitForm'])->name('submit.form');
        Route::get('/users/{user}/edit', [ControllerUsersManager::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [ControllerUsersManager::class, 'update'])->name('users.update');
        Route::get('/users/{user}/change-password', [ControllerUsersManager::class, 'showChangePasswordForm'])
            ->name('users.changePasswordForm');
        Route::put('/users/{id}/change-password', [ControllerUsersManager::class, 'changePassword'])
            ->name('users.changePassword');
    });
    Route::prefix('product/size/')->group(function () {
        Route::get('/', [ControllerSize::class, 'index'])->name('size.table');
        Route::get('create', [ControllerSize::class, 'create'])->name('size.create');
        Route::post('store', [ControllerSize::class, 'store'])->name('size.store');
        Route::get('edit/{id}', [ControllerSize::class, 'edit'])->name('size.edit');
        Route::post('update/{id}', [ControllerSize::class, 'update'])->name('size.update');
        Route::get('destroy/{id}', [ControllerSize::class, 'destroy'])->name('size.destroy');
        Route::get('show', [ControllerSize::class, 'show'])->name('size.show');
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

    Route::prefix('user')->middleware('auth', 'admin')->group(function () {
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
    Route::prefix('comment')->group(function () {
        Route::prefix('comments')->group(function () {
            Route::get('/', [ControllerComment::class, 'index'])->name('comments.index');
            Route::get('create', [ControllerComment::class, 'create'])->name('comments.create');
            Route::post('store', [CommentController::class, 'store'])->name('comment.store');
            Route::get('edit/{id}', [ControllerComment::class, 'edit'])->name('comments.edit');
            Route::put('update/{id}', [ControllerComment::class, 'update'])->name('comments.update');
            Route::delete('destroy/{id}', [ControllerComment::class, 'destroy'])->name('comments.destroy');
            Route::get('show/{id}', [ControllerComment::class, 'show'])->name('comments.show');
            Route::get('/products/{product_name}', [ProductController::class, 'show'])->name('product.show');
        });
    });
});
