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
}
