<?php

namespace App\Providers;

use App\Sport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Carbon::setLocale('fa');
        Schema::defaultStringLength(191);
        $sports = Sport::all();
        View::share('navigation',['صفحه اصلی','فعالیتها','زمان بندی کلاسها','رشته های ورزشی', 'درباره ما', 'تماس با ما']);
        View::share('sports', $sports);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
