<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::chunk(200, function ($courses) {
            foreach ($courses as $course) {
                Lesson::factory()->count(10)->for($course)->create();
            }
        });
    }
}
