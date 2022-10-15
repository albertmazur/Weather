<?php

namespace App\Providers;

use App\Repository\CityRepository;
use App\Repository\Eloquent\CityRepository as EloquentCityRepository;
use Illuminate\Support\ServiceProvider;

class CityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(CityRepository::class, EloquentCityRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
