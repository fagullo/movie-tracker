<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Movie;
use App\Repositories\Movie\IMovieRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\MovieView\IMovieViewRepository;


class MovieViewsRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that trending movies are correctly returned.
     *
     * @return void
     */
    public function test_trending_movies()
    {
        $moviesCount = 10;
        $movies = Movie::factory()
            ->count($moviesCount)
            ->create();

        $users = User::factory()
            ->count($moviesCount)
            ->create();

        $movieRepository =  app()
            ->make(IMovieRepository::class);

        $movieViewRepository = app()
            ->make(IMovieViewRepository::class);

        for($i = 0; $i < $moviesCount; ++$i) {
            $movie = $movies[$i];
            for($j = 0; $j <= $i; ++$j) {
                $user = $users[$j];
                $movieRepository->view($movie->id, $user->id);
            }
        }

        $topMovies = $movieViewRepository
            ->getTrendingMovieIds(1, 1);
        $this->assertCount(1, $topMovies);
        //The movie most viewed is the last of the list
        $this->assertEquals($movies[$moviesCount - 1]->id, $topMovies[0]);

        $topMovies = $movieViewRepository
            ->getTrendingMovieIds(5, 1);
        $this->assertCount(5, $topMovies);
        //The top 5 movies should match with the latest 5 IDs as $moviesCount = 10 and id is auto-incremented we should see from 10 to 6
        $this->assertEquals([10, 9, 8, 7, 6], $topMovies);
    }
}
