<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\AccountController;

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




Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    
   @include_once('admin_web.php'); 
    
    Route::get('/', function () {
    return redirect()->route('index');
})->name('/');


Route::prefix('dashboard')->group(function () {
    Route::view('/', 'admin.dashboard.default')->name('index');
    Route::view('default', 'admin.dashboard.default')->name('dashboard.index');
});

Route::view('default-layout', 'multiple.default-layout')->name('default-layout');
Route::view('compact-layout', 'multiple.compact-layout')->name('compact-layout');
Route::view('modern-layout', 'multiple.modern-layout')->name('modern-layout');


Route::get('/', [HomeController::class, 'index'])->name('index.show');
Route::get('/Ar', [HomeController::class, 'indexAr'])->name('indexAr.show');
Route::get('/contact_page', [HomeController::class, 'contact'])->name('contact_page');




Route::get('/ajax/latest', [HomeController::class, 'latestIndex'])->name('latest.products');
Route::get('/ajax/sale', [HomeController::class, 'saleIndex'])->name('sale.products');
Route::get('/ajax/flash', [HomeController::class, 'flashIndex'])->name('flash.products');
Route::get('/ajax/rate', [HomeController::class, 'rateIndex'])->name('rate.products');
Route::get('/ajax/best', [HomeController::class, 'bestIndex'])->name('best.products');
Route::get('/ajax/brands', [HomeController::class, 'brandsIndex'])->name('brands');
Route::get('/ajax/coupons', [CartController::class, 'coupons'])->name('coupons');
Route::get('/ajax/simillar/{id}', [ProductController::class, 'simillarAjax'])->name('ajax.simillar');
Route::get('/ajax/user-addresses', [UserController::class, 'userAddresses'])->name('user_addresses');
Route::get('ajax/notifications', [\App\Http\Controllers\Site\NotificationController::class, 'ajax']);



    
    
   Route::get('/offers', [ProductController::class, 'saleProducts'])->name('offers');
    // order
    Route::post('/order_create', [PageController::class, 'order_create'])->name('order_create');
   
   
   Route::get('/featured-products', [ProductController::class, 'featuredProducts'])->name('featured.products');
Route::get('/most-seller-products', [ProductController::class, 'mostSellerProducts'])->name('most.seller.products');

Route::get('/toggle_like/{id}', [ProductController::class, 'toggle_like'])->name('toggle_like');
Route::get('/category/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+')->name('category.show');
Route::get('/product/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+')->name('product.show');
Route::get('/products', [ProductController::class, 'latest'])->name('products.latest');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::post('/product/add/cart', [ProductController::class, 'addToCart'])->name('product.add.cart');
Route::get('/cart', [CartController::class, 'getCart'])->name('checkout.cart');
Route::post('/cart/update/{id}', [CartController::class, 'updateItem'])->name('cartupdate');
Route::post('/cart/item/remove/{id}', [CartController::class, 'removeItem'])->name('checkout.cart.remove');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('checkout.cart.clear');
Route::get('/pages/{id}', [PageController::class, 'show'])->name('show.page');
Route::get('/brand/{id}', [PageController::class, 'showBrand'])->name('brand.show');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact');
Route::post('/contact-us', [PageController::class, 'contactUsStore'])->name('contact_us.store');
Route::get('/products_page', [PageController::class, 'products'])->name('products');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');



Route::get('/products_page/menu/{id}', [PageController::class, 'product_list'])->name('product_list');
Route::get('/products_item/{id}', [PageController::class, 'products_item'])->name('products.item');
Route::get('/cart/show', 'Site\CartController@showCart')->name('cart.show');
Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('checkout.index');
Route::post('/post-checkout', [CheckoutController::class, 'postCheckout'])->name('checkout.post');

Route::get('/{name_en}/{id}', [PageController::class, 'singlePage'])->name('singlePage');






Route::group(['middleware' => ['auth']], function () {
    Route::post('/active', [AuthController::class, 'active'])->name('account_active');
    Route::get('/code', [AuthController::class, 'code'])->name('login_code');
    Route::post('/place', [CheckoutController::class, 'order'])->name('place_order');
    Route::get('/uporder', [CheckoutController::class, 'place'])->name('update_order');
    
    Route::get('/cities', [CheckoutController::class, 'getCities'])->name('cities');
    // Route::post('/place','Site\CheckoutController@save_order')->name('place_order');
    Route::get('account/profile', [AccountController::class, 'getOrders'])->name('account.show');
    Route::get('account/favs', [AccountController::class, 'getFavs'])->name('account.favs');
    Route::get('account/edit', [AccountController::class, 'profile'])->name('account.edit');
    Route::get('account/order/{id}', [AccountController::class, 'showOrder'])->name('show.order');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/updateProfile', [AccountController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/notifications', [UserController::class, 'myNotifications'])->name('notification.index');
    Route::get('/points', [UserController::class, 'myPoints'])->name('mypoints');
    Route::get('my-favourite', [UserController::class, 'myFavourite'])->name('myfavourite');
    Route::get('my-orders', [UserController::class, 'myOrders'])->name('myorders');
    Route::get('my-address', [UserController::class, 'addresses'])->name('addresses');
    Route::post('store-address', [UserController::class, 'storeAddress'])->name('storeAddress');
    Route::get('add-address', [UserController::class, 'createAddress'])->name('add.addresses');
    Route::get('ajax-address', [UserController::class, 'addressAjax'])->name('addressAjax');
    Route::post('account-delete',[UserController::class, 'accountDelete'])->name('account.delete');
    
    Route::get('ajax-order/{id}', [UserController::class, 'getOrderProducts'])->name('get.order.products');
    Route::post('ajax-cancel-order/{id}', [UserController::class, 'cancelOrder'])->name('cancel.order');
    Route::post('ajax-return-order/{id}', [UserController::class, 'returnOrder'])->name('return.order');
    Route::post('post-rate',[ProductController::class ,'postRate'])->name('post.rate');

});

    Route::get('/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/faild', [CheckoutController::class, 'faild'])->name('checkout.faild');

    // Route::group(['middleware' => ['guest']], function () {
    //     Route::post('/signup', [AuthController::class, 'signUp'])->name('signup');
    //     Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
    //     Route::get('/login', [AuthController::class, 'login_mobile'])->name('login');
    //     Route::get('/register', [AuthController::class, 'register'])->name('register');
    //     Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetpassword');
    //     Route::get('get-city/{id}', [AuthController::class, 'getCities']);
    // });
    Route::put('review/{id}/update', [AboutController::class, 'update'])->name('about.update');
});



