<?php

namespace Dominik\Config;

use Illuminate\Support\ServiceProvider;


class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    //    $this->app->make('dominik\config\ConfigController12');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'cos');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/cos'),
        ]);
        //include __DIR__.'/routes.php';
    }
}
