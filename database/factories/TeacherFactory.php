<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->numberBetween($min = 1000, $max = 9000), 
            'first_name' => $this->faker->firstNameMale(),
            'last_name' => $this->faker->firstNameMale(),
            'username' => $this->faker->username(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->text(),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
        ];
    }
}
