<?php

namespace App\Repositories\Movie;

use Carbon\Carbon;
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
     * @inheritdoc
     */
    public function paginate($pageSize = 10, $page = 0) : \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model
            ->paginate($pageSize);
    }

    /**
     * @inheritdoc
     */
    public function getByIds($ids)
    {
        return $this->model
            ->whereIn('id', $ids)
            ->get();
    }

    /**
     * @inheritdoc
     */
    public function like($movieId, $userId)
    {
        $movie = $this
            ->find($movieId);

        $movie->likes()
            ->attach($userId, [
                'liked_at' => Carbon::now()
            ]);
    }

    /**
     * @inheritdoc
     */
    public function removeLike($movieId, $userId)
    {
        $movie = $this
            ->find($movieId);

        $movie->likes()
            ->detach($userId);
    }

    /**
     * @inheritdoc
     */
    public function likesCount($movieId)
    {
        $movie = $this
            ->find($movieId);

        return $movie
            ->likes()
            ->count();
    }

    /**
     * @inheritdoc
     */
    public function view($movieId, $userId)
    {
        $movie = $this
            ->find($movieId);

        $movie->views()
            ->attach($userId, [
                'viewed_at' => Carbon::now()
            ]);
    }

    /**
     * @inheritdoc
     */
    public function removeView($movieId, $userId)
    {
        $movie = $this
            ->find($movieId);

        $movie
            ->views()
            ->detach($userId);
    }

    /**
     * @inheritdoc
     */
    public function viewsCount($movieId)
    {
        $movie = $this
            ->find($movieId);

        return $movie
            ->views()
            ->count();
    }


}
