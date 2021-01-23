<?php

namespace Casa;

use App;
use Casa\Facades\Casa as CasaFacade;
use Casa\Services\CasaService;
use Config;
use Illuminate\Foundation\AliasLoader;

use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use Log;

use Muleta\Traits\Providers\ConsoleTools;
use Route;

class CasaProvider extends ServiceProvider
{
    use ConsoleTools;

    public $packageName = 'casa';
    const pathVendor = 'sierratecnologia/casa';

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
        // 'Painel' => [
            [
                'text'        => 'Casa',
                'icon'        => 'fas fa-fw fa-home',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                // 'section'       => 'painel',
                'feature' => 'casa',
                'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
            [
                'text'        => 'Historico',
                'icon'        => 'fas fa-fw fa-home',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'section'       => 'painel',
                'feature' => 'casa',
                'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                'level'       => 1, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
            'Historico' => [
                [
                    'text'        => 'Timeline',
                    'route'       => 'painel.casa.timelines.index',
                    'icon'        => 'fas fa-fw fa-gavel',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section' => "painel",
                    'feature' => 'casa',
                    'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                    'level'       => 1, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \Porteiro\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Histórico de Local',
                    'route'       => 'painel.casa.localizations.index',
                    'icon'        => 'fas fa-fw fa-gavel',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'section' => "painel",
                    'feature' => 'casa',
                    'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                    'level'       => 1, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \Porteiro\Models\Role::$ADMIN
                ]
            ],
            'Casa' => [
                // [
                //     'text'        => 'House',
                //     'icon'        => 'fas fa-fw fa-home',
                //     'icon_color'  => 'blue',
                //     'label_color' => 'success',
                //     'section'       => 'painel',
                //     'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //     // 'access' => \Porteiro\Models\Role::$ADMIN
                // ],
                [
                    'text'        => 'Saldos',
                    'route'       => 'rica.casa.saldos.index',
                    'icon'        => 'fas fa-fw fa-home',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'feature' => 'casa',
                    // 'section'       => 'painel',
                    'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \Porteiro\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Spents',
                    'route'       => 'rica.casa.spents.index',
                    'icon'        => 'fas fa-fw fa-home',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'feature' => 'casa',
                    'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                    // 'section'       => 'painel',
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \Porteiro\Models\Role::$ADMIN
                ],
                [
                    'text'        => 'Propostas',
                    'route'       => 'rica.casa.propostas.index',
                    'icon'        => 'fas fa-fw fa-home',
                    'icon_color'  => 'blue',
                    'label_color' => 'success',
                    'feature' => 'casa',
                    'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                    // 'section'       => 'painel',
                    'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                    // 'access' => \Porteiro\Models\Role::$ADMIN
                ],
                'Calendar' => 
                [
                    [
                        'text'        => 'Calendar acaoHumanas',
                        'route'       => 'rica.casa.acaoHumanas.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        // 'section'       => 'painel',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Calendar estimates',
                        'route'       => 'rica.casa.estimates.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        // 'section'       => 'painel',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Calendar events',
                        'route'       => 'rica.casa.events.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        // 'section'       => 'painel',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Calendar Tasks',
                        'route'       => 'rica.casa.tasks.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        // 'section'       => 'painel',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                ],
                'Economia' => [
                    [
                        'text'        => 'Economic Workers',
                        'route'       => 'rica.casa.workers.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        // 'section'       => 'painel',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Economic rendas',
                        'route'       => 'rica.casa.rendas.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        // 'section'       => 'painel',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Economic gastos',
                        'route'       => 'rica.casa.gastos.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        // 'section'       => 'painel',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                    [
                        'text'        => 'Economic routines',
                        'route'       => 'rica.casa.routines.index',
                        'icon'        => 'fas fa-fw fa-home',
                        'icon_color'  => 'blue',
                        'label_color' => 'success',
                        'feature' => 'casa',
                        'dev_status'  => 2, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
                        // 'section'       => 'painel',
                        'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                        // 'access' => \Porteiro\Models\Role::$ADMIN
                    ],
                ],
                // 'House' => [
                //     [
                //         'text'        => 'Calendário',
                //         'route'       => 'rica.casa.finances.index',
                //         'icon'        => 'fas fa fa-calendar',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                //     [
                //         'text'        => 'Financeiro',
                //         'route'       => 'rica.casa.finances.index',
                //         'icon'        => 'fas fa-fw fa-dollar',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                //     [
                //         'text'        => 'Espolios',
                //         'route'       => 'rica.casa.espolio.index',
                //         'icon'        => 'fas fa-fw fa-car',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                // ],
                // 'Social' => [
                //     [
                //         'text'        => 'Photo',
                //         'route'       => 'rica.casa.social.photo.index',
                //         'icon'        => 'fas fa-fw fa-dollar',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                //     [
                //         'text'        => 'Persons',
                //         'route'       => 'rica.casa.social.person.index',
                //         'icon'        => 'fas fa-fw fa-dollar',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                //     [
                //         'text'        => 'Persons',
                //         'route'       => 'rica.casa.social.person.persons',
                //         'icon'        => 'fas fa-fw fa-dollar',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                // ],
                // 'Business' => [
                //     [
                //         'text'        => 'Clientes',
                //         'route'       => 'rica.casa.comercial.clients.index',
                //         'icon'        => 'fas fa-fw fa-dollar',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                //     [
                //         'text'        => 'Projetos',
                //         'route'       => 'rica.casa.comercial.projects.index',
                //         'icon'        => 'fas fa-fw fa-dollar',
                //         'icon_color'  => 'blue',
                //         'label_color' => 'success',
                //         'section'       => 'painel',
                //         'level'       => 3, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                //         // 'access' => \Porteiro\Models\Role::$ADMIN
                //     ],
                // ],
            ],
        // ],
    ];

    /**
     * Alias the services in the boot.
     */
    public function boot()
    {
        
        // Register configs, migrations, etc
        $this->registerDirectories();

        // COloquei no register pq nao tava reconhecendo as rotas para o adminlte
        $this->app->booted(function () {
            $this->routes();
        });
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

        /**
         * Transmissor; Routes
         */
        $this->loadRoutesForRiCa(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'routes');
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->mergeConfigFrom($this->getPublishesPath('config'.DIRECTORY_SEPARATOR.'sitec'.DIRECTORY_SEPARATOR.'casa.php'), 'sitec.casa');
        // Publish config files
        $this->publishes(
            [
            // Paths
            $this->getPublishesPath('config/follow') => config_path('follow')
            ],
            ['config',  'sitec', 'sitec-config']
        );
        
        $this->setProviders();

        // Register Migrations
        $this->loadMigrationsFrom(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations');

        $loader = AliasLoader::getInstance();
        $loader->alias('Casa', CasaFacade::class);

        $this->app->singleton(
            'casa',
            function () {
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
            CasaService::class,
            function ($app) {
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
            $this->getPublishesPath('config'.DIRECTORY_SEPARATOR.'sitec') => config_path('sitec'),
            ],
            ['config',  'sitec', 'sitec-config']
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
            $viewsPath => base_path('resources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'casa'),
            ],
            ['views',  'sitec', 'sitec-views']
        );
    }
    
    private function loadTranslations()
    {
        // Publish lanaguage files
        $this->publishes(
            [
            $this->getResourcesPath('lang') => resource_path('lang'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'casa')
            ],
            ['lang',  'sitec', 'sitec-lang', 'translations']
        );

        // Load translations
        $this->loadTranslationsFrom($this->getResourcesPath('lang'), 'casa');
    }
}
