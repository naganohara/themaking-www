<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \URL::forceRootUrl(\Config::get('app.url'));
        if (str_contains(\Config::get('app.url'), 'https://')) {
            \URL::forceScheme('https');
        }

        View::composer('*', \App\Http\ViewComposers\AuthUserComposer::class);

        //
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
