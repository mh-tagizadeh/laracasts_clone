<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++)
        {
            $parent_category = Category::factory()->create();

            $child_category = Category::factory()->count(5)->for($parent_category)->create();
        }
    }
}
