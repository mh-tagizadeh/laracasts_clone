<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;
use Illuminate\Support\Str;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'title' => 'monthly',
            'slug' => Str::slug('monthly'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 50000,
            'status' => true,
            'duration' => 1,
        ]);
        Plan::create([
            'title' => 'yearly',
            'slug' => Str::slug('yearly'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 500000,
            'status' => true,
            'duration' => 12,
        ]);
        Plan::create([
            'title' => 'forever',
            'slug' => Str::slug('forever'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 5000000,
            'status' => true,
            'duration' => 48,
        ]);
    }
}
