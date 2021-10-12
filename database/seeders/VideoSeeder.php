<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::chunk(200, function ($lessons) {
            foreach ($lessons as $lesson) {
                Video::factory()->for($lesson, 'videoable')->create();
            }
        });
    }
}
