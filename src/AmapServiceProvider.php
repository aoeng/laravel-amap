<?php

namespace Aoeng\Laravel\Amap;


use Illuminate\Support\ServiceProvider;

class AmapServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/amap.php' => config_path('amap.php'),
        ], 'laravel-amap');

    }

    public function register()
    {
        $this->app->singleton('laravel-amap', function ($app) {
            return new Amap($app);
        });


    }

}
