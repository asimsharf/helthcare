<?php

namespace Database\Seeders;

use App\Models\Ratings;
use Illuminate\Database\Seeder;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ratings::factory()->count(10)->create();
    }
}
