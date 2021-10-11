<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->city(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'lesson_number' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}
