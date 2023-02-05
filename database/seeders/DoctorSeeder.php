<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'doctor')->doesntHave('doctor')->first()->id,
            'department_id' => Department::all()->random()->id,
            'experience_years' => 10,
            'place_of_study' => 'جامعة الملك سعود',
            'image' => 'default.png',
            'certificates' => 'certificates.png',
            'social_media' => 'https://www.facebook.com',
            'about_the_doctor' => 'هنا يكتب الطبيب عن نفسه',
            'rating_percentage' => 89,
            'consultation_price' => 100,
            'skills' => 'هنا يكتب الطبيب عن مهاراته',
            'iqama' => 12345678,
            'work_experience' => 'هنا يكتب الطبيب عن خبرته',
            'authority_card' => 'certificates.png',
            'health_affairs_licensing' => 'certificates.png',
            'is_verified' => 1,
            'is_receiving_appointments' => 1,
        ]);

        Doctor::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'doctor')->doesntHave('doctor')->first()->id,
            'department_id' => Department::all()->random()->id,
            'experience_years' => 4,
            'place_of_study' => 'جامعة الملك سعود',
            'image' => 'default.png',
            'certificates' => 'certificates.png',
            'social_media' => 'https://www.facebook.com',
            'about_the_doctor' => 'هنا يكتب الطبيب عن نفسه',
            'rating_percentage' => 45,
            'consultation_price' => 150,
            'skills' => 'هنا يكتب الطبيب عن مهاراته',
            'iqama' => 12345678,
            'work_experience' => 'هنا يكتب الطبيب عن خبرته',
            'authority_card' => 'certificates.png',
            'health_affairs_licensing' => 'certificates.png',
            'is_verified' => 1,
            'is_receiving_appointments' => 1,
        ]);

        Doctor::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'doctor')->doesntHave('doctor')->first()->id,
            'department_id' => Department::all()->random()->id,
            'experience_years' => 7,
            'place_of_study' => 'جامعة الملك سعود',
            'image' => 'default.png',
            'certificates' => 'certificates.png',
            'social_media' => 'https://www.facebook.com',
            'about_the_doctor' => 'هنا يكتب الطبيب عن نفسه',
            'rating_percentage' => 68,
            'consultation_price' => 250,
            'skills' => 'هنا يكتب الطبيب عن مهاراته',
            'iqama' => 12345678,
            'work_experience' => 'هنا يكتب الطبيب عن خبرته',
            'authority_card' => 'certificates.png',
            'health_affairs_licensing' => 'certificates.png',
            'is_verified' => 1,
            'is_receiving_appointments' => 1,
        ]);


        Doctor::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'doctor')->doesntHave('doctor')->first()->id,
            'department_id' => Department::all()->random()->id,
            'experience_years' => 3,
            'place_of_study' => 'جامعة الملك سعود',
            'image' => 'default.png',
            'certificates' => 'certificates.png',
            'social_media' => 'https://www.facebook.com',
            'about_the_doctor' => 'هنا يكتب الطبيب عن نفسه',
            'rating_percentage' => 50,
            'consultation_price' => 100,
            'skills' => 'هنا يكتب الطبيب عن مهاراته',
            'iqama' => 12345678,
            'work_experience' => 'هنا يكتب الطبيب عن خبرته',
            'authority_card' => 'certificates.png',
            'health_affairs_licensing' => 'certificates.png',
            'is_verified' => 1,
            'is_receiving_appointments' => 1,
        ]);
    }
}
