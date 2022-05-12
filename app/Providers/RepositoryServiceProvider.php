<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Movie\IMovieRepository;
use App\Repositories\Movie\EloquentMovieRepository;
use App\Repositories\MovieView\IMovieViewRepository;
use App\Repositories\MovieLike\IMovieLikeRepository;
use App\Repositories\MovieView\EloquentMovieViewRepository;
use App\Repositories\MovieLike\EloquentMovieLikeRepository;

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
        $this->app->bind(IMovieLikeRepository::class, EloquentMovieLikeRepository::class);
        $this->app->bind(IMovieViewRepository::class, EloquentMovieViewRepository::class);
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
