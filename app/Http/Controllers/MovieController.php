<?php

namespace App\Http\Controllers;

use App\Repositories\Movie\IMovieRepository;

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

        $isLiked = true;
        $isViewed = false;

        return view('movie', compact('movie', 'isLiked', 'isViewed'));
    }
}