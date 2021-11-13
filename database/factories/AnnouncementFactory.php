<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'title' => $this->faker->title(),
            'course_id' => Course::query()->inRandomOrder()->first()->id,
            'content' => $this->faker->paragraph()
        ];
    }
}
