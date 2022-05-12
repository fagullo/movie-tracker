<?php

namespace Tests\Unit;

use App\Models\Movie;
use Tests\TestCase;
use App\Repositories\Movie\IMovieRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class CrudRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Looking creating a movie.
     *
     * @return void
     */
    public function test_create_function()
    {
        $movie = app()
            ->make(IMovieRepository::class)
            ->create([
                'title' => 'Title',
                'full_title' => 'Title',
                'year' => 2022,
                'image' => 'https://via.placeholder.com/640x480.png',
                'crew' => 'People',
            ]);

        $this->assertEquals(Movie::count(), 1);
    }

    /**
     * Looking for an existing model.
     *
     * @return void
     */
    public function test_find_function()
    {
        $targetMovie = Movie::factory()->create();

        $searchMovie = app()
            ->make(IMovieRepository::class)
            ->find($targetMovie->id);

        $this->assertEquals($targetMovie->id, $searchMovie->id);
        $this->assertEquals($targetMovie->title, $searchMovie->title);
    }

    /**
     * Looks for an un-existing method
     *
     * @return void
     */
    public function test_find_error_function()
    {
        $searchMovie = app()
            ->make(IMovieRepository::class)
            ->find(1);

        $this->assertNull($searchMovie);
    }

    /**
     * Updates a model
     *
     * @return void
     */
    public function test_update_function()
    {
        $targetMovie = Movie::factory()->create();

        $repository = app()
            ->make(IMovieRepository::class);

        $isUpdated = $repository
            ->update($targetMovie->id, [
                'title' => 'new title'
            ]);

        $this->assertTrue($isUpdated);

        $searchMovie = $repository
            ->find($targetMovie->id);

        $this->assertNotEquals($targetMovie->title, $searchMovie->title);
    }

    /**
     * Tries updating a non-existing model and fails
     *
     * @return void
     */
    public function test_update_non_existing_model()
    {
        $this->expectException(ModelNotFoundException::class);

        app()
            ->make(IMovieRepository::class)
            ->update(1, [
                'title' => 'new title'
            ]);
    }

    /**
     * Deletes a model
     *
     * @return void
     */
    public function test_delete_function()
    {
        $movie = Movie::factory()->create();
        $this->assertEquals(Movie::count(), 1);

        app()
            ->make(IMovieRepository::class)
            ->delete($movie->id);

        $this->assertEquals(Movie::count(), 0);
    }

    /**
     * Tries deleting a non-existing model and fails
     *
     * @return void
     */
    public function test_delete_non_existing_model()
    {
        $this->expectException(ModelNotFoundException::class);

        app()
            ->make(IMovieRepository::class)
            ->delete(1);
    }
}
