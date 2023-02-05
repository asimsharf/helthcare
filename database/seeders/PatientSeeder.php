<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'patient')->doesntHave('patient')->first()->id,
            'patient_number' => Helpers::generatePatientNumber(),
            'marital_status' => 'single',
            'height' => 170,
            'weight' => 70,
            'family_member_phone' => '+966500000000',
            'psychiatrist' => 1,
            'psychiatrist_description' => 'هنا يكتب الوصف اذا كان المريض يتابعه نفسه او لا',
            'disability' => 1,
            'disability_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من اعاقة او لا',
            'health_problem' => 1,
            'health_problem_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من مشكلة صحية او لا',
            'medication' => 1,
            'medication_description' => 'هنا يكتب الوصف اذا كان المريض يتناول ادوية او لا',
            // 'habits' => ['smoking', 'drinking'],
            'habits_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من عادات سيئة او لا',
            'diseases' => 1,
            'diseases_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من مرض او لا',
        ]);

        Patient::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'patient')->doesntHave('patient')->first()->id,
            'patient_number' => Helpers::generatePatientNumber(),
            'marital_status' => 'married',
            'height' => 180,
            'weight' => 80,
            'family_member_phone' => '+966500000000',
            'psychiatrist' => 0,
            'psychiatrist_description' => 'هنا يكتب الوصف اذا كان المريض يتابعه نفسه او لا',
            'disability' => 1,
            'disability_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من اعاقة او لا',
            'health_problem' => 1,
            'health_problem_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من مشكلة صحية او لا',
            'medication' => 1,
            'medication_description' => 'هنا يكتب الوصف اذا كان المريض يتناول ادوية او لا',
            // 'habits' => ['smoking', 'drinking'],
            'habits_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من عادات سيئة او لا',
            'diseases' => 1,
            'diseases_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من مرض او لا',
        ]);

        Patient::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'patient')->doesntHave('patient')->first()->id,
            'patient_number' => Helpers::generatePatientNumber(),
            'marital_status' => 'divorced',
            'height' => 190,
            'weight' => 90,
            'family_member_phone' => '+966500000000',
            'psychiatrist' => 1,
            'psychiatrist_description' => 'هنا يكتب الوصف اذا كان المريض يتابعه نفسه او لا',
            'disability' => 1,
            'disability_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من اعاقة او لا',
            'health_problem' => 1,
            'health_problem_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من مشكلة صحية او لا',
            'medication' => 1,
            'medication_description' => 'هنا يكتب الوصف اذا كان المريض يتناول ادوية او لا',
            // 'habits' => ['smoking', 'drinking'],
            'habits_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من عادات سيئة او لا',
            'diseases' => 1,
            'diseases_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من مرض او لا',
        ]);

        Patient::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'patient')->doesntHave('patient')->first()->id,
            'patient_number' => Helpers::generatePatientNumber(),
            'marital_status' => 'widowed',
            'height' => 200,
            'weight' => 100,
            'family_member_phone' => '+966500000000',
            'psychiatrist' => 0,
            'psychiatrist_description' => 'هنا يكتب الوصف اذا كان المريض يتابعه نفسه او لا',
            'disability' => 1,
            'disability_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من اعاقة او لا',
            'health_problem' => 1,
            'health_problem_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من مشكلة صحية او لا',
            'medication' => 1,
            'medication_description' => 'هنا يكتب الوصف اذا كان المريض يتناول ادوية او لا',
            // 'habits' => ['smoking', 'drinking'],
            'habits_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من عادات سيئة او لا',
            'diseases' => 1,
            'diseases_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من مرض او لا',
        ]);

        Patient::factory()->count(1)->create([
            'user_id' => User::where('user_type', 'patient')->doesntHave('patient')->first()->id,
            'patient_number' => Helpers::generatePatientNumber(),
            'marital_status' => 'single',
            'height' => 210,
            'weight' => 110,
            'family_member_phone' => '+966500000000',
            'psychiatrist' => 1,
            'psychiatrist_description' => 'هنا يكتب الوصف اذا كان المريض يتابعه نفسه او لا',
            'disability' => 1,
            'disability_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من اعاقة او لا',
            'health_problem' => 1,
            'health_problem_description' => 'هنا يكتب الوصف اذا كان المريض يعاني من مشكلة صحية او لا',
            'medication' => 1,
            'medication_description' => 'هنا يكتب الوصف اذا كان المريض يتناول ادوية او لا',
            // 'habits' => ['smoking', 'drinking'],
            'habits_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من عادات سيئة او لا',
            'diseases' => 1,
            'diseases_other_details' => 'هنا يكتب الوصف اذا كان المريض يعاني من مرض او لا',
        ]);


    }
}
