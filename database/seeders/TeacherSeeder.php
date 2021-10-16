<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::chunk(200, function($teachers){
            foreach($teachers as $teacher)
            {
                $teacher->user->assignRole('teacher');
            }
        });
    }
}
