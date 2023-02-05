<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnotherPatiant>
 */
class AnotherPatiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'appointment_id' => Appointment::all()->random()->id,
            'fname' => $this->faker->text,
            'lname' => $this->faker->text,
            'birth_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'phone' => $this->faker->phoneNumber(),
            'relative_relation' => $this->faker->text,
            'insurance_account' => $this->faker->text,
        ];
    }
}
