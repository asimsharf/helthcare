<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Complaint>
 */
class ComplaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id' => Admin::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'super_admin_id' => SuperAdmin::all()->random()->id,
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'type' => $this->faker->randomElement($arry = array('complaint', 'suggestion')),
            'title' => $this->faker->text,
            'answer' => $this->faker->text,
            'message' => $this->faker->text,
            'attach_file' => $this->faker->imageUrl($width = 640, $height = 480),
            'description' => $this->faker->text,
        ];
    }
}
