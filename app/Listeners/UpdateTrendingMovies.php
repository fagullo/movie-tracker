<?php

namespace App\Listeners;

use App\Events\MovieLike;
use App\Events\MovieViewUpdated;
use App\Services\Stats\IStatsService;

class UpdateTrendingMovies
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\MovieViewUpdated  $event
     * @return void
     */
    public function handle(MovieViewUpdated $event)
    {
        app()->make(IStatsService::class)
            ->refreshTrendingMovies();
    }
}
