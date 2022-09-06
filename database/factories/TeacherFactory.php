<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' =>  $this->faker->unique()->safeEmail(),
            'dob' => $this->faker->dateTime(),
            'contact_number' => $this->faker->phoneNumber(),
            "username" => $this->faker->unique()->name(),
            'gender_id' => 1,
            'ranks_id' => 1,
            'password' => Hash::make('password'),
        ];
    }
}
