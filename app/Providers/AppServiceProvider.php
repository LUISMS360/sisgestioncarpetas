<?php

namespace App\Providers;

use App\Interfaces\CarpetaRepositoryInterface;
use App\Interfaces\FutRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\CarpetaRepository;
use App\Repositories\FutRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(FutRepositoryInterface::class,FutRepository::class);
        $this->app->bind(CarpetaRepositoryInterface::class,CarpetaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
