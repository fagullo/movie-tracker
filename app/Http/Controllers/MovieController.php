<?php

namespace App\Http\Controllers;

use App\Repositories\Movie\IMovieLikeRepository;

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
}