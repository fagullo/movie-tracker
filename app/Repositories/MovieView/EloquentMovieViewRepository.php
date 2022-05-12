<?php

namespace App\Repositories\MovieView;

use Carbon\Carbon;
use App\Models\MovieView;
use App\Repositories\Shared\EloquentCrudRepository;

class EloquentMovieViewRepository extends EloquentCrudRepository implements IMovieViewRepository
{
    /**
     * UserRepository constructor.
     *
     * @param MovieView $model
     */
    public function __construct(MovieView $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritdoc
     */
    public function getTrendingMovieIds($moviesCount, $daysCount)
    {
        $date = Carbon::now()
            ->startOfDay()
            ->subDays($daysCount);

        return $this->model
            ->selectRaw('count(*) as views_count, movie_id')
            ->where('viewed_at', '>', $date)
            ->orderBy('views_count', 'desc')
            ->groupBy('movie_id')
            ->limit($moviesCount)
            ->get()
            ->pluck('movie_id')
            ->toArray();
    }


}
