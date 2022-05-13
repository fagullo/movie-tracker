<?php

namespace Tests\Unit;

use App\Models\Movie;
use Tests\TestCase;
use ReflectionClass;
use Mockery\MockInterface;
use Illuminate\Support\Facades\Config;
use App\Services\MovieFeed\FileMovieFeedService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Filesystem\FileNotFoundException;


class FileMovieFeedServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test calling with a non-existing file.
     *
     * @return void
     */
    public function test_invalid_file()
    {
        $class = new ReflectionClass(FileMovieFeedService::class);
        $method = $class->getMethod('getMovies');
        $method->setAccessible(true);

        $this->expectException(FileNotFoundException::class);
        Config::set('movies.feed', 'not_existing_file.json');
        $method->invoke(new FileMovieFeedService());
    }

    /**
     * Test calling with a valid movies file.
     *
     * @return void
     */
    public function test_read_movies_from_json_file()
    {
        $class = new ReflectionClass(FileMovieFeedService::class);
        $method = $class->getMethod('getMovies');
        $method->setAccessible(true);

        $mock = $this->partialMock(FileMovieFeedService::class, function (MockInterface $mock) use($method) {
            $movie = new \stdClass();
            $movie->title = 'title';
            $movie->fullTitle = 'full title';
            $movie->year = 2022;
            $movie->image = 'image';
            $movie->crew = 'people';
            $movie->id = '123456';
            $movie->imDbRating = 7.8;
            $movie->imDbRatingCount = 123456;

            $mock->shouldAllowMockingProtectedMethods()
                ->shouldReceive('getMovies')
                ->once()
                ->andReturn([$movie]);
        });

        $mock->downloadMovies();

        $this->assertEquals(Movie::count(), 1);
    }
}
