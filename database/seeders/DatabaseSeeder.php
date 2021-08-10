<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
        $category1 = Category::factory()->create();

        $categoryX = Category::factory()->create();
        
        $categoryY = Category::factory()->for($categoryX)->create();

        $category2 = Category::factory()->for($category1)->create();


        $categories = Category::factory()
            ->count(3)
            ->for($category2)
            ->create();  
    }
}
