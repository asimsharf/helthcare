<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'title' => $this->faker->text,
            'description' => $this->faker->text,
            'user_type' => $this->faker->randomElement($arry = array('doctors', 'patients', 'all')),
        ];
    }
}
