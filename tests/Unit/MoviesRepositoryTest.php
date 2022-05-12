<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Movie;
use App\Repositories\Movie\IMovieRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;


class MoviesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Looking creating a movie.
     *
     * @return void
     */
    public function test_paginated_results()
    {
        Movie::factory()
            ->count(25)
            ->create();

        $movies = app()
            ->make(IMovieRepository::class)
            ->paginate(10);

        $this->assertEquals($movies->count(), 10);
        $this->assertEquals($movies->total(), 25);
        $this->assertEquals($movies->lastPage(), 3);
    }

    /**
     * Test when a movie is liked
     *
     * @return void
     */
    public function test_flag_a_movie_as_liked()
    {
        $movie = Movie::factory()
            ->create();

        $user = User::factory()
            ->create();

        $this->assertEquals($movie->likes()->count(), 0);

        app()
            ->make(IMovieRepository::class)
            ->like($movie->id, $user->id);

        $this->assertEquals($movie->likes()->count(), 1);
    }

    /**
     * Unlikes a movie
     *
     * @return void
     */
    public function test_remove_a_movie_like()
    {
        $movie = Movie::factory()
            ->create();

        $user = User::factory()
            ->create();

        $repository =  app()
            ->make(IMovieRepository::class);

        $repository->like($movie->id, $user->id);
        $this->assertEquals($movie->likes()->count(), 1);

        $repository->removeLike($movie->id, $user->id);
        $this->assertEquals($movie->likes()->count(), 0);
    }

    /**
     * Counts the number of likes received
     *
     * @return void
     */
    public function test_likes_count()
    {
        $movie = Movie::factory()
            ->create();

        $users = User::factory()
            ->count(rand(5, 10))
            ->create();

        $repository =  app()
            ->make(IMovieRepository::class);

        foreach($users as $user) {
            $repository->like($movie->id, $user->id);
        }

        $likesCount = $repository
            ->likesCount($movie->id);

        $this->assertEquals($users->count(), $likesCount);
    }

    /**
     * Test when a movie is flagged as viewed
     *
     * @return void
     */
    public function test_flag_a_movie_as_viewed()
    {
        $movie = Movie::factory()
            ->create();

        $user = User::factory()
            ->create();

        $this->assertEquals($movie->views()->count(), 0);

        app()
            ->make(IMovieRepository::class)
            ->view($movie->id, $user->id);

        $this->assertEquals($movie->views()->count(), 1);
    }

    /**
     * Removes a view from a movie
     *
     * @return void
     */
    public function test_remove_a_movie_view()
    {
        $movie = Movie::factory()
            ->create();

        $user = User::factory()
            ->create();

        $repository =  app()
            ->make(IMovieRepository::class);

        $repository->view($movie->id, $user->id);
        $this->assertEquals($movie->views()->count(), 1);

        $repository->removeView($movie->id, $user->id);
        $this->assertEquals($movie->views()->count(), 0);
    }

    /**
     * Counts the number of views
     *
     * @return void
     */
    public function test_views_count()
    {
        $movie = Movie::factory()
            ->create();

        $users = User::factory()
            ->count(rand(5, 10))
            ->create();

        $repository =  app()
            ->make(IMovieRepository::class);

        foreach($users as $user) {
            $repository->view($movie->id, $user->id);
        }

        $viewsCount = $repository
            ->viewsCount($movie->id);

        $this->assertEquals($users->count(), $viewsCount);
    }
}
