<?php

namespace App\Repositories\Shared;

interface ICrudRepository
{
    /**
     * Gets a model by ID.
     *
     * @param int  $id The model's ID
     *
     * @return App\Model
     */
    public function find($id);

    /**
    * Creates a model.
    *
    * @param array $params The model fields
    *
    * @return App\Model
    */
    public function create($params);

    /**
    * Updates a model.
    *
    * @param int   $id     The model's ID
    * @param array $params The model fields
    *
    * @return App\Model
    */
    public function update($id, $params);

    /**
     * Deletes a model.
     *
     * @param int $id The model's ID
     *
     * @return bool
     */
    public function delete($id);
}
