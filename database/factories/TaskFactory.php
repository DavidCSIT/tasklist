<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->word,
          'description' => $this->faker->paragraph,
          'due_at' => $this->faker->dateTimeThisYear,
          'priority' => $this->faker->randomDigit,
          'created_at' => now(),
          'updated_at' => now(),
          'user_id' => $this->faker->numberBetween($min = 1, $max = 3)
        ];
    }
}
