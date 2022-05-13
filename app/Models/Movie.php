<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'full_title',
        'year',
        'image',
        'crew',
    ];

    /**
     * The likes received.
     */
    public function likes()
    {
        return $this->belongsToMany(User::class, 'users_like_movies', 'movie_id', 'user_id');
    }

    /**
     * The views received.
     */
    public function views()
    {
        return $this->belongsToMany(User::class, 'users_view_movies', 'movie_id', 'user_id');
    }
}
