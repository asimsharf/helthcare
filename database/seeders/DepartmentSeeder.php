<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory()->count(1)->create([
            'name' => 'الشخصية',
            'description' => 'هذا النص هو مثال لنص يمكن ان يستبدل في نفس المساحة',
        ]);

        Department::factory()->count(1)->create([
            'name' => 'الاسرية',
            'description' => 'هذا النص هو مثال لنص يمكن ان يستبدل في نفس المساحة',
        ]);
    }
}
