<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'iqama' => $this->faker->numberBetween(1000000000000, 9999999999999),
            'phone' => $this->faker->phoneNumber,
            'other_phone' => $this->faker->phoneNumber,
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement($arry = array('male', 'fmale')),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'confirm_password' => bcrypt('password'),
            'image' => 'default.png',
            'address' => $this->faker->address,
            'user_type' => $this->faker->randomElement($arry = array('doctor', 'patient')),
            'is_active' => $this->faker->randomElement($arry = array(0, 1)),
            'code' => $this->faker->numberBetween(1000, 9999),
            'fcm_token' => $this->faker->sha1,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
