<?php

namespace App\Repositories\MovieLike;

use Carbon\Carbon;
use App\Models\MovieLike;
use App\Repositories\Shared\EloquentCrudRepository;

class EloquentMovieLikeRepository extends EloquentCrudRepository implements IMovieLikeRepository
{
    /**
     * UserRepository constructor.
     *
     * @param MovieLike $model
     */
    public function __construct(MovieLike $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritdoc
     */
    public function getTopMovieIds($moviesCount)
    {
        return $this->model
            ->selectRaw('count(*) as likes_count, movie_id')
            ->orderBy('likes_count', 'desc')
            ->groupBy('movie_id')
            ->limit($moviesCount)
            ->get()
            ->pluck('movie_id')
            ->toArray();
    }

    /**
     * @inheritdoc
     */
    public function isMovieLikedBy($movieId, $userId)
    {
        $like = $this->model
            ->where('movie_id', $movieId)
            ->where('user_id', $userId)
            ->first();

        return $like != null;
    }


}
