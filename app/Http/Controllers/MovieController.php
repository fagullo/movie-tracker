<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Movie\IMovieRepository;
use App\Repositories\MovieView\IMovieViewRepository;
use App\Repositories\MovieLike\IMovieLikeRepository;

class MovieController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $movies = app()->make(IMovieRepository::class)
            ->paginate(config('movies.page_size'));

        return view('movie-list', compact('movies'));
    }

    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function show($movieId)
    {
        $movie = app()->make(IMovieRepository::class)
            ->find($movieId);

        $userId = Auth::check() ? Auth::user()->id : null;

        $isLiked = app()
            ->make(IMovieLikeRepository::class)
            ->isMovieLikedBy($movieId, $userId);

        $isViewed = app()
            ->make(IMovieViewRepository::class)
            ->isMovieViewedBy($movieId, $userId);;

        return view('movie', compact('movie', 'isLiked', 'isViewed'));
    }
}