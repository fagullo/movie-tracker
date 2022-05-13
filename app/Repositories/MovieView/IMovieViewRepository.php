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
}
