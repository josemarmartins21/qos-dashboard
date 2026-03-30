<?php

namespace App\Providers;

use App\factorys\contracts\TestimonySocialProveInterface;
use App\Observers\contracts\IVisitorObservable;
use App\Observers\VisitorObservable;
use App\services\clientprovesocial\ClientProveSocialService;
use App\services\clientprovesocial\contracts\ClientProveSocialInterface;
use App\services\clients\contracts\ClientServiceInterface;
use App\services\clients\ClientService;
use App\services\messages\contracts\MessageServiceInterface;
use App\services\messages\MessageService;
use App\services\questions\contracts\QuestionServiceInterface;
use App\services\questions\QuestionService;
use App\services\testimonys\contracts\TestimonyServiceInterface;
use App\services\testimonys\TestimonyService;
use App\services\visitors\contracts\VisitorServiceInterface;
use App\services\visitors\VisitorService;
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
            ClientService::class
        ); 

        $this->app->bind(
            ClientProveSocialInterface::class,
            ClientProveSocialService::class
        );


        $this->app->bind(
            TestimonyServiceInterface::class,
            TestimonyService::class
        );

        $this->app->bind(
        ClientProveSocialInterface::class,
        ClientProveSocialService::class
        );

        $this->app->bind(
        QuestionServiceInterface::class,
        QuestionService::class
        );
        $this->app->bind(
            VisitorServiceInterface::class,
            VisitorService::class,
        );
        $this->app->bind(
            MessageServiceInterface::class,
            MessageService::class,
        );
        $this->app->bind(
            IVisitorObservable::class,
            VisitorObservable::class,
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
