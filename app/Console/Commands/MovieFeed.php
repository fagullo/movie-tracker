<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MovieFeed\MovieFeedService;

class MovieFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movie:feed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        app()
            ->make(MovieFeedService::class)
            ->downloadMovies();
    }
}
