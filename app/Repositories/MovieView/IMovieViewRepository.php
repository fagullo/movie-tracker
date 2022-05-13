<?php

namespace App\Repositories\MovieView;

interface IMovieViewRepository
{
    /**
     * Obtains the top n liked movies
     *
     * @param int $moviesCount number of movies to return
     * @param int $daysCount number of movies to return
     *
     * @return array
     */
    public function getTrendingMovieIds($moviesCount, $daysCount);

    /**
     * Checks if a movie is viewed by a given user
     *
     * @param int $movieId the DI of the movie
     * @param int $userId the ID of the user
     *
     * @return boolean
     */
    public function isMovieViewedBy($movieId, $userId);
}
