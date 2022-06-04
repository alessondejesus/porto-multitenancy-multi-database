<?php

namespace App\Ship\Providers;

use App\Ship\Parents\Providers\MainProvider;
use App\Ship\Parents\Providers\RoutesProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Laravel\Passport\Passport;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeServiceProvider as TelescopeServiceProviderAlias;

class ShipProvider extends MainProvider
{
    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     */
    public array $serviceProviders = [
        RoutesProvider::class,
        HorizonServiceProvider::class
    ];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     */
    protected array $aliases = [];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Load the ide-helper service provider only in non production environments.
         */
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        if(config("telescope.enabled")){
            $this->app->register(TelescopeServiceProviderAlias::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        Passport::ignoreMigrations();
        Telescope::ignoreMigrations();

        parent::register();
    }
}
