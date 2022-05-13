<?php

namespace App\Services\Stats;

interface IStatsService
{
    /**
     * Refresh top movies list
     */
    public function refreshTopMovies();

    /**
     * Refresh trending movies list
     */
    public function refreshTrendingMovies();

    /**
     * Get a list of the top (most liked) movies.
     *
     * @param int $moviesCount the number of movies to be returned
     * @return array
     */
    public function topMovies($moviesCount = 5);

    /**
     * Get a list of the trending (most viewed) movies within a given time window.
     *
     * @param int $moviesCount the number of movies to be returner
     * @param int $daysCount the number of days to take into account
     * @return array
     */
    public function trendingMovies($moviesCount = 5, $daysCount = 7);
}
