<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'teacher_id' => Teacher::query()->inRandomOrder()->first()->id,
            'subject' => 'PHP',
            'status' => true,
            'open_date' => $this->faker->date(),
            'close_date' => $this->faker->date(),
        ];
    }
}
