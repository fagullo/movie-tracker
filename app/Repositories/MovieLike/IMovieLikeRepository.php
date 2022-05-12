<?php

namespace App\Repositories\MovieLike;

interface IMovieLikeRepository
{
    /**
     * Obtains the top n liked movies
     *
     * @param int $moviesCount number of movies to return
     *
     * @return array
     */
    public function getTopMovieIds($moviesCount);
}
