<?php

namespace Database\Seeders;

use App\Models\MedicalQuestion;
use Illuminate\Database\Seeder;

class MedicalQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicalQuestion::factory()->count(10)->create();
    }
}
