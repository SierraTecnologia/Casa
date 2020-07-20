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

use Support\Traits\Providers\ConsoleTools;

use Casa\Facades\Casa as CasaFacade;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class CasaProvider extends ServiceProvider
{
    use ConsoleTools;

    public static $aliasProviders = [
        'Casa' => \Casa\Facades\Casa::class,
    ];

    public static $providers = [
        \Transmissor\TransmissorProvider::class,
        // \Casa\Providers\CasaServiceProvider::class,
        // \Casa\Providers\CasaRouteProvider::class,
    ];

    /**
     * Rotas do Menu
     */
    public static $menuItens = [
        'Painel' => [
            [
                'text'        => 'Casa',
                'icon'        => 'fas fa-fw fa-home',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \App\Models\Role::$ADMIN
            ],
            'Casa' => [
                [
                    'text'        => 'House',
                    'icon'        => 'fas fa-fw fa-home',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \App\Models\Role::$ADMIN
                ],
                'Dash' => [
                    [
                        'text'        => 'Dash House',
                        'route'       => 'rica.casa.dash.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                ],
                'House' => [
                    [
                        'text'        => 'Calendário',
                        'route'       => 'rica.casa.finances.index',
                        'icon'        => 'fas fa fa-calendar',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Financeiro',
                        'route'       => 'rica.casa.finances.index',
                        'icon'        => 'fas fa-fw fa-dollar',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Espolios',
                        'route'       => 'rica.casa.espolio.index',
                        'icon'        => 'fas fa-fw fa-car',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                ],
                'Social' => [
                    [
                        'text'        => 'Photo',
                        'route'       => 'rica.casa.social.photo.index',
                        'icon'        => 'fas fa-fw fa-dollar',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Persons',
                        'route'       => 'rica.casa.social.person.index',
                        'icon'        => 'fas fa-fw fa-dollar',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Persons',
                        'route'       => 'rica.casa.social.person.persons',
                        'icon'        => 'fas fa-fw fa-dollar',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                ],
                'Business' => [
                    [
                        'text'        => 'Clientes',
                        'route'       => 'rica.casa.comercial.clients.index',
                        'icon'        => 'fas fa-fw fa-dollar',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Projetos',
                        'route'       => 'rica.casa.comercial.projects.index',
                        'icon'        => 'fas fa-fw fa-dollar',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Arquitetura',
                        'route'       => 'rica.casa.manager.arquitetura.index',
                        'icon'        => 'fas fa-fw fa-car',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Fields',
                        'route'       => 'rica.casa.manager.fields.index',
                        'icon'        => 'fas fa-fw fa-car',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \App\Models\Role::$ADMIN
                    ],
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

        Route::group(
            [
            'namespace' => '\Casa\Http\Controllers',
            'prefix' => \Illuminate\Support\Facades\Config::get('application.routes.main'),
            'as' => 'rica.',
            // 'middleware' => 'rica',
            ], function ($router) {
                include __DIR__.'/Routes/web.php';
            }
        );
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getPublishesPath('config/sitec/casa.php'), 'sitec.casa');
        // Publish config files
        $this->publishes(
            [
            // Paths
            $this->getPublishesPath('config/follow') => config_path('follow')
            ], ['config',  'sitec', 'sitec-config']
        );
        
        $this->setProviders();
        $this->routes();

        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $loader = AliasLoader::getInstance();
        $loader->alias('Casa', CasaFacade::class);

        $this->app->singleton(
            'casa', function () {
                return new Casa();
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Register the Utilities
        |--------------------------------------------------------------------------
        */
        /**
         * Singleton Casa
         */
        $this->app->singleton(
            CasaService::class, function ($app) {
                Log::info('Singleton Casa');
                return new CasaService(\Illuminate\Support\Facades\Config::get('sitec.casa'));
            }
        );

        // Register commands
        $this->registerCommandFolders(
            [
            base_path('vendor/sierratecnologia/casa/src/Console/Commands') => '\Casa\Console\Commands',
            ]
        );


        // /**
        //  * Helpers
        //  */
        // Aqui noa funciona
        // if (!function_exists('casa_asset')) {
        //     function casa_asset($path, $secure = null)
        //     {
        //         return route('casa.assets').'?path='.urlencode($path);
        //     }
        // }
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
        $this->publishes(
            [
            // Paths
            $this->getPublishesPath('config/sitec') => config_path('sitec'),
            ], ['config',  'sitec', 'sitec-config']
        );

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
        $this->publishes(
            [
            $viewsPath => base_path('resources/views/vendor/casa'),
            ], ['views',  'sitec', 'sitec-views']
        );

    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes(
            [
            $this->getResourcesPath('lang') => resource_path('lang/vendor/casa')
            ], ['lang',  'sitec', 'sitec-lang', 'translations']
        );

        // Load translations
        $this->loadTranslationsFrom($this->getResourcesPath('lang'), 'casa');
    }

}
