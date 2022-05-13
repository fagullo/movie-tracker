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
            ->topMovies(5);

        $trending = $statsService
            ->trendingMovies(5);

        return view('welcome', compact('top', 'trending'));
    }
}