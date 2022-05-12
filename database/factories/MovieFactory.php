<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'full_title' => $this->faker->sentence,
            'year' => $this->faker->year(),
            'image' => $this->faker->imageUrl(243, 360),
            'crew' => $this->faker->paragraph(),
        ];
    }
}
