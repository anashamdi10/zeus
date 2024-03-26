<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\NewletterController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\FlashDealController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Models\Admin\Counter;

Route::group(['prefix'  =>  'cpadmin','namespace'=>'Admin'], function () {



    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login.post');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/', 'HomePageController@index')->name('admin.dashboard');
        Route::get('/posproducts', '\App\Http\Controllers\Admin\ProductController@pos');
        Route::get('admins-ajax', '\App\Http\Controllers\Admin\AdminController@index')->name('admins.index');
        Route::view('admins', 'admin.admin.index')->name('admins');
        Route::get('categories-ajax', '\App\Http\Controllers\Admin\CategoryController@index')->name('categories.index');
        Route::view('categories', 'admin.category.index')->name('categories');
        Route::get('cities-ajax',  '\App\Http\Controllers\Admin\CityController@index')->name('cities.index');
        Route::view('cities', 'admin.city.index')->name('admin.cities');
        Route::get('countries-ajax',  '\App\Http\Controllers\Admin\CountryController@index')->name('countries.index');
        Route::view('countries', 'admin.country.index')->name('admin.countries');
        Route::get('products-ajax',  '\App\Http\Controllers\Admin\ProductController@index')->name('products.index');
        Route::view('products', 'admin.product.index')->name('admin.products');
        // Route::get('brands-ajax',  '\App\Http\Controllers\Admin\BrandController@index')->name('brands.index');
        // Route::view('brands', 'admin.brand.index')->name('admin.brands');
        Route::get('pages-ajax',  '\App\Http\Controllers\Admin\PageController@index')->name('pages.index');
        Route::view('pages', 'admin.page.index')->name('admin.pages');
        Route::get('slides-ajax',  '\App\Http\Controllers\Admin\SlideController@index')->name('slides.index');
        
        Route::get('categoryterms-ajax',  '\App\Http\Controllers\Admin\CategoryTermController@index')->name('categoryterms.index');
        Route::view('categoryterms', 'admin.categoryterm.index')->name('category_terms');
        Route::get('orders-ajax',  '\App\Http\Controllers\Admin\OrderController@index')->name('orders.index');
        Route::view('orders', 'admin.order.index')->name('admin.orders');
        Route::get('users-ajax',  '\App\Http\Controllers\Admin\UserController@index')->name('users.index');
        Route::view('users', 'admin.user.index')->name('users');
        Route::get('options-ajax',  '\App\Http\Controllers\Admin\OptionController@index')->name('options.index');
        Route::view('options', 'admin.option.index')->name('admin.options');
        Route::get('coupons-ajax',  '\App\Http\Controllers\Admin\CouponController@index')->name('coupons.index');
        Route::view('coupons', 'admin.coupon.index')->name('admin.coupons');
        Route::get('flash-deals-ajax',  '\App\Http\Controllers\Admin\FlashDealController@index')->name('flash.deals.index');
        
        // Route::get('stocks-ajax',  '\App\Http\Controllers\Admin\StockController@index')->name('stocks.index');
        // Route::view('stocks', 'admin.stock.index')->name('admin.stocks');
        Route::get('product-reviews-ajax',  '\App\Http\Controllers\Admin\ProductReviewController@index')->name('product.reviews.index');
        
        Route::get('shortages-ajax',  '\App\Http\Controllers\Admin\ReportController@shortage')->name('shortages.index');
        Route::view('shortages', 'admin.report.shortage')->name('admin.shortages');
        Route::get('sales-ajax',  '\App\Http\Controllers\Admin\ReportController@sales')->name('sales.index');
        Route::view('sales', 'admin.report.sales')->name('admin.sales');
        Route::get('most-sales-ajax',  '\App\Http\Controllers\Admin\ReportController@mostSales')->name('most.sales.index');
        Route::view('most-sales', 'admin.report.most-sales')->name('admin.most.sales');
        Route::get('most-orders-ajax',  '\App\Http\Controllers\Admin\ReportController@mostOrders')->name('most.orders.index');
        Route::view('most-orders', 'admin.report.most-orders')->name('admin.most.orders');
        
        
        // Route::get('payment-methods-ajax', '\App\Http\Controllers\Admin\SettingController@paymentMethods')->name('payment_methods.index');
        // Route::view('payment-methods', 'admin.setting.payment-methods')->name('payment_methods');
        
        Route::get('pos/index', '\App\Http\Controllers\Admin\PosController@index')->name('admin.pos');


//        Route::resource('roles', RoleController::class);
        Route::get('roles', '\App\Http\Controllers\Admin\RoleController@index')->name('roles.index');
        Route::get('roles/create', '\App\Http\Controllers\Admin\RoleController@create')->name('roles.create');
        Route::post('roles', '\App\Http\Controllers\Admin\RoleController@store')->name('roles.store');
        Route::get('roles/{id}/edit', '\App\Http\Controllers\Admin\RoleController@edit')->name('roles.edit');
        Route::post('roles/{id}/update', '\App\Http\Controllers\Admin\RoleController@update')->name('roles.update');
        
        Route::put('shipping-cost/{id}/update', '\App\Http\Controllers\Admin\CityController@updateShippingCost')->name('shipping.cost.update');
        // Route::put('stock/{id}/update', '\App\Http\Controllers\Admin\StockController@update')->name('stocks.update');
        
        Route::get('coupon/create', '\App\Http\Controllers\Admin\CouponController@create')->name('coupons.create');
        Route::post('coupon/store', '\App\Http\Controllers\Admin\CouponController@store')->name('coupons.store');
        Route::get('coupon/{id}/edit', '\App\Http\Controllers\Admin\CouponController@edit')->name('coupons.edit');
        Route::put('coupon/{id}/update', '\App\Http\Controllers\Admin\CouponController@update')->name('coupons.update');
        Route::delete('coupon/delete/{id}', '\App\Http\Controllers\Admin\CouponController@destroy')->name('coupons.destroy');
        Route::get('option/create', '\App\Http\Controllers\Admin\OptionController@create')->name('options.create');
        Route::post('option/store', '\App\Http\Controllers\Admin\OptionController@store')->name('options.store');
        Route::get('option/{id}/edit', '\App\Http\Controllers\Admin\OptionController@edit')->name('options.edit');
        Route::put('option/{id}/update', '\App\Http\Controllers\Admin\OptionController@update')->name('options.update');
         Route::delete('option/delete/{id}', '\App\Http\Controllers\Admin\OptionController@destroy')->name('options.destroy');
        Route::get('user/create', '\App\Http\Controllers\Admin\UserController@create')->name('users.create');
        Route::post('user/store', '\App\Http\Controllers\Admin\UserController@store')->name('users.store');
        Route::get('admin/create', '\App\Http\Controllers\Admin\AdminController@create')->name('admins.create');
        Route::post('admin/store', '\App\Http\Controllers\Admin\AdminController@store')->name('admins.store');
        Route::get('admin/{id}/edit', '\App\Http\Controllers\Admin\AdminController@edit')->name('admins.edit');
        Route::put('admin/{id}/update', '\App\Http\Controllers\Admin\AdminController@update')->name('admins.update');
        Route::get('category/create', '\App\Http\Controllers\Admin\CategoryController@create')->name('categories.create');
        Route::post('category/store', '\App\Http\Controllers\Admin\CategoryController@store')->name('categories.store');
        Route::get('category/{id}/edit', '\App\Http\Controllers\Admin\CategoryController@edit')->name('categories.edit');
        Route::put('category/{id}/update', '\App\Http\Controllers\Admin\CategoryController@update')->name('categories.update');
        Route::get('city/create', '\App\Http\Controllers\Admin\CityController@create')->name('cities.create');
        Route::post('city/store', '\App\Http\Controllers\Admin\CityController@store')->name('cities.store');
        Route::get('city/{id}/edit', '\App\Http\Controllers\Admin\CityController@edit')->name('cities.edit');
        Route::put('city/{id}/update', '\App\Http\Controllers\Admin\CityController@update')->name('cities.update');
        Route::get('country/create', '\App\Http\Controllers\Admin\CountryController@create')->name('countries.create');
        Route::post('country/store', '\App\Http\Controllers\Admin\CountryController@store')->name('countries.store');
        Route::get('country/{id}/edit', '\App\Http\Controllers\Admin\CountryController@edit')->name('countries.edit');
        Route::put('country/{id}/update', '\App\Http\Controllers\Admin\CountryController@update')->name('countries.update');
        Route::get('product/create', '\App\Http\Controllers\Admin\ProductController@create')->name('products.create');
        Route::post('product/store', '\App\Http\Controllers\Admin\ProductController@store')->name('products.store');
        Route::get('product/{id}/edit', '\App\Http\Controllers\Admin\ProductController@edit')->name('products.edit');
        Route::put('product/{id}/update', '\App\Http\Controllers\Admin\ProductController@update')->name('products.update');
        // Route::get('brand/create', '\App\Http\Controllers\Admin\BrandController@create')->name('brands.create');
        // Route::post('brand/store', '\App\Http\Controllers\Admin\BrandController@store')->name('brands.store');
        // Route::get('brand/{id}/edit', '\App\Http\Controllers\Admin\BrandController@edit')->name('brands.edit');
        // Route::put('brand/{id}/update', '\App\Http\Controllers\Admin\BrandController@update')->name('brands.update');
        Route::get('page/create', '\App\Http\Controllers\Admin\PageController@create')->name('pages.create');
        Route::post('page/store', '\App\Http\Controllers\Admin\PageController@store')->name('pages.store');
        Route::get('page/{id}/edit', '\App\Http\Controllers\Admin\PageController@edit')->name('pages.edit');
        Route::put('page/{id}/update', '\App\Http\Controllers\Admin\PageController@update')->name('pages.update');
     
        Route::get('setting/contact', '\App\Http\Controllers\Admin\SettingController@editContact')->name('admin.setting.contact');
        Route::put('contact/update', '\App\Http\Controllers\Admin\SettingController@updateContact')->name('setting.update.contact');
        Route::get('setting/store', '\App\Http\Controllers\Admin\SettingController@editStoreSetting')->name('admin.setting.store');
        Route::put('setting/store/update', '\App\Http\Controllers\Admin\SettingController@updateStoreSetting')->name('setting.update.store');
        Route::get('patment-method/create', '\App\Http\Controllers\Admin\SettingController@createPayment')->name('payment.create');
        Route::post('patment-method/store', '\App\Http\Controllers\Admin\SettingController@storePayment')->name('payment.store');
        Route::get('setting/{id}/payment/edit', '\App\Http\Controllers\Admin\SettingController@editPaymentSetting')->name('admin.setting.payment');
        Route::put('setting/{id}/payment/update', '\App\Http\Controllers\Admin\SettingController@updatePaymentSetting')->name('setting.update.payment');
        Route::delete('setting/payment/delete/{id}', '\App\Http\Controllers\Admin\SettingController@destroy')->name('setting.payment.destroy');
        Route::get('setting', '\App\Http\Controllers\Admin\SettingController@edit')->name('admin.setting');
        Route::put('setting/update', '\App\Http\Controllers\Admin\SettingController@update')->name('setting.update');
        // Route::delete('brand/delete/{id}', '\App\Http\Controllers\Admin\BrandController@destroy')->name('brands.destroy');
        Route::delete('category/delete/{id}', '\App\Http\Controllers\Admin\CategoryController@destroy')->name('categories.destroy');
        Route::delete('city/delete/{id}', '\App\Http\Controllers\Admin\CityController@destroy')->name('cities.destroy');
        Route::delete('page/delete/{id}', '\App\Http\Controllers\Admin\PageController@destroy')->name('pages.destroy');
        Route::delete('slide/delete/{id}', '\App\Http\Controllers\Admin\SlideController@destroy')->name('slides.destroy');
        Route::delete('product/delete/{id}', '\App\Http\Controllers\Admin\ProductController@destroy')->name('products.destroy');
        Route::delete('admin/delete/{id}', '\App\Http\Controllers\Admin\AdminController@destroy')->name('admins.destroy');
        Route::get('categoryterm/create', '\App\Http\Controllers\Admin\CategoryTermController@create')->name('categoryterms.create');
        Route::post('categoryterm/store', '\App\Http\Controllers\Admin\CategoryTermController@store')->name('categoryterms.store');
        Route::get('categoryterm/{id}/edit', '\App\Http\Controllers\Admin\CategoryTermController@edit')->name('categoryterms.edit');
        Route::put('categoryterm/{id}/update', '\App\Http\Controllers\Admin\CategoryTermController@update')->name('categoryterms.update');
        Route::delete('categoryterm/delete/{id}', '\App\Http\Controllers\Admin\CategoryTermController@destroy')->name('categoryterms.destroy');
         Route::delete('contact/delete/{id}', '\App\Http\Controllers\Admin\SettingController@destroyContact')->name('contact.destroy');
        Route::get('order/create', '\App\Http\Controllers\Admin\OrderController@create')->name('orders.create');
        Route::post('order/store', '\App\Http\Controllers\Admin\OrderController@store')->name('orders.store');
        Route::get('order/{id}/edit', '\App\Http\Controllers\Admin\OrderController@edit')->name('orders.edit');
        Route::put('order/{id}/update', '\App\Http\Controllers\Admin\OrderController@update')->name('orders.update');
        Route::delete('order/delete/{id}', '\App\Http\Controllers\Admin\OrderController@destroy')->name('orders.destroy');
        Route::get('order/{id}/show', '\App\Http\Controllers\Admin\OrderController@show')->name('orders.show');
        Route::delete('country/delete/{id}', '\App\Http\Controllers\Admin\CountryController@destroy')->name('countries.destroy');
        
        
        Route::post('status','\App\Http\Controllers\Admin\OrderController@status')->name('status');
        Route::post('payment-status','\App\Http\Controllers\Admin\OrderController@paymentStatus')->name('payment.status');
        Route::post('product-review-status','\App\Http\Controllers\Admin\ProductReviewController@status')->name('product.review.status');
        Route::get('ajax/get-options/{id}', '\App\Http\Controllers\Admin\OptionController@getOptionAjax')->name('get.options');
        
        
        Route::get('slides', [SlideController::class, 'index'])->name('admin.slides');
        Route::get('slide/{id}/edit', [SlideController::class, 'edit'])->name('slides.edit');
        Route::get('slide/video/{id}/edit', [SlideController::class, 'editVideo'])->name('slides.video.edit');
        
        Route::put('slide/{id}/update', [SlideController::class, 'update'])->name('slides.update');
        Route::put('slide/video/{id}/update', [SlideController::class, 'updateVideo'])->name('slides.video.update');
        Route::get('slide/delete/{id}', [SlideController::class, 'delete'])->name('slides.delete');
        // Route::get('slide/createVideo', [SlideController::class, 'createVideo'])->name('slides.createVideo');
        // Route::post('slide/createVideo/store', [SlideController::class, 'storeVideo'])->name('slides.video.store');
        
        
        Route::get('about', [AboutController::class, 'index'])->name('admin.about');

        Route::get('counter', [CounterController::class, 'index'])->name('admin.counter');
        Route::put('counter/{id}/update', [CounterController::class, 'update'])->name('counter.update');
        

        
        
        // Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
        // Route::post('about/store', [AboutController::class, 'store'])->name('about.store');

        
        Route::get('slide/create', '\App\Http\Controllers\Admin\SlideController@create')->name('slides.create');
        Route::post('slide/store', '\App\Http\Controllers\Admin\SlideController@store')->name('slides.store');
        // Route::get('slide/{id}/edit', '\App\Http\Controllers\Admin\SlideController@edit')->name('slides.edit');
        
        Route::get('products_images/delete/{id}', [ProductController::class, 'products_images_deletes'])->name('product_images.delete');
        
        Route::get('newsletter', [NewletterController::class, 'index'])->name('admin.newsletter');
        Route::post('newsletter/store', [NewletterController::class, 'store'])->name('newsletter.store');
        Route::get('newsletter/exportToExcel', [NewletterController::class, 'exportToExcel'])->name('newsletter.exportToExcel');
        
        
        
        Route::get('review', [ReviewController::class, 'index'])->name('admin.review');
        Route::get('review/created', [ReviewController::class, 'create'])->name('review.create');
        Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');
        Route::get('review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
        Route::put('review/{id}/update', [ReviewController::class, 'update'])->name('review.update');
        Route::get('review/delete/{id}', [ReviewController::class, 'delete'])->name('review.delete');
        
        
        Route::get('flash-deals', [FlashDealController::class, 'index'])->name('admin.flash.deals');
        Route::get('flash_deal/{id}/edit', [FlashDealController::class, 'edit'])->name('flash_deals.edit');
        
        Route::get('flash_deal/delete/{id}', [FlashDealController::class, 'destroy'])->name('flash_deals.destroy');
        // Route::view('contact', 'admin.setting.contacts')->name('admin.contact');
        
        
        Route::get('flash-deal/create', '\App\Http\Controllers\Admin\FlashDealController@create')->name('flash.deals.create');
        Route::post('flash-deal/store', '\App\Http\Controllers\Admin\FlashDealController@store')->name('flash.deals.store');
        Route::put('flash-deal/{id}/update', '\App\Http\Controllers\Admin\FlashDealController@update')->name('flash.deals.update');
        
        
       

        
        Route::view('product-reviews', 'admin.product-review.index')->name('admin.product.reviews');
        Route::get('product-reviews/{id}/show', '\App\Http\Controllers\Admin\ProductReviewController@show')->name('product.reviews.show');



        Route::get('contact_us',  '\App\Http\Controllers\Admin\SettingController@contacts')->name('contact.index');

        
    });
});
