<?php

namespace App\Providers;

use App\Services\Stats\IStatsService;
use Illuminate\Support\ServiceProvider;
use App\Services\Stats\CacheStatsService;
use App\Services\MovieFeed\MovieFeedService;
use App\Services\MovieFeed\FileMovieFeedService;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IStatsService::class, CacheStatsService::class);
        $this->app->bind(MovieFeedService::class, FileMovieFeedService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
