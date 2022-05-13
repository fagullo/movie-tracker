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
    public function refreshTopMovies()
    {
        $key = $this->generateTopMoviesKey(config('movies.top-movies-count'));
        Cache::forget($key);
    }

    /**
     * @inheritDoc
     */
    public function refreshTrendingMovies()
    {
        $key = $this->generateTrendingMoviesKey(
            config('movies.trending-movies-count'),
            config('movies.trending-movies-days')
        );
        Cache::forget($key);
    }

    /**
     * @inheritDoc
     */
    public function topMovies($moviesCount = 5)
    {
        $key = $this->generateTopMoviesKey($moviesCount);
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

        $movies = $movies->sortBy(function ($movie) use ($movieIds) {
            return array_search($movie->id, $movieIds);
        });

        return $this->completeMovieList($movies, $moviesCount, $movieIds);
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

        $movies = $movies->sortBy(function ($movie) use ($movieIds) {
            return array_search($movie->id, $movieIds);
        });

        return $this->completeMovieList($movies, $moviesCount, $movieIds);
    }

    /**
     * Completes a given list with some extra movies if the list count is under the guven limit.
     *
     * @param array $movies      target list
     * @param int   $moviesCount limit
     * @param array $notIn       IDs to avoid
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    private function completeMovieList($movies, $moviesCount, $notIn = [])
    {
        $limit = $moviesCount - count($movies);

        if ($limit > 0) {
            return $movies
                ->concat(
                    app()
                        ->make(IMovieRepository::class)
                        ->getNotIn($limit, $notIn)
                );
        }

        return $movies;
    }

    /**
     * @inheritDoc
     */
    public function trendingMovies($moviesCount = 5, $daysCount = null)
    {
        if ($daysCount == null) {
            $daysCount = config('movies.trending-movies-days');
        }

        $key = $this->generateTrendingMoviesKey($moviesCount, $daysCount);
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $movies = $this->calculateTrendingMovies($moviesCount, $daysCount);

        Cache::put($key, $movies);

        return $movies;
    }

    /**
     * Generates the cache top movies key for a given number of movies
     *
     * @param int $moviesCount the number of movies
     * @return string
     */
    private function generateTopMoviesKey($moviesCount)
    {
        return sprintf('top_%u_movies', $moviesCount);
    }

    /**
     * Generates the cache top movies key for a given number of movies
     *
     * @param int $moviesCount the number of movies
     * @param int $daysCount the number of days
     * @return string
     */
    private function generateTrendingMoviesKey($moviesCount, $daysCount)
    {
        return sprintf('trending_%u_movies+%u', $moviesCount, $daysCount);
    }
}
