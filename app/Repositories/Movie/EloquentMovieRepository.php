<?php

namespace App\Repositories\Movie;

use App\Models\Movie;
use App\Repositories\Shared\EloquentCrudRepository;

class EloquentMovieRepository extends EloquentCrudRepository implements IMovieRepository
{
    /**
     * UserRepository constructor.
     *
     * @param Movie $model
     */
    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all the models.
     *
     * @param int $pageSize
     * @param int $page
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($pageSize = 10, $page = 0) : \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model
            ->paginate($pageSize);
    }
}
