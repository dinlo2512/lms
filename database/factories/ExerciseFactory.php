<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'content'  => $this->faker->sentence(),
            'course_id' => Course::query()->inRandomOrder()->first()->id,
            'lesson_id' => Lesson::query()->inRandomOrder()->first()->id,
            'deadline' => $this->faker->date(),
            'grade' => random_int(1, 100)
        ];
    }
}
