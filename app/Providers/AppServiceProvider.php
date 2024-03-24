<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use App\Models\Country;
use App\Models\Setting;
use App\Models\Slide;
use App\Models\Notification;
use Illuminate\Support\Facades\View;
use \Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
        Paginator::useBootstrap();
        
        if (\Cookie::get('country') !== null){
            $country = Country::where('id',\Cookie::get('country'))->first();
        }else{
            $country = Country::where('id',1)->first();
        }
        if (\Cookie::get('lang') !== null) app()->setLocale(\Cookie::get('lang'));
        $setting = Setting::first();
        view()->share(['current_country' => $country,'settings'=> $setting]);
        Schema::defaultStringLength(191);
        $project_title = '| Viho - Premium Admin Template';
        View::share('title', $project_title);
        
        View::composer('site.partials.header', function ($view)  {
        if(auth()->user()){
                $notify_count   =  Notification::where('user_id',auth()->user()->id)->where('is_seen',0)->count();
            }else{
                $notify_count = 0;
            }
            
            $view->with(['notify_count'=>$notify_count]);
        });    
    }
}
