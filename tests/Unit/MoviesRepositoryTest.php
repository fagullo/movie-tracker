<?php

namespace Tests\Unit;

use App\Models\Movie;
use Tests\TestCase;
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
}
