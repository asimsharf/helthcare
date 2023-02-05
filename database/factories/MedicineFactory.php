<?php

namespace Database\Factories;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'consultation_id' => Consultation::all()->random()->id,
            'name' => $this->faker->name,
            'purpose' => $this->faker->name,
            'quantity' => $this->faker->randomNumber(2),
            'from_date' => $this->faker->date,
            'to_date' => $this->faker->date,
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
