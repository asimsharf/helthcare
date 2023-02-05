<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $superadmin     = 'super-admin';
        $admin          = 'admin';
        $doctor         = 'doctor';
        $patient        = 'patient';

        $roles = [$superadmin, $admin, $doctor, $patient,];

        // super-admin permissions
        $manage_users   = 'manage users';
        $manage_roles   = 'manage roles';
        $manage_permissions = 'manage permissions';
        $manage_settings = 'manage settings';
        $manage_cities  = 'manage cities';
        
        // admin permissions
        $manage_doctors = 'manage doctors';
        $manage_patients = 'manage patients';
        $manage_appointments = 'manage appointments';
        $manage_prescriptions = 'manage prescriptions';
        $manage_reports = 'manage reports';
        $manage_invoices = 'manage invoices';
        $manage_payments = 'manage payments';
        $manage_reviews = 'manage reviews';

        // Users Permissions
        $create_user            = 'create user';
        $read_user              = 'read user';
        $update_user            = 'update user';
        $delete_user            = 'delete user';

        // Doctors Permissions
        $create_doctor          = 'create doctor';
        $read_doctor            = 'read doctor';
        $update_doctor          = 'update doctor';
        $delete_doctor          = 'delete doctor';

        // Patients Permissions
        $create_patient         = 'create patient';
        $read_patient           = 'read patient';
        $update_patient         = 'update patient';
        $delete_patient         = 'delete patient';

        // Roles Permissions
        $create_role            = 'create role';
        $read_role              = 'read role';
        $update_role            = 'update role';
        $delete_role            = 'delete role';

        // Permissions Permissions
        $create_permission      = 'create permission';
        $read_permission        = 'read permission';
        $update_permission      = 'update permission';
        $delete_permission      = 'delete permission';


        // Cities Permissions
        $create_city            = 'create city';
        $read_city              = 'read city';
        $update_city            = 'update city';
        $delete_city            = 'delete city';

        // Countries Permissions
        $create_country         = 'create country';
        $read_country           = 'read country';
        $update_country         = 'update country';
        $delete_country         = 'delete country';

        // Clinics Permissions
        $create_clinic          = 'create clinic';
        $read_clinic            = 'read clinic';
        $update_clinic          = 'update clinic';
        $delete_clinic          = 'delete clinic';

        // Departments Permissions
        $create_department      = 'create department';
        $read_department        = 'read department';
        $update_department      = 'update department';
        $delete_department      = 'delete department';

        // Appointments Permissions
        $create_appointment     = 'create appointment';
        $read_appointment       = 'read appointment';
        $update_appointment     = 'update appointment';
        $delete_appointment     = 'delete appointment';

        

        $permissions = [
            // super-admin permissions
            $manage_users,
            $manage_roles,
            $manage_permissions,
            $manage_settings,
            $manage_cities,
            // admin permissions
            $manage_doctors,
            $manage_patients,
            $manage_appointments,
            $manage_prescriptions,
            $manage_reports,
            $manage_invoices,
            $manage_payments,
            $manage_reviews,
            // Users Permissions
            $create_user,
            $read_user,
            $update_user,
            $delete_user,
            // Doctors Permissions
            $create_doctor,
            $read_doctor,
            $update_doctor,
            $delete_doctor,
            // Patients Permissions
            $create_patient,
            $read_patient,
            $update_patient,
            $delete_patient,
            // Roles Permissions
            $create_role,
            $read_role,
            $update_role,
            $delete_role,
            // Permissions Permissions
            $create_permission,
            $read_permission,
            $update_permission,
            $delete_permission,
            // Cities Permissions
            $create_city,
            $read_city,
            $update_city,
            $delete_city,
            // Countries Permissions
            $create_country,
            $read_country,
            $update_country,
            $delete_country,
            // Clinics Permissions
            $create_clinic,
            $read_clinic,
            $update_clinic,
            $delete_clinic,
            // Departments Permissions
            $create_department,
            $read_department,
            $update_department,
            $delete_department,
            // Appointments Permissions
            $create_appointment,
            $read_appointment,
            $update_appointment,
            $delete_appointment,
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        Role::findByName($superadmin)->givePermissionTo(Permission::all());

        Role::findByName($admin)->givePermissionTo([
            $manage_doctors,
            $manage_patients,
            $manage_appointments,
            $manage_prescriptions,
            $manage_reports,
            $manage_invoices,
            $manage_payments,
            $manage_reviews,
        ]);

        Role::findByName($doctor)->givePermissionTo([
            $manage_appointments,
            $manage_prescriptions,
            $manage_reports,
            $manage_invoices,
            $manage_payments,
            $manage_reviews,
        ]);

        Role::findByName($patient)->givePermissionTo([
            $manage_appointments,
            $manage_prescriptions,
            $manage_reports,
            $manage_invoices,
            $manage_payments,
            $manage_reviews,

        ]);
    }
}
