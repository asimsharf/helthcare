<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::where('user_type', 'patient')->doesntHave('patient')->first()->id,
            'patient_number' => $this->faker->randomNumber($nbDigits = 8, $strict = false),
            'marital_status' => $this->faker->randomElement($arry = array('single', 'married', 'divorced', 'widowed')),
            'height' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 2.5),
            'weight' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'family_member_phone' => $this->faker->phoneNumber,
            'psychiatrist' => $this->faker->randomElement($arry = array(0, 1)),
            'psychiatrist_description' => $this->faker->text($maxNbChars = 200),
            'disability' => $this->faker->randomElement($arry = array(0, 1)),
            'disability_description' => $this->faker->text($maxNbChars = 200),
            'health_problem' => $this->faker->randomElement($arry = array(0, 1)),
            'health_problem_description' => $this->faker->text($maxNbChars = 200),
            'medication' => $this->faker->randomElement($arry = array(0, 1)),
            'medication_description' => $this->faker->text($maxNbChars = 200),
            'habits' => $this->faker->randomElement($arry = array('[]', '["smoking", "drinking"]')),
            'habits_other_details' => $this->faker->text($maxNbChars = 200),
            'diseases' => $this->faker->randomElement($arry = array(0, 1)),
            'diseases_other_details' => $this->faker->text($maxNbChars = 200),
        ];
    }
}
