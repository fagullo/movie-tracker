<?php

namespace App\Repositories\User;

interface IUserRepository
{
    /**
     * Get all the like stats by user.
     *
     * @param int $userId
     *
     * @return array
     */
    public function getLikeStats($userId);

    /**
     * Get all the view stats by user.
     *
     * @param int $userId
     *
     * @return array
     */
    public function getViewStats($userId);
}
