<?php

namespace App\Providers;

use App\Events\RemoveMovieLike;
use App\Events\MovieLikeUpdated;
use App\Events\MovieViewUpdated;
use App\Listeners\UpdateTopMovies;
use App\Listeners\UpdateTrendingMovies;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MovieLikeUpdated::class => [
            UpdateTopMovies::class
        ],
        MovieViewUpdated::class => [
            UpdateTrendingMovies::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
