<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->count(1)->create([
            'fname' => 'Admin',
            'lname' => 'Admin',
            'email' => "admin@mail.com",
            'image' => 'default.png',
            'password' => "12345678",
            'is_active' => 1,
        ])->each(function ($admin) {
            $admin->assignRole('admin');
        });
    }
}
