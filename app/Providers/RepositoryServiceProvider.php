<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Movie\IMovieRepository;
use App\Repositories\Movie\EloquentMovieRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IMovieRepository::class, EloquentMovieRepository::class);
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
