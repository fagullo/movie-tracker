<?php

namespace App\Services\MovieFeed;

use App\Repositories\Movie\IMovieRepository;

abstract class MovieFeedService
{
    /**
     * Obtains a list of movies and saves in the local database.
     */
    abstract protected function getMovies();

    /**
     * Obtains a list of movies from and stores in the local database
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function downloadMovies()
    {
        $movieRepository = app()
            ->make(IMovieRepository::class);

        foreach($this->getMovies() as $movie) {
            $movieRepository
                ->create([
                    'title' => $movie->title,
                    'full_title' => $movie->fullTitle,
                    'year' => $movie->year,
                    'image' => $movie->image,
                    'crew' => $movie->crew,
                    'imdb_reference' => $movie->id,
                    'imdb_rating' => $movie->imDbRating,
                    'imdb_rating_count' => $movie->imDbRatingCount,
                ]);
        }
    }
}
