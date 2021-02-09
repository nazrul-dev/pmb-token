<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
   
    

        Blade::if('maba', function () {
            return auth()->check() && auth()->user()->akses === 'maba';
        });

        Blade::if('admin', function () {
            return auth()->user()->akses === 'admin'|| auth()->user()->akses === 'superadmin';
        });

        Blade::if('panitia', function () {
            return auth()->user()->akses === 'panitia' || auth()->user()->akses === 'superadmin';
        });

        Blade::if('superadmin', function () {
            return auth()->user()->akses === 'superadmin';
        });
    }
}
