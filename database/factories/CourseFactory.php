<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween($min = 100, $max = 9000);
        $sale_price = $this->faker->numberBetween($min = $price/2, $price);
        return [
            'sku' => $this->faker->uuid(), 
            'title' => $this->faker->city(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'state' => 0, 
            'published_at' => now(),
        ];
    }
}
