<?php

namespace App\Listeners;

use App\Events\MovieLikeUpdated;
use App\Services\Stats\IStatsService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTopMovies
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
     * @param  \App\Events\MovieLikeUpdated $event
     * @return void
     */
    public function handle(MovieLikeUpdated $event)
    {
        app()->make(IStatsService::class)
            ->refreshTopMovies();
    }
}
