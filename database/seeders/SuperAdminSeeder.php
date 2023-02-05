<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuperAdmin::factory()->count(1)->create([
            'fname' => 'Super',
            'lname' => 'Admin',
            'email' => 'super@mail.com',
            'image' => 'default.png',
            'password' => '12345678',
            'is_active' => 1,
        ])->each(function ($superadmin) {
            $superadmin->assignRole('super-admin')->givePermissionTo(Permission::all());
        });
    }
}
