<?php

namespace App\Repositories\Movie;

interface IMovieRepository
{
    /**
     * Get all the models.
     *
     * @param int $pageSize
     * @param int $page
     *
     * @return array
     */
    public function paginate($pageSize = 0, $page = 10);

    /**
     * Get all the models matching with the given list of IDs.
     *
     * @param array $ids
     *
     * @return array
     */
    public function getByIds($ids);

    /**
     * Get a given number of models not included within the given list
     *
     * @param array $limit number of models to retrieve
     * @param array $ids list of IDs to avoid
     *
     * @return array
     */
    public function getNotIn($limit, $ids);

    /**
     * Marks a movie as liked by a given user.
     *
     * @param int $movieId
     * @param int $userId
     *
     * @return array
     */
    public function like($movieId, $userId);

    /**
     * Removes a like from a movie.
     *
     * @param int $movieId
     * @param int $userId
     *
     * @return array
     */
    public function removeLike($movieId, $userId);

    /**
     * Counts the number of likes received
     *
     * @param int $movieId
     *
     * @return array
     */
    public function likesCount($movieId);

    /**
     * Flags a movie as viewed by a given user.
     *
     * @param int $movieId
     * @param int $userId
     *
     * @return array
     */
    public function view($movieId, $userId);

    /**
     * Removes a view from a movie.
     *
     * @param int $movieId
     * @param int $userId
     *
     * @return array
     */
    public function removeView($movieId, $userId);

    /**
     * Counts the number of views received
     *
     * @param int $movieId
     *
     * @return array
     */
    public function viewsCount($movieId);
}
