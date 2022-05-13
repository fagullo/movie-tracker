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

    /**
     * Checks if a movie is liekd by a given user
     *
     * @param int $movieId the DI of the movie
     * @param int $userId the ID of the user
     *
     * @return boolean
     */
    public function isMovieLikedBy($movieId, $userId);
}
