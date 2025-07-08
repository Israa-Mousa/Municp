<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Models\Projects;
use App\Models\contacts;
use App\Models\Services;
use App\Models\Tourisms;
use App\Models\Institutions;
use App\Models\Tenders;

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

     View::composer('*', function ($view) {
        $blogCount = Blog::count();
        $serviceCount = Services::count();
        $tourismCount = Tourisms::count();
        $projectCount = Projects::count();
        $institutionCount = Institutions::count();
        $tendersCount = Tenders::count(); // أضف هذا السطر

        $view->with([
            'blogCount' => $blogCount,
            'serviceCount' => $serviceCount,
            'tourismCount' => $tourismCount,
            'projectCount' => $projectCount,
            'institutionCount' => $institutionCount,
            'tendersCount' => $tendersCount, // مرّر المتغير
        ]);
    });

    }
}
