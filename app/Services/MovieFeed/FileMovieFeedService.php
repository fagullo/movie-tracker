<?php

namespace App\Services\MovieFeed;

use Illuminate\Support\Facades\Storage;
use App\Exceptions\InvalidFeedException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class FileMovieFeedService extends MovieFeedService
{
    /**
     * @inheritDoc
     */
    protected function getMovies()
    {
        $fileName = config('movies.feed');

        if (!Storage::disk('public')->exists($fileName)) {
            throw new FileNotFoundException(sprintf('File not found: %s', $fileName), 404);
        }

        $movies = json_decode(file_get_contents(config('filesystems.disks.public.root') . '/' . $fileName));

        if(empty($movies->items)) {
            throw new InvalidFeedException();
        }

        return $movies->items;
    }
}
