<?php

namespace App\Providers;

use App\services\clients\contracts\ClientServiceInterface;
use App\services\clients\ClientService;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use App\services\testimonys\TestimonyService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ClientServiceInterface::class,
             ClientService::class); 
        $this->app->bind(
            TestimonyServiceInterface::class,
             TestimonyService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
