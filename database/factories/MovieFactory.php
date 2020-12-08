<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'opening_date' => $this->faker->dateTimeThisYear,
            'status' => $this->faker->randomElement(['N','C','F']),
            'file_path' => '/storage/uploads/movie.jpg',
            'genre_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'created_at' => now(),
            'updated_at' => now()
          ];
    }
}
