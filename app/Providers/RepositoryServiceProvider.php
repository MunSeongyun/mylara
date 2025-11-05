<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\UserRepositoryInterface;
use App\Repository\UserRepository;
use App\Interfaces\PublisherRepositoryInterface;
use App\Repositories\EloquentPublisherRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );
        $this->app->bind(
            PublisherRepositoryInterface::class,
            EloquentPublisherRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
