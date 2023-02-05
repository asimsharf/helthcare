<?php

namespace Database\Seeders;

use App\Models\AvailableAppointment;
use Illuminate\Database\Seeder;

class AvailableAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AvailableAppointment::factory()->count(10)->create();
    }
}
