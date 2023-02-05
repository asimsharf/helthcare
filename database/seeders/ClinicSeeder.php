<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clinic::factory()->count(1)->create([
            'name' => 'الاستشارات الاسرية',
            'description' => 'هذا النص هو مثال لنص يمكن ان يستبدل في نفس المساحة',
        ]);

        Clinic::factory()->count(1)->create([
            'name' => 'الاستشارات الشخصية',
            'description' => 'هذا النص هو مثال لنص يمكن ان يستبدل في نفس المساحة',
        ]);
    }
}
