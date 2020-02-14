<?php

namespace Casa;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Casa\Services\CasaService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;

use Log;
use App;
use Config;
use Route;
use Illuminate\Routing\Router;

use Support\ClassesHelpers\Traits\Models\ConsoleTools;

use Casa\Facades\Casa as CasaFacade;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class CasaProvider extends ServiceProvider
{
    use ConsoleTools;

    public static $aliasProviders = [
        'Casa' => \Casa\Facades\Casa::class,
    ];

    public static $providers = [
        // \Casa\Providers\CasaEventServiceProvider::class,
        // \Casa\Providers\CasaServiceProvider::class,
        // \Casa\Providers\CasaRouteProvider::class,

        \Finder\FinderProvider::class,
    ];

    /**
     * Rotas do Menu
     */
    public static $menuItens = [
        'Profile' => [
            [
                'text'        => 'Casa',
                'icon'        => 'fas fa-fw fa-home',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                // 'access' => \App\Models\Role::$ADMIN
            ],
            'Casa' => [
                [
                    'text'        => 'Dash House',
                    'route'       => 'casa.dash.index',
                    'icon'        => 'fas fa-fw fa-home',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Financeiro',
                    'route'       => 'casa.finances.index',
                    'icon'        => 'fas fa-fw fa-dollar',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Espolios',
                    'route'       => 'casa.espolio.index',
                    'icon'        => 'fas fa-fw fa-car',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Clientes',
                    'route'       => 'casa.development.clients.index',
                    'icon'        => 'fas fa-fw fa-dollar',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Projetos',
                    'route'       => 'casa.development.projects.index',
                    'icon'        => 'fas fa-fw fa-dollar',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Arquitetura',
                    'route'       => 'casa.manager.arquitetura.index',
                    'icon'        => 'fas fa-fw fa-car',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Fields',
                    'route'       => 'casa.manager.fields.index',
                    'icon'        => 'fas fa-fw fa-car',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    // 'access' => \App\Models\Role::$ADMIN
                ],
            ],
        ],
    ];

    /**
     * Alias the services in the boot.
     */
    public function boot()
    {
        
        // Register configs, migrations, etc
        $this->registerDirectories();

        // // COloquei no register pq nao tava reconhecendo as rotas para o adminlte
        // $this->app->booted(function () {
        //     $this->routes();
        // });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::group([
            'namespace' => '\Casa\Http\Controllers',
        ], function ($router) {
            require __DIR__.'/Routes/web.php';
        });
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getPublishesPath('config/sitec/casa.php'), 'sitec.casa');
        // Publish config files
        $this->publishes([
            // Paths
            $this->getPublishesPath('config/follow') => config_path('follow')
        ], ['config',  'sitec', 'sitec-config']);
        
        $this->setProviders();
        $this->routes();

        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $loader = AliasLoader::getInstance();
        $loader->alias('Casa', CasaFacade::class);

        $this->app->singleton('casa', function () {
            return new Casa();
        });

        /*
        |--------------------------------------------------------------------------
        | Register the Utilities
        |--------------------------------------------------------------------------
        */
        /**
         * Singleton Casa
         */
        $this->app->singleton(CasaService::class, function($app)
        {
            Log::info('Singleton Casa');
            return new CasaService(config('sitec.casa'));
        });

        // Register commands
        $this->registerCommandFolders([
            base_path('vendor/sierratecnologia/casa/src/Console/Commands') => '\Casa\Console\Commands',
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'casa',
        ];
    }

    /**
     * Register configs, migrations, etc
     *
     * @return void
     */
    public function registerDirectories()
    {
        // Publish config files
        $this->publishes([
            // Paths
            $this->getPublishesPath('config/sitec') => config_path('sitec'),
        ], ['config',  'sitec', 'sitec-config']);

        // // Publish casa css and js to public directory
        // $this->publishes([
        //     $this->getDistPath('casa') => public_path('assets/casa')
        // ], ['public',  'sitec', 'sitec-public']);

        $this->loadViews();
        $this->loadTranslations();

    }

    private function loadViews()
    {
        // View namespace
        $viewsPath = $this->getResourcesPath('views');
        $this->loadViewsFrom($viewsPath, 'casa');
        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/casa'),
        ], ['views',  'sitec', 'sitec-views']);

    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes([
            $this->getResourcesPath('lang') => resource_path('lang/vendor/casa')
        ], ['lang',  'sitec', 'sitec-lang', 'translations']);

        // Load translations
        $this->loadTranslationsFrom($this->getResourcesPath('lang'), 'casa');
    }

}
