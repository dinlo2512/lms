<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'teacher_id' => Teacher::query()->inRandomOrder()->first()->id,
            'content' => $this->faker->paragraph(),
            'title' => $this->faker->sentence(),
        ];
    }
}
