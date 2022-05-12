<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Movie;
use App\Services\Stats\IStatsService;
use App\Repositories\Movie\IMovieRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\MovieLike\IMovieLikeRepository;


class StatsServiceTest extends TestCase
{
    use RefreshDatabase;

    private function seedDatabase()
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

        for($i = 0; $i < $moviesCount; ++$i) {
            $movie = $movies[$i];
            for($j = 0; $j <= $i; ++$j) {
                $user = $users[$j];
                $movieRepository->like($movie->id, $user->id);
                $movieRepository->view($movie->id, $user->id);
            }
        }
    }

    /**
     * Test that top movies are correctly returned.
     *
     * @return void
     */
    public function test_top_movies()
    {
        $this->seedDatabase();
        $statsService = app()
            ->make(IStatsService::class);

        $topMovies = $statsService
            ->topMovies(1);
        $this->assertCount(1, $topMovies);

        $topMovies = $statsService
            ->topMovies(5);
        $this->assertCount(5, $topMovies);
    }

    /**
     * Test that top movies are correctly returned.
     *
     * @return void
     */
    public function test_trending_movies()
    {
        $this->seedDatabase();
        $statsService = app()
            ->make(IStatsService::class);

        $topMovies = $statsService
            ->trendingMovies(1, 1);
        $this->assertCount(1, $topMovies);

        $topMovies = $statsService
            ->trendingMovies(5, 1);
        $this->assertCount(5, $topMovies);
    }
}
