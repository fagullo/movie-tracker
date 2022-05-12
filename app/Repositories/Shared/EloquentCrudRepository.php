<?php

namespace App\Repositories\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class EloquentCrudRepository.
 *
 * @property \Illuminate\Database\Eloquent\Model model
 */
abstract class EloquentCrudRepository implements ICrudRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all the models.
     *
     * @param int $page
     * @param int $pageSize
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($page = 0, $pageSize = 10)
    {
        return $this->model
            ->paginate($pageSize);
    }

    /**
     * Gets a model by ID.
     *
     * @param int $id The model's ID
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Creates a model.
     *
     * @param array $params The model fields
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($params)
    {
        return $this->model
            ->create($params);
    }

    /**
     * Updates a model.
     *
     * @param int   $id     The model's ID
     * @param array $params The model fields
     *
     * @return bool|int
     */
    public function update($id, $params)
    {
        return $this->model
            ->findOrFail($id)
            ->update($params);
    }

    /**
     * Deletes a model.
     *
     * @param int $id The model's ID
     *
     * @return bool|mixed|null
     *
     * @throws \Exception
     */
    public function delete($id)
    {
        return $this->model
            ->findOrFail($id)
            ->delete();
    }
}
