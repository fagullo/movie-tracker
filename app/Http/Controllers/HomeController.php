<?php

namespace App\Http\Controllers;

use App\Services\Stats\IStatsService;
use App\Repositories\Movie\IMovieRepository;

class HomeController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $statsService = app()
            ->make(IStatsService::class);

        $top = $statsService
            ->topMovies(config('movies.top-movies-count'));

        $trending = $statsService
            ->trendingMovies(config('movies.trending-movies-count'));

        return view('welcome', compact('top', 'trending'));
    }
}