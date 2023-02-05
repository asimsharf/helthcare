<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
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
            'diagnoes' => $this->faker->text,
            'doctor_instructions' => $this->faker->text,
            'number_diagnoes_session' => $this->faker->randomNumber(),
            'expire_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
        ];
    }
}
