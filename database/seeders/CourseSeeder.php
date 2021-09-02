<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Course;
use App\Models\Category;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=0;$i<5;$i++)
        {
            $parent_category = Category::factory()->create();

            for($j=0;$j<5;$j++)
            {
                $category = Category::factory()->for($parent_category)->create();


                for($x=0;$x<5;$x++)
                {
                    $user = User::factory()->create();

                    $user->assignRole('teacher');

                    $teacher = Teacher::factory()->state(['username' => $user->name])->for($user)->create();

                    Course::factory()->count(5)->for($category)->for($teacher)->create();
                }
           }
       }
   }
}
