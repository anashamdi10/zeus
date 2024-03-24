<?php

namespace App\Providers;

use Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
         View::composer('site.app', function ($view) {
            $view->with(['setting' => Setting::first()]);
        });

        View::composer('site.app', function ($view) {
            $view->with(['catgs' => Category::where('parent_id',null)->orderBy('id', 'asc')->with('sub')->get()]);
        });
        View::composer('site.partials.header', function ($view) {
            $view->with(['cartCount' => Cart::getContent()->count(),'countries' => Country::all(),]);
        });
        View::composer('site.partials.footer', function ($view) {
            $view->with(['pages' => Page::all(),'catgs' => Category::where('parent_id',null)->orderBy('id', 'asc')->inRandomOrder()->get(),'setting' => Setting::first()]);
        });
    }
}
