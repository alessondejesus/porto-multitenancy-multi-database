<?php

namespace App\Containers\AdminSection\Property\Providers;

use App\Containers\AdminSection\Property\Models\Property;
use App\Ship\Parents\Providers\MainProvider;

/**
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends MainProvider
{
    /**
     * Container Service Providers.
     */
    public array $serviceProviders = [
        // InternalServiceProviderExample::class,
    ];

    /**
     * Container Aliases
     */
    public array $aliases = [
        // 'Foo' => Bar::class,
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

        \Spatie\PrefixedIds\PrefixedIds::registerModels([
            'pro' => Property::class,
        ]);

        // $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        // ...
    }
}
