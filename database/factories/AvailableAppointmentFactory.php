<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AvailableAppointment>
 */
class AvailableAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_id' => Doctor::all()->random()->id,
            'from_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'to_time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'is_reserved' => $this->faker->randomElement($arry = array(1, 0)),
        ];
    }
}
