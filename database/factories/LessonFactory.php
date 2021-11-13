<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'course_id' => Course::query()->inRandomOrder()->first()->id,
            'content' => $this->faker->paragraph(),
            'description' => $this->faker->sentence(),
        ];
    }
}
