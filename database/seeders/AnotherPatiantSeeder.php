<?php

namespace Database\Seeders;

use App\Models\AnotherPatiant;
use Illuminate\Database\Seeder;

class AnotherPatiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnotherPatiant::factory()->count(10)->create();
    }
}
