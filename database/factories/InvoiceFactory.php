<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'payment_id' => Payment::all()->random()->id,
            'total_amount' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'tax' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        ];
    }
}
