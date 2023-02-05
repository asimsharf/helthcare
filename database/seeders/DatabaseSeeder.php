<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            SuperAdminSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            ClinicSeeder::class,
            DepartmentSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            AppointmentSeeder::class,
            ComplaintSeeder::class,
            NotificationSeeder::class,
            PaymentSeeder::class,
            InvoiceSeeder::class,
            InvoiceDetailSeeder::class,
            CouponSeeder::class,
            AnotherPatiantSeeder::class,
            MedicalQuestionSeeder::class,
            AvailableAppointmentSeeder::class,
            FavoriteSeeder::class,
            ConsultationSeeder::class,
            MedicineSeeder::class,
            RatingsSeeder::class,
            NotesSeeder::class,
        ]);
    }
}
