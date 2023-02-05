<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::where('user_type', 'doctor')->doesntHave('doctor')->first()->id,
            'department_id' => Department::all()->random()->id,
            'experience_years' => $this->faker->randomNumber($nbDigits = 2, $strict = false),
            'place_of_study' => $this->faker->city,
            'image' => 'default.png',
            'certificates' => 'certificates.png',
            'social_media' => $this->faker->url,
            'about_the_doctor' => $this->faker->text,
            'rating_percentage' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'consultation_price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'skills' => $this->faker->text,
            'iqama' => $this->faker->randomNumber($nbDigits = 8, $strict = false),
            'work_experience' => $this->faker->text,
            'authority_card' => 'certificates.png',
            'health_affairs_licensing' => 'certificates.png',
            'is_verified' => $this->faker->randomElement($arry = array(0, 1)),
            'is_receiving_appointments' => $this->faker->randomElement($arry = array(0, 1)),
        ];
    }
}
