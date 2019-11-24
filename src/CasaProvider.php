<?php

namespace Casa;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CasaProvider extends ServiceProvider
{
    public static $providers = [
        // \Casa\Providers\CasaEventServiceProvider::class,
        // \Casa\Providers\CasaServiceProvider::class,
        // \Casa\Providers\CasaRouteProvider::class,

        \Finder\FinderProvider::class,
    ];

    /**
     * Alias the services in the boot.
     */
    public function boot()
    {
        // $this->publishes([
        //     __DIR__.'/Publishes/resources/tools' => base_path('resources/tools'),
        //     __DIR__.'/Publishes/app/Services' => app_path('Services'),
        //     __DIR__.'/Publishes/public/js' => base_path('public/js'),
        //     __DIR__.'/Publishes/public/css' => base_path('public/css'),
        //     __DIR__.'/Publishes/public/img' => base_path('public/img'),
        //     __DIR__.'/Publishes/config' => base_path('config'),
        //     __DIR__.'/Publishes/routes' => base_path('routes'),
        //     __DIR__.'/Publishes/app/Controllers' => app_path('Http/Controllers/Casa'),
        // ]);

        // $this->publishes([
        //     __DIR__.'../resources/views' => base_path('resources/views/vendor/Casa'),
        // ], 'SierraTecnologia Casa');
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->setProviders();

        // // View namespace
        // $this->loadViewsFrom(__DIR__.'/Views', 'Casa');

        // if (is_dir(base_path('resources/Casa'))) {
        //     $this->app->view->addNamespace('Casa-frontend', base_path('resources/Casa'));
        // } else {
        //     $this->app->view->addNamespace('Casa-frontend', __DIR__.'/Publishes/resources/Casa');
        // }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // // Configs
        // $this->app->config->set('Casa.modules.Casa', include(__DIR__.'/config.php'));

        /*
        |--------------------------------------------------------------------------
        | Register the Commands
        |--------------------------------------------------------------------------
        */

        $this->commands([]);
    }

    protected function setProviders()
    {
        collection(self::$providers)->map(function ($provider) {
            $this->app->register($provider);
        })

    }

}
