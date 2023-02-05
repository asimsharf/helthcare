<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'patient_id' => Patient::all()->random()->id,
            'appointment_id' => Appointment::all()->random()->id,
            'received_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'payment_method' => $this->faker->randomElement($arry = array('cash', 'visa', 'mastercard', 'paypal')),
            'amount' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'is_paid' => $this->faker->randomElement($arry = array(0, 1)),
        ];
    }
}
