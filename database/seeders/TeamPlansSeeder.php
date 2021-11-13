<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamPlan;
use Illuminate\Support\Str;

class TeamPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	TeamPlan::create([
            'title' => 'yearly',
            'slug' => Str::slug('yearly'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 750000,
            'status' => true,
            'duration' => 12,
            'max_member' => 2,
        ]);

		TeamPlan::create([
            'title' => 'yearly',
            'slug' => Str::slug('yearly'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 950000,
            'status' => true,
            'duration' => 12,
            'max_member' => 5,
        ]);

		TeamPlan::create([
            'title' => 'yearly',
            'slug' => Str::slug('yearly'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 1250000,
            'status' => true,
            'duration' => 12,
            'max_member' => 10,
        ]);


		TeamPlan::create([
            'title' => 'yearly',
            'slug' => Str::slug('yearly'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 1750000,
            'status' => true,
            'duration' => 12,
            'max_member' => 25,
        ]);

		TeamPlan::create([
            'title' => 'yearly',
            'slug' => Str::slug('yearly'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis sit sequi itaque laborum, voluptatibus at illum doloremque magnam consequuntur, error odio ullam fugit explicabo tenetur quae quod harum earum ipsam?',
            'current_price' => 2500000,
            'status' => true,
            'duration' => 12,
            'max_member' => 50,
        ]);
    }
}
