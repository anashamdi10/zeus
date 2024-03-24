<?php

use App\Http\Controllers\ApI\PosProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\OfferController;
use App\Http\Controllers\API\NotificationController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SettingsController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\SlideController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\UserAddressController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\CouponController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);
Route::get('check-coupon',[ProductController::class ,'checkCoupon']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('verify-code', [AuthController::class, 'verifyCode']);
    
    Route::get('orders',[OrderController::class ,'index']);
    Route::get('order/{id}',[OrderController::class ,'show']);
    Route::post('order/store',[CheckoutController::class ,'order']);
    Route::post('order/cancel',[OrderController::class ,'cancel']);
    
    Route::get('notifications',[NotificationController::class ,'index']);
    Route::get('my-favourite',[FavoriteController::class ,'myFavoutite']);
    
    Route::get('my-addresses',[UserAddressController::class ,'addresses']);
    Route::get('edit-address/{id}',[UserAddressController::class ,'EditAddress']);
    Route::get('delete-address/{id}',[UserAddressController::class ,'DeleteAddress']);
    Route::post('store-address',[UserAddressController::class,'storeAddress']);
    Route::post('edit-password', [AuthController::class, 'editPassword']);
    
    Route::post('update-favorite',[FavoriteController::class,'updateFavourite']);
    Route::post('favourite/store',[FavoriteController::class ,'store']);
    Route::post('favourite/remove',[FavoriteController::class ,'removeFavoutite']);
    Route::post('post-rate',[ProductController::class ,'postRate']);
    
    Route::post('edit-profile',[AuthController::class ,'editProfile']);
    Route::post('logout',[AuthController::class ,'logout']);
    Route::post('user/delete',[AuthController::class ,'delete']);
    Route::post('paid-order', [CheckoutController::class, 'paidOrder']);
});

    Route::get('payment-methods',[PaymentController::class ,'index']);
    Route::get('users',[UserController::class ,'users']);
    Route::get('cities',[CityController::class ,'index']);
    Route::get('cats',[CategoryController::class ,'index']);
    Route::get('brands',[BrandController::class ,'index']);
    Route::get('offers',[OfferController::class ,'index']);
    Route::get('product/{id}',[ProductController::class ,'show']);
    Route::get('products',[ProductController::class ,'products']);
    Route::get('sales',[ProductController::class ,'sales']);
    Route::post('search',[ProductController::class ,'search']);
    Route::get('contact-us',[SettingsController::class ,'contactUs']);
    Route::get('category/{id}',[CategoryController::class ,'categoryProducts']);
    Route::get('brand/{id}',[BrandController::class ,'brandProducts']);
    Route::get('slides',[SlideController::class ,'index']);
    Route::post('/cart-products',[CartController::class, 'cartProducts']);
    Route::get('page/{id}',[PageController::class ,'page']);
    Route::post('/contact',[ContactController::class, 'contact']);
    Route::get('latest',[ProductController::class ,'latest']);
    Route::get('more-seller',[ProductController::class ,'moreSeller']);
    Route::get('more-ratings',[ProductController::class ,'moreRate']);
    Route::get('flash-deals',[ProductController::class ,'flashDeals']);
    Route::get('coupons',[CouponController::class ,'index']);
    Route::post('/post-checkout', [CheckoutController::class, 'postCheckout']);
    Route::post('payment', [CheckoutController::class, 'payment']);


