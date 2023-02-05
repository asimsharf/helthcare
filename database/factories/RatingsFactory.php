<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ratings>
 */
class RatingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'appointment_id' =>Appointment::all()->random()->id,
            'note' => $this->faker->text,
            'amount' => $this->faker->randomNumber(2),
            'count' => $this->faker->randomNumber(2),
            'date' => $this->faker->date,
        ];
    }
}
