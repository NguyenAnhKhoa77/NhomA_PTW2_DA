<?php

namespace App\Providers;

use View;
use App\Models\Manufacturers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['fontend.black'], function ($view) {
            $manufacturer = Manufacturers::orderBy('id', 'desc')->limit(6)->get();

            $view->with('manufacturer', $manufacturer);
        });
        Schema::defaultStringLength(255);
    }
}
