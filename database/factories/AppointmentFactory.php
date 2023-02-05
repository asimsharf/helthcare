<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
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
            'patient_id' => Patient::all()->random()->id,
            'type' => $this->faker->randomElement($arry = array(1, 2)),
            'time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'status' => $this->faker->randomElement($arry = array(1, 2, 3, 4)),
            'number' => $this->faker->randomElement($arry = array('1234567890', '1234567891', '1234567892')),
            'duration' => $this->faker->randomElement($arry = array('30 minutes', '1 hour', '1 hour 30 minutes', '2 hours')),
            'reason' => $this->faker->randomElement($arry = array('checkup', 'follow up', 'emergency')),
            'for_another_patient' => $this->faker->randomElement($arry = array(1, 0)),
            'cancel' => $this->faker->randomElement($arry = array(1, 0)),
            'reject' => $this->faker->randomElement($arry = array(1, 0)),
        ];
    }
}
