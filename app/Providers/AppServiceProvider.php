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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("App\\Interfaces\\PageRepositoryInterface", "App\\Services\\PageService");
        $this->app->bind("App\\Interfaces\\PageRepositoryInterface", "App\\Repositories\\PageRepository");
    }
}