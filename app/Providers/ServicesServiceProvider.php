<?php

namespace App\Providers;

use App\Services\Stats\IStatsService;
use Illuminate\Support\ServiceProvider;
use App\Services\Stats\CacheStatsService;

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
