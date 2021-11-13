<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Notification;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Teacher::factory(10)->create();
        Course::factory(10)->create();
        Announcement::factory(10)->create();
        Lesson::factory(10)->create();
        Exercise::factory(10)->create();
        Notification::factory(10)->create();

        for ($i=0; $i < 10; $i++) {
            DB::table('course_user')->insert([
                'course_id' => Course::query()->inRandomOrder()->first()->id,
                'user_id' => User::query()->inRandomOrder()->first()->id,
            ]);

            DB::table('exercise_user')->insert([
                'exercise_id' => Exercise::query()->inRandomOrder()->first()->id,
                'user_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
