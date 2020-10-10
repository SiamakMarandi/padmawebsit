<?php

namespace App\Providers;

use App\Sport;
use Illuminate\Support\ServiceProvider;

class NavBarProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('padma.layout.master', function ($view) {
            $view->with('sports', Sport::all());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
