<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\ProductService', 'App\Services\EloquentProductService');
        $this->app->bind('App\Contracts\StoreService', 'App\Services\EloquentStoreService');
    }
}
