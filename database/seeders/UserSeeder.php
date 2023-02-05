<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(1)->create([
            'fname' => 'نوال',
            'lname' => 'الشريف',
            'username' => 'doctor',
            'iqama' => '2500776204',
            'phone' => '+966500000001',
            'other_phone' => '0500000000',
            'birth_date' => '1990-01-01',
            'gender' => 'fmale',
            'email' => 'doctor@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'confirm_password' => '12345678',
            'image' => 'default.png',
            'address' => 'الرياض',
            'user_type' => 'doctor',
            'is_active' => 1,
            'code' => '1234',
            'fcm_token' => 'fEkVeHdJJxwNWoP0DsbibAnQp8shNv2tdRjXcs4Q',
            'remember_token' => Str::random(10),
        ])->each(function ($user) {
            $user->assignRole('doctor');
        });

        User::factory()->count(1)->create([
            'fname' => 'منال',
            'lname' => 'الغامدي',
            'username' => 'patient',
            'iqama' => '2500776203',
            'phone' => '+966500000000',
            'other_phone' => '0500000000',
            'birth_date' => '1990-01-01',
            'gender' => 'fmale',
            'email' => 'patient@gmail.com',
            'email_verified_at' => now(),
            'password' => '12345678',
            'confirm_password' => '12345678',
            'image' => 'default.png',
            'address' => 'جدة',
            'user_type' => 'patient',
            'is_active' => 1,
            'code' => '1234',
            'fcm_token' => 'fEkVeHdJJxwNWoP0DsbibAnQp8shNv2tdRjXcs4S',
            'remember_token' => Str::random(10),
        ])->each(function ($user) {
            $user->assignRole('patient');
        });

        User::factory()->count(12)->create()->each(function ($user) {
            if ($user->user_type == 'doctor') {
                $user->assignRole('doctor');
            } else {
                $user->assignRole('patient');
            }
        });
    }
}
