<?php

namespace Database\Factories;

use App\Models\Consultation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notes>
 */
class NotesFactory extends Factory
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
            'note_date' => $this->faker->date,
            'note_time' => $this->faker->time,
            'note_title' => $this->faker->name,
            'note_description' => $this->faker->text,
        ];
    }
}
