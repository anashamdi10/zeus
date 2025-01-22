<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CategoryTermController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\NewletterController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\FlashDealController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\OurNewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\FacilitiesController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\WhyController;
use App\Http\Controllers\Admin\ServicesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Models\Admin\Counter;
use App\Models\CategoryTerm;
use App\Models\Product;



    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');

    //Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    //Route::post('/admin/login', 'LoginController@login')->name('admin.login.post');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login');

    Route::get('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {

        
        Route::get('/admin', [HomePageController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/admin/posproducts', [ProductController::class, 'pos']);

        Route::get('/admin/admins-ajax', '\App\Http\Controllers\Admin\AdminController@index')->name('admins.index');
        Route::view('/admin/admins', 'admin.admin.index')->name('admins');
        Route::get('/admin/categories-ajax', '\App\Http\Controllers\Admin\CategoryController@index')->name('categories.index');
        Route::view('/admin/categories', 'admin.category.index')->name('categories');
        Route::get('/admin/cities-ajax',  '\App\Http\Controllers\Admin\CityController@index')->name('cities.index');
        Route::view('/admin/cities', 'admin.city.index')->name('admin.cities');
        Route::get('/admin/countries-ajax',  '\App\Http\Controllers\Admin\CountryController@index')->name('countries.index');
        Route::view('/admin/countries', 'admin.country.index')->name('admin.countries');
        Route::get('/admin/products-ajax',  '\App\Http\Controllers\Admin\ProductController@index')->name('products.index');
        Route::view('/admin/products', 'admin.product.index')->name('admin.products');
        // Route::get('brands-ajax',  '\App\Http\Controllers\Admin\BrandController@index')->name('brands.index');
        // Route::view('brands', 'admin.brand.index')->name('admin.brands');
        Route::get('/admin/pages-ajax',  '\App\Http\Controllers\Admin\PageController@index')->name('pages.index');
        Route::view('/admin/pages', 'admin.page.index')->name('admin.pages');
        Route::get('/admin/slides-ajax',  '\App\Http\Controllers\Admin\SlideController@index')->name('slides.index');
        
        Route::get('/admin/categoryterms-ajax',  '\App\Http\Controllers\Admin\CategoryTermController@index')->name('categoryterms.index');
        Route::view('/admin/categoryterms', 'admin.categoryterm.index')->name('category_terms');

        Route::get('/admin/orders-ajax',  '\App\Http\Controllers\Admin\OrderController@index')->name('orders.index');
        
        Route::get('/admin/users-ajax',  '\App\Http\Controllers\Admin\UserController@index')->name('users.index');
        Route::view('/admin/users', 'admin.user.index')->name('users');
        Route::get('/admin/options-ajax',  '\App\Http\Controllers\Admin\OptionController@index')->name('options.index');
        Route::view('/admin/options', 'admin.option.index')->name('admin.options');
        Route::get('/admin/coupons-ajax',  '\App\Http\Controllers\Admin\CouponController@index')->name('coupons.index');
        Route::view('/admin/coupons', 'admin.coupon.index')->name('admin.coupons');
        Route::get('/admin/flash-deals-ajax',  '\App\Http\Controllers\Admin\FlashDealController@index')->name('flash.deals.index');
        
        // Route::get('stocks-ajax',  '\App\Http\Controllers\Admin\StockController@index')->name('stocks.index');
        // Route::view('stocks', 'admin.stock.index')->name('admin.stocks');
        Route::get('/admin/product-reviews-ajax',  '\App\Http\Controllers\Admin\ProductReviewController@index')->name('product.reviews.index');
        
        Route::get('/admin/shortages-ajax',  '\App\Http\Controllers\Admin\ReportController@shortage')->name('shortages.index');
        Route::view('/admin/shortages', 'admin.report.shortage')->name('admin.shortages');
        Route::get('/admin/sales-ajax',  '\App\Http\Controllers\Admin\ReportController@sales')->name('sales.index');
        Route::view('/admin/sales', 'admin.report.sales')->name('admin.sales');
        Route::get('/admin/most-sales-ajax',  '\App\Http\Controllers\Admin\ReportController@mostSales')->name('most.sales.index');
        Route::view('/admin/most-sales', 'admin.report.most-sales')->name('admin.most.sales');
        Route::get('/admin/most-orders-ajax',  '\App\Http\Controllers\Admin\ReportController@mostOrders')->name('most.orders.index');
        Route::view('/admin/most-orders', 'admin.report.most-orders')->name('admin.most.orders');
        
        
        // Route::get('payment-methods-ajax', '\App\Http\Controllers\Admin\SettingController@paymentMethods')->name('payment_methods.index');
        // Route::view('payment-methods', 'admin.setting.payment-methods')->name('payment_methods');
        
        Route::get('pos/index', '\App\Http\Controllers\Admin\PosController@index')->name('admin.pos');


//        Route::resource('roles', RoleController::class);
        Route::get('/admin/roles', '\App\Http\Controllers\Admin\RoleController@index')->name('roles.index');
        Route::get('/admin/roles/create', '\App\Http\Controllers\Admin\RoleController@create')->name('roles.create');
        Route::post('/admin/roles', '\App\Http\Controllers\Admin\RoleController@store')->name('roles.store');
        Route::get('/admin/roles/{id}/edit', '\App\Http\Controllers\Admin\RoleController@edit')->name('roles.edit');
        Route::post('/admin/roles/{id}/update', '\App\Http\Controllers\Admin\RoleController@update')->name('roles.update');
        
        Route::put('/admin/shipping-cost/{id}/update', '\App\Http\Controllers\Admin\CityController@updateShippingCost')->name('shipping.cost.update');
        // Route::put('stock/{id}/update', '\App\Http\Controllers\Admin\StockController@update')->name('stocks.update');
        
        Route::get('/admin/coupon/create', '\App\Http\Controllers\Admin\CouponController@create')->name('coupons.create');
        Route::post('/admin/coupon/store', '\App\Http\Controllers\Admin\CouponController@store')->name('coupons.store');
        Route::get('/admin/coupon/{id}/edit', '\App\Http\Controllers\Admin\CouponController@edit')->name('coupons.edit');
        Route::put('/admin/coupon/{id}/update', '\App\Http\Controllers\Admin\CouponController@update')->name('coupons.update');
        Route::delete('/admin/coupon/delete/{id}', '\App\Http\Controllers\Admin\CouponController@destroy')->name('coupons.destroy');
        Route::get('/admin/option/create', '\App\Http\Controllers\Admin\OptionController@create')->name('options.create');
        Route::post('/admin/option/store', '\App\Http\Controllers\Admin\OptionController@store')->name('options.store');
        Route::get('/admin/option/{id}/edit', '\App\Http\Controllers\Admin\OptionController@edit')->name('options.edit');
        Route::put('/admin/option/{id}/update', '\App\Http\Controllers\Admin\OptionController@update')->name('options.update');
         Route::delete('/admin/option/delete/{id}', '\App\Http\Controllers\Admin\OptionController@destroy')->name('options.destroy');
        Route::get('/admin/user/create', '\App\Http\Controllers\Admin\UserController@create')->name('users.create');
        Route::post('/admin/user/store', '\App\Http\Controllers\Admin\UserController@store')->name('users.store');
        Route::get('admin/create', '\App\Http\Controllers\Admin\AdminController@create')->name('admins.create');
        Route::post('admin/store', '\App\Http\Controllers\Admin\AdminController@store')->name('admins.store');
        Route::get('admin/{id}/edit', '\App\Http\Controllers\Admin\AdminController@edit')->name('admins.edit');
        Route::put('admin/{id}/update', '\App\Http\Controllers\Admin\AdminController@update')->name('admins.update');
        Route::get('/admin/category/create', '\App\Http\Controllers\Admin\CategoryController@create')->name('categories.create');
        Route::post('/admin/category/store', '\App\Http\Controllers\Admin\CategoryController@store')->name('categories.store');
        Route::get('/admin/category/{id}/edit', '\App\Http\Controllers\Admin\CategoryController@edit')->name('categories.edit');
        Route::put('/admin/category/{id}/update', '\App\Http\Controllers\Admin\CategoryController@update')->name('categories.update');
        Route::get('/admin/city/create', '\App\Http\Controllers\Admin\CityController@create')->name('cities.create');
        Route::post('/admin/city/store', '\App\Http\Controllers\Admin\CityController@store')->name('cities.store');
        Route::get('/admin/city/{id}/edit', '\App\Http\Controllers\Admin\CityController@edit')->name('cities.edit');
        Route::put('/admin/city/{id}/update', '\App\Http\Controllers\Admin\CityController@update')->name('cities.update');
        Route::get('/admin/country/create', '\App\Http\Controllers\Admin\CountryController@create')->name('countries.create');
        Route::post('/admin/country/store', '\App\Http\Controllers\Admin\CountryController@store')->name('countries.store');
        Route::get('/admin/country/{id}/edit', '\App\Http\Controllers\Admin\CountryController@edit')->name('countries.edit');
        Route::put('/admin/country/{id}/update', '\App\Http\Controllers\Admin\CountryController@update')->name('countries.update');
        Route::get('/admin/product/create', '\App\Http\Controllers\Admin\ProductController@create')->name('products.create');
        Route::post('/admin/product/store', '\App\Http\Controllers\Admin\ProductController@store')->name('products.store');
        Route::get('/admin/product/{id}/edit', '\App\Http\Controllers\Admin\ProductController@edit')->name('products.edit');
        Route::put('/admin/product/{id}/update', '\App\Http\Controllers\Admin\ProductController@update')->name('products.update');
        // Route::get('brand/create', '\App\Http\Controllers\Admin\BrandController@create')->name('brands.create');
        // Route::post('brand/store', '\App\Http\Controllers\Admin\BrandController@store')->name('brands.store');
        // Route::get('brand/{id}/edit', '\App\Http\Controllers\Admin\BrandController@edit')->name('brands.edit');
        // Route::put('brand/{id}/update', '\App\Http\Controllers\Admin\BrandController@update')->name('brands.update');
        Route::get('/admin/page/create', '\App\Http\Controllers\Admin\PageController@create')->name('pages.create');
        Route::post('/admin/page/store', '\App\Http\Controllers\Admin\PageController@store')->name('pages.store');
        Route::get('/admin/page/{id}/edit', '\App\Http\Controllers\Admin\PageController@edit')->name('pages.edit');
        Route::put('/admin/page/{id}/update', '\App\Http\Controllers\Admin\PageController@update')->name('pages.update');
     
        Route::get('/admin/setting/contact', '\App\Http\Controllers\Admin\SettingController@editContact')->name('admin.setting.contact');
        Route::put('/admin/contact/update', '\App\Http\Controllers\Admin\SettingController@updateContact')->name('setting.update.contact');
        Route::get('/admin/setting/store', '\App\Http\Controllers\Admin\SettingController@editStoreSetting')->name('admin.setting.store');
        Route::put('/admin/setting/store/update', '\App\Http\Controllers\Admin\SettingController@updateStoreSetting')->name('setting.update.store');
        Route::get('/admin/patment-method/create', '\App\Http\Controllers\Admin\SettingController@createPayment')->name('payment.create');
        Route::post('/admin/patment-method/store', '\App\Http\Controllers\Admin\SettingController@storePayment')->name('payment.store');
        Route::get('/admin/setting/{id}/payment/edit', '\App\Http\Controllers\Admin\SettingController@editPaymentSetting')->name('admin.setting.payment');
        Route::put('/admin/setting/{id}/payment/update', '\App\Http\Controllers\Admin\SettingController@updatePaymentSetting')->name('setting.update.payment');
        Route::delete('/admin/setting/payment/delete/{id}', '\App\Http\Controllers\Admin\SettingController@destroy')->name('setting.payment.destroy');
        Route::get('/admin/setting', '\App\Http\Controllers\Admin\SettingController@edit')->name('admin.setting');
        Route::put('/admin/setting/update', '\App\Http\Controllers\Admin\SettingController@update')->name('setting.update');
        // Route::delete('brand/delete/{id}', '\App\Http\Controllers\Admin\BrandController@destroy')->name('brands.destroy');
        Route::delete('/admin/category/delete/{id}', '\App\Http\Controllers\Admin\CategoryController@destroy')->name('categories.destroy');
        Route::delete('/admin/city/delete/{id}', '\App\Http\Controllers\Admin\CityController@destroy')->name('cities.destroy');
        Route::delete('/admin/page/delete/{id}', '\App\Http\Controllers\Admin\PageController@destroy')->name('pages.destroy');
        Route::delete('/admin/slide/delete/{id}', '\App\Http\Controllers\Admin\SlideController@destroy')->name('slides.destroy');
        Route::delete('/admin/product/delete/{id}', '\App\Http\Controllers\Admin\ProductController@destroy')->name('products.destroy');
        Route::delete('/admin/admin/delete/{id}', '\App\Http\Controllers\Admin\AdminController@destroy')->name('admins.destroy');
        Route::get('/admin/categoryterm/create', '\App\Http\Controllers\Admin\CategoryTermController@create')->name('categoryterms.create');
        Route::post('/admin/categoryterm/store', '\App\Http\Controllers\Admin\CategoryTermController@store')->name('categoryterms.store');
        Route::get('/admin/categoryterm/{id}/edit', '\App\Http\Controllers\Admin\CategoryTermController@edit')->name('categoryterms.edit');
        Route::put('/admin/categoryterm/{id}/update', '\App\Http\Controllers\Admin\CategoryTermController@update')->name('categoryterms.update');
        Route::delete('/admin/categoryterm/delete/{id}', '\App\Http\Controllers\Admin\CategoryTermController@destroy')->name('categoryterms.destroy');
         Route::delete('/admin/contact/delete/{id}', '\App\Http\Controllers\Admin\SettingController@destroyContact')->name('contact.destroy');
        Route::get('/admin/order/create', '\App\Http\Controllers\Admin\OrderController@create')->name('orders.create');
        Route::post('/admin/order/store', '\App\Http\Controllers\Admin\OrderController@store')->name('orders.store');
        Route::get('/admin/order/{id}/edit', '\App\Http\Controllers\Admin\OrderController@edit')->name('orders.edit');
        Route::put('/admin/order/{id}/update', '\App\Http\Controllers\Admin\OrderController@update')->name('orders.update');
        Route::delete('/admin/order/delete/{id}', '\App\Http\Controllers\Admin\OrderController@destroy')->name('orders.destroy');
        Route::get('/admin/order/{id}/show', '\App\Http\Controllers\Admin\OrderController@show')->name('orders.show');
        Route::delete('/admin/country/delete/{id}', '\App\Http\Controllers\Admin\CountryController@destroy')->name('countries.destroy');
        
        
        Route::post('/admin/status','\App\Http\Controllers\Admin\OrderController@status')->name('status');
        Route::post('/admin/payment-status','\App\Http\Controllers\Admin\OrderController@paymentStatus')->name('payment.status');
        Route::post('/admin/product-review-status','\App\Http\Controllers\Admin\ProductReviewController@status')->name('product.review.status');
        Route::get('/admin/ajax/get-options/{id}', '\App\Http\Controllers\Admin\OptionController@getOptionAjax')->name('get.options');
        
        
        Route::get('/admin/slides', [SlideController::class, 'index'])->name('admin.slides');
        Route::get('/admin/slide/{id}/edit', [SlideController::class, 'edit'])->name('slides.edit');
        Route::get('/admin/slide/video/{id}/edit', [SlideController::class, 'editVideo'])->name('slides.video.edit');
        
        Route::put('/admin/slide/{id}/update', [SlideController::class, 'update'])->name('slides.update');
        Route::put('/admin/slide/video/{id}/update', [SlideController::class, 'updateVideo'])->name('slides.video.update');
        Route::get('/admin/slide/delete/{id}', [SlideController::class, 'delete'])->name('slides.delete');
        // Route::get('slide/createVideo', [SlideController::class, 'createVideo'])->name('slides.createVideo');
        // Route::post('slide/createVideo/store', [SlideController::class, 'storeVideo'])->name('slides.video.store');
        
        
        
        
        
        Route::get('/admin/counter', [CounterController::class, 'index'])->name('admin.counter');
        Route::put('/admin/counter/{id}/update', [CounterController::class, 'update'])->name('counter.update');
        
        
        Route::get('/admin/why_shoose_us', [WhyController::class, 'index'])->name('admin.why');
        Route::get('/admin/why_shoose_us/{id}/edit', [WhyController::class, 'edit'])->name('why.edit');
        Route::put('/admin/why_shoose_us/{id}/update', [WhyController::class, 'update'])->name('why.update');
        
        
        Route::get('/admin/our_services/create', [ServicesController::class, 'create'])->name('services.create');
        Route::get('/admin/our_services/{id}/delete', [ServicesController::class, 'delete'])->name('services.delete');
        Route::get('/admin/our_services/{id}/edit', [ServicesController::class, 'edit'])->name('services.edit');
        
        Route::put('/admin/our_services/{id}/update', [ServicesController::class, 'update'])->name('services.update');
        Route::post('/admin/our_services/store', [ServicesController::class, 'store'])->name('services.store');
        
        
        
        
        Route::get('/admin/our_mews', [OurNewsController::class, 'index'])->name('admin.our_news');
        Route::get('/admin/our_mews/create', [OurNewsController::class, 'create'])->name('news.create');
        Route::get('/admin/our_news/{id}/edit', [OurNewsController::class, 'edit'])->name('news.edit');
        Route::get('/admin/our_news/{id}/delete', [OurNewsController::class, 'delete'])->name('news.delete');
        
        Route::post('/admin/our_mews/store', [OurNewsController::class, 'store'])->name('news.store');
        Route::put('/admin/our_mews/{id}/update', [OurNewsController::class, 'update'])->name('news.update');
        
        
        
        Route::post('/admin/product/create/sub_category', [ProductController::class, 'select_sub_category'])->name('admin.sub_category');
        Route::get('/admin/orders', [HomePageController::class, 'orderIndex'])->name('admin.orders');
        Route::get('/admin/orders/{id}/info', [HomePageController::class, 'orderInfo'])->name('orders.info');
        



        Route::get('/admin/about/create', [AboutController::class, 'create'])->name('about.create');
        
        Route::post('/admin/certificates/store', [AboutController::class, 'store'])->name('certificates.store');
        Route::get('/admin/certificates/{id}/edit', [AboutController::class, 'certificates_edit'])->name('certificates.edit');
        Route::put('/admin/certificates/{id}/update', [AboutController::class, 'certificates_update'])->name('certificates.update');
        Route::get('/admin/certificates/{id}/delete', [AboutController::class, 'delete'])->name('certificates.delete');


    Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');
        
        Route::get('/admin/facilities', [FacilitiesController::class, 'index'])->name('admin.facilities');
        Route::get('/admin/facilities/create', [FacilitiesController::class, 'create'])->name('facilities.create');
        Route::get('/admin/facilities/{id}/edit', [FacilitiesController::class, 'facilities_edit'])->name('facilities.edit');
        
        Route::get('/admin/facilities/{id}/update', [FacilitiesController::class, 'facilities_edit'])->name('facilities.edit');
        Route::put('/admin/facilities/{id}/update', [FacilitiesController::class, 'facilities_update'])->name('facilities.update');
        Route::post('/admin/facilities/store', [FacilitiesController::class, 'store'])->name('facilities.store');
        Route::get('/admin/facilities/delete/{id}', [FacilitiesController::class, 'delete'])->name('facilities.delete');
        
        Route::get('/admin/slide/create', '\App\Http\Controllers\Admin\SlideController@create')->name('slides.create');
        Route::post('/admin/slide/store', '\App\Http\Controllers\Admin\SlideController@store')->name('slides.store');
        // Route::get('slide/{id}/edit', '\App\Http\Controllers\Admin\SlideController@edit')->name('slides.edit');
        
        Route::get('/admin/products_images/delete/{id}', [ProductController::class, 'products_images_deletes'])->name('product_images.delete');
        
        Route::get('/admin/newsletter', [NewletterController::class, 'index'])->name('admin.newsletter');
    
        Route::get('/admin/newsletter/exportToExcel', [NewletterController::class, 'exportToExcel'])->name('newsletter.exportToExcel');
        
        
        
        Route::get('/admin/review', [ReviewController::class, 'index'])->name('admin.review');
        Route::get('/admin/review/created', [ReviewController::class, 'create'])->name('review.create');
        Route::post('/admin/review/store', [ReviewController::class, 'store'])->name('review.store');
        Route::get('/admin/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
        Route::put('/admin/review/{id}/update', [ReviewController::class, 'update'])->name('review.update');
        Route::get('/admin/review/delete/{id}', [ReviewController::class, 'delete'])->name('review.delete');
        
        
        Route::get('/admin/flash-deals', [FlashDealController::class, 'index'])->name('admin.flash.deals');
        Route::get('/admin/flash_deal/{id}/edit', [FlashDealController::class, 'edit'])->name('flash_deals.edit');
        
        Route::get('/admin/flash_deal/delete/{id}', [FlashDealController::class, 'destroy'])->name('flash_deals.destroy');
        // Route::view('contact', 'admin.setting.contacts')->name('admin.contact');
        
        
        Route::get('/admin/flash-deal/create', '\App\Http\Controllers\Admin\FlashDealController@create')->name('flash.deals.create');
        Route::post('/admin/flash-deal/store', '\App\Http\Controllers\Admin\FlashDealController@store')->name('flash.deals.store');
        Route::put('/admin/flash-deal/{id}/update', '\App\Http\Controllers\Admin\FlashDealController@update')->name('flash.deals.update');
        
        
       

        
        Route::view('/admin/product-reviews', 'admin.product-review.index')->name('admin.product.reviews');
        Route::get('/admin/product-reviews/{id}/show', '\App\Http\Controllers\Admin\ProductReviewController@show')->name('product.reviews.show');



        Route::get('/admin/contact_us',  '\App\Http\Controllers\Admin\SettingController@contacts')->name('contact.index');

        
    });
