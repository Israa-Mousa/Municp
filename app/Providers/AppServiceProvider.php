<?php

namespace App\Providers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

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
        //
        // App::setlocale('ar');
        //App::setlocale(request('lang','en')); since we need to store it on session we need to make meiddel ware
    App::setLocale(Session::get('locale', config('app.locale')));

    }
}
