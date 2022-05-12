<?php

namespace App\Services\Stats;

use Illuminate\Support\Facades\Cache;
use App\Repositories\Movie\IMovieRepository;
use App\Repositories\MovieView\IMovieViewRepository;
use App\Repositories\MovieLike\IMovieLikeRepository;

class CacheStatsService implements IStatsService
{

    /**
     * @inheritDoc
     */
    public function topMovies($moviesCount = 5)
    {
        $key = sprintf('top_%u_movies', $moviesCount);
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $movies = $this->calculateTopMovies($moviesCount);

        Cache::put($key, $movies);

        return $movies;
    }

    /**
     * Calculates which are the top n movies
     *
     * @param $moviesCount
     * @return array
     */
    private function calculateTopMovies($moviesCount)
    {
        $movieIds = app()
            ->make(IMovieLikeRepository::class)
            ->getTopMovieIds($moviesCount);

        $movies = app()
            ->make(IMovieRepository::class)
            ->getByIds($movieIds);

        return $movies->sortBy(function($movie) use ($movieIds) {
            return array_search($movie->id, $movieIds);
        });
    }


    /**
     * Calculates which are the trending movies within a given time window
     *
     * @param int $moviesCount
     * @param int $moviesCount
     * @return array
     */
    private function calculateTrendingMovies($moviesCount, $daysCount)
    {
        $movieIds = app()
            ->make(IMovieViewRepository::class)
            ->getTrendingMovieIds($moviesCount, $daysCount);

        $movies = app()
            ->make(IMovieRepository::class)
            ->getByIds($movieIds);

        return $movies->sortBy(function($movie) use ($movieIds) {
            return array_search($movie->id, $movieIds);
        });
    }

    /**
     * @inheritDoc
     */
    public function trendingMovies($moviesCount = 5, $daysCount = 7)
    {
        $key = sprintf('trending_%u_movies+%u', $moviesCount, $daysCount);
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $movies = $this->calculateTrendingMovies($moviesCount, $daysCount);

        Cache::put($key, $movies);

        return $movies;
    }
}
