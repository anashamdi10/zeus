<?php

namespace App\Providers;

use App\Contracts\BrandContract;
use App\Contracts\OrderContract;
use App\Contracts\CountryContract;
use App\Contracts\DelegateContract;
use App\Contracts\ProductContract;
use App\Contracts\CategoryContract;
use App\Contracts\SlideContract;
use App\Contracts\AttributeContract;
use App\Repositories\BrandRepository;
use App\Repositories\OrderRepository;
use App\Repositories\CountryRepository;
use App\Repositories\DelegateRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\SlideRepository;
use App\Repositories\AttributeRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        SlideContract::class         =>          SlideRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        BrandContract::class            =>          BrandRepository::class,
        ProductContract::class          =>          ProductRepository::class,
        OrderContract::class            =>          OrderRepository::class,
        CountryContract::class            =>          CountryRepository::class,
        DelegateContract::class            =>         DelegateRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
