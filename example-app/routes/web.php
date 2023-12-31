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
use App\Http\Controllers\Admin\ControllerCoupons;
use App\Http\Controllers\ControllerGridPage;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ControllerSize;
use App\Http\Controllers\Admin\ControllerMailbox;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'checkAccountStatus'], function () {
    Route::prefix('/')->group(function () {
        Route::get('/', [ControllerView::class, 'home'])->name('home');
        Route::get('detail/{id}', [ControllerDetail::class, 'index'])->name('detail');

        //Checkout
        Route::prefix('/check-out')->middleware('auth')->group(function () {
            Route::get('/', [ControllerCheckOut::class, 'index'])->name('check-out');
            Route::get('/check-out-momo', [ControllerCheckOut::class, 'checkoutMomo'])->name('check-out-momo');
            Route::post('/process-check-out', [ControllerCheckOut::class, 'processCheckout'])->name('process.check-out');
            Route::post('/process-check-out-momo', [ControllerCheckOut::class, 'processCheckoutMomo'])->name('process.check-out-momo');
            Route::get('/thank-you', [ControllerCheckOut::class, 'thanksPage'])->name('thank-you');
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
        Route::get('/address-add', [UserProfileController::class, 'addressAddNew'])->name('add.address');
        Route::post('/address-add', [UserProfileController::class, 'addressAddNewProcess'])->name('add.address.process');
        Route::get('/address-change/{address}', [UserProfileController::class, 'addressChange'])->name('change.address');
        Route::post('/address-change/{address}', [UserProfileController::class, 'addressChangeProcess'])->name('change.address.process');
        Route::delete('/address-delete/{address}', [UserProfileController::class, 'addressDeleteProcess'])->name('delete.address.process');
        Route::post('/address-default-change/{address}', [UserProfileController::class, 'setAddressDefaultProcess'])->name('change.address-default.process');
        Route::get('/orders-pending', [UserProfileController::class, 'ordersPending'])->name('orders.pending');
        Route::get('/orders-delivering', [UserProfileController::class, 'ordersDelivering'])->name('orders.delivering');
        Route::get('/orders-delivered', [UserProfileController::class, 'ordersDelivered'])->name('orders.delivered');
        Route::get('/orders-completed', [UserProfileController::class, 'ordersCompleted'])->name('orders.completed');
        Route::get('/orders-cancelled', [UserProfileController::class, 'ordersCancelled'])->name('orders.cancelled');
        Route::get('/order-detail/{bill}', [UserProfileController::class, 'orderDetail'])->name('orders.detail');
        Route::post('/orders-cancel-status/{bill}', [UserProfileController::class, 'cancelOrderStatus'])->name('orders.cancel.status');
        Route::post('/orders-accept-status/{bill}', [UserProfileController::class, 'acceptOrderStatus'])->name('orders.accept.status');
        Route::post('/orders-pre-pay-status/{bill}', [UserProfileController::class, 'prePayOrderStatus'])->name('orders.pre-pay.status');
        Route::get('/change-password', [UserProfileController::class, 'changePassword'])->name('change.password');
        Route::post('/change-password', [UserProfileController::class, 'changePasswordProcess'])->name('change.password.process');
        Route::get('/mailbox', [UserProfileController::class, 'mailbox'])->name('mailbox');
        Route::get('/maildetail/{id}', [UserProfileController::class, 'maildetail'])->name('maildetail');
        Route::get('/coupon', [UserProfileController::class, 'coupon'])->name('coupon');
    });

    Route::prefix('admin')->middleware('auth', 'manage')->group(function () {
        Route::get('/', [AdminPage::class, 'dashboard'])->name('dashboard');
        Route::get('/dashboard', [AdminPage::class, 'dashboard']);
        //
        Route::get('/getOrderData', [AdminPage::class, 'getOrderData'])->name('getOrderData');
        Route::get('/getCategoryData', [AdminPage::class, 'getCategoryData'])->name('getCategoryData');
        Route::get('/getManuData', [AdminPage::class, 'getManuData'])->name('getManuData');
        Route::get('/getCategoryChart', [AdminPage::class, 'getCategoryChart'])->name('getCategoryChart');
        //
        Route::prefix('product')->group(function () {
            Route::get('/', [ControllerProductManager::class, 'table'])->name('product.table');
            Route::get('create', [ControllerProductManager::class, 'create'])->name('product.create');
            Route::post('create', [ControllerProductManager::class, 'create_handler'])->name('product.create.handle');
            Route::get('edit/{id}', [ControllerProductManager::class, 'edit'])->name('product.edit');
            Route::post('edit/{token_id}', [ControllerProductManager::class, 'edit_handle'])->name('product.edit.handle');
            Route::get('detai/{id}', [ControllerProductManager::class, 'view'])->name('product.view');

            Route::get('delete/{id}', [ControllerProductManager::class, 'delete'])->name('product.delete');
            Route::get('addsize/{id}', [ControllerProductManager::class, 'size_create'])->name('product.addsize');
            Route::post('storesize/{token_id}', [ControllerProductManager::class, 'size_store'])->name('product.storesize');

            Route::prefix('image')->group(function () {
                Route::get('create/{id}', [ControllerProductManager::class, 'image_create'])->name('product.image.create');
                Route::post('store/{id}', [ControllerProductManager::class, 'image_store'])->name('product.image.store');
                Route::delete('destroy/{id}', [ControllerProductManager::class, 'image_destroy'])->name('product.image.destroy');
            });

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
            Route::post('update', [ControllerSize::class, 'update'])->name('size.update');
            Route::delete('destroy/{id}', [ControllerSize::class, 'destroy'])->name('size.destroy');
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

            Route::get('lockUser/{id}', [UserController::class, 'lockUser'])->name('user.lockUser');

            Route::get('unlockUser/{id}', [UserController::class, 'unlockUser'])->name('user.unlockUser');
        });

        Route::prefix('bill')->group(function () {
            Route::get('/', [ControllerBillsManager::class, 'index'])->name('bill.table');
            Route::get('edit/{id}', [ControllerBillsManager::class, 'edit'])->name('bill.edit');
            Route::post('update/{id}', [ControllerBillsManager::class, 'update'])->name('bill.update');
            Route::middleware(['auth', 'admin'])->group(function () {
                Route::delete('destroy/{id}', [ControllerBillsManager::class, 'destroy'])->name('bill.destroy');
            });
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
        Route::prefix('coupons')->group(function () {
            Route::get('/', [ControllerCoupons::class, 'index'])->name('coupons.table');
            Route::get('create', [ControllerCoupons::class, 'create'])->name('coupons.create');
            Route::post('store', [ControllerCoupons::class, 'store'])->name('coupons.store');
            Route::get('edit/{id}', [ControllerCoupons::class, 'edit'])->name('coupons.edit');
            Route::post('update/{id}', [ControllerCoupons::class, 'update'])->name('coupons.update');
            Route::delete('destroy/{id}', [ControllerCoupons::class, 'destroy'])->name('coupons.destroy');
        });
        Route::prefix('mailbox')->group(function () {
            Route::get('/', [ControllerMailbox::class, 'mailbox'])->name('mailbox.mailbox');
            Route::get('/read-mail/{id}', [ControllerMailbox::class, 'readmail'])->name('read.mail');
            Route::get('/reply/{id}', [ControllerMailbox::class, 'reply'])->name('mailbox.reply');
            Route::post('/reply/{id}', [ControllerMailbox::class, 'replyForm'])->name('mailbox.reply');
        });
    });
});
