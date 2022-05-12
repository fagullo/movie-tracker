<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Movie;
use App\Repositories\Movie\IMovieRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\MovieLike\IMovieLikeRepository;


class MovieLikesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that top movies are correctly returned.
     *
     * @return void
     */
    public function test_top_movies()
    {
        $moviesCount = 10;
        $movies = Movie::factory()
            ->count($moviesCount)
            ->create();

        $users = User::factory()
            ->count($moviesCount)
            ->create();

        $repository =  app()
            ->make(IMovieRepository::class);

        for($i = 0; $i < $moviesCount; ++$i) {
            $movie = $movies[$i];
            for($j = 0; $j <= $i; ++$j) {
                $user = $users[$j];
                $repository->like($movie->id, $user->id);
            }
        }

        $topMovies = app()
            ->make(IMovieLikeRepository::class)
            ->getTopMovieIds(1);
        $this->assertCount(1, $topMovies);
        //The movie most liked is the last of the list
        $this->assertEquals($movies[$moviesCount - 1]->id, $topMovies[0]);

        $topMovies = app()
            ->make(IMovieLikeRepository::class)
            ->getTopMovieIds(5);
        $this->assertCount(5, $topMovies);
    }
}
