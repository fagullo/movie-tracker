<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use App\Repositories\Movie\IMovieRepository;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::factory()
            ->count(100)
            ->create();

        $users = User::factory()
            ->count(50)
            ->create();

        $moviesRepository = app()
            ->make(IMovieRepository::class);

        foreach($movies as $movie) {
            foreach($users as $user) {
                if (rand(0, 1) == 0) {
                    $moviesRepository->like($movie->id, $user->id);
                }

                if (rand(0, 1) == 0) {
                    $moviesRepository->view($movie->id, $user->id);
                }
            }
        }
    }
}
