<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// it is modified
use Illuminate\Pagination\Paginator;
// it is modified
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
        // it   is  modified
        // Paginator::useBootstrapFive();
    }
}
