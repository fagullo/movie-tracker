<?php

namespace App\Repositories\User;

use Carbon\Carbon;
use App\Models\User;
use App\Repositories\Shared\EloquentCrudRepository;

class EloquentUserRepository extends EloquentCrudRepository implements IUserRepository
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    private function calculateStats($interactions, $dateField)
    {
        $thisWeek = Carbon::now()->startOfWeek();
        $lastWeek = Carbon::now()->subWeek()->startOfWeek();
        $thisWeekLikeCount = 0;
        $lastWeekLikeCount = 0;

        foreach($interactions as $interaction) {
            if ($interaction->{$dateField}->isAfter($thisWeek)) {
                $thisWeekLikeCount++;
            }elseif ($interaction->{$dateField}->isAfter($lastWeek)){
                $lastWeekLikeCount++;
            }
        }

        $likeRate = $lastWeekLikeCount == 0 ? 100 : ($thisWeekLikeCount * 100) / $lastWeekLikeCount;

        return [
            'current_week' => $thisWeekLikeCount,
            'last_week' => $lastWeekLikeCount,
            'total' => $interactions->count(),
            'rate' => $likeRate,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getLikeStats($userId)
    {
        $user = $this->find($userId);

        return $this->calculateStats($user->likes, 'liked_at');
    }

    /**
     * @inheritdoc
     */
    public function getViewStats($userId)
    {
        $user = $this->find($userId);

        return $this->calculateStats($user->views, 'viewed_at');
    }


}
