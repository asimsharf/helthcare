<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\AnotherPatiantController;
use App\Http\Controllers\MedicalQuestionController;
use App\Http\Controllers\AvailableAppointmentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use App\Http\Resources\DoctorCollection;
use App\Http\Resources\RatingsCollection;
use App\Models\Doctor;
use App\Models\Ratings;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return response()->json([
        'code' => 0,
        'message' => 'Not Found if the error persists, contact the administrator at ' . config('app.email'),
    ], 404);
});

Route::prefix('v1')->group(function ($v1) {

    $v1->get('apitest', function () {

    });

    $v1->get('/', function () {
        return response()->json([
            'message' => 'Welcome to the API',
            'version' => 'v1',
            'author' => 'Asim al-taishi',
            'email' => 'asim@fnrco.com.sa',
            'phone' => '+966500000001',
            'website' => 'https://fnrco.com.sa',
        ]);
    });

    // **************** Super Admin ****************
    $v1->prefix('dashboard')->group(function ($api) {
        $api->get('/', function () {
            return response()->json(['message' => 'Welcome to the API dashboard',]);
        });
        $api->controller(SuperAdminController::class)->group(function ($api) {
            $api->post('login', 'login')->name('login');
            $api->middleware(['auth:sanctum'])->group(function ($api) {
                $api->post('register', 'register')->name('register');
                $api->get('me', 'me')->name('me');
                $api->get('logout', 'logout')->name('logout');
                $api->get('refresh', 'refresh')->name('refresh');
            });
        });

        $api->middleware(['auth:sanctum'])->group(function ($api) {

            $api->prefix('permissions')->group(function ($api) {
                $api->controller(PermissionController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('permissions.index');
                    $api->post('/', 'store')->name('permissions.store');
                    $api->get('/{id}', 'show')->name('permissions.show');
                    $api->put('/{id}', 'update')->name('permissions.update');
                    $api->delete('/{id}', 'destroy')->name('permissions.destroy');
                    $api->post('assign', 'assign')->name('permissions.assign');
                    $api->post('revoke', 'revoke')->name('permissions.revoke');
                });
            });

            $api->prefix('roles')->group(function ($api) {
                $api->controller(RoleController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('roles.index');
                    $api->post('/', 'store')->name('roles.store');
                    $api->get('/{id}', 'show')->name('roles.show');
                    $api->put('/{id}', 'update')->name('roles.update');
                    $api->delete('/{id}', 'destroy')->name('roles.destroy');
                });
            });

            $api->prefix('admins')->group(function ($api) {
                $api->controller(AdminController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('admins.index');
                    $api->post('/', 'register')->name('admins.register');
                    $api->get('/{id}', 'show')->name('admins.show');
                    $api->post('/{id}', 'update')->name('admins.update');
                    $api->delete('/{id}', 'destroy')->name('admins.destroy');
                });
            });

            $api->prefix('another-patiants')->group(function ($api) {
                $api->controller(AnotherPatiantController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('another-patiants.index');
                    $api->post('/', 'store')->name('another-patiants.store');
                    $api->get('/{id}', 'show')->name('another-patiants.show');
                    $api->put('/{id}', 'update')->name('another-patiants.update');
                    $api->delete('/{id}', 'destroy')->name('another-patiants.destroy');
                });
            });

            $api->prefix('countries')->group(function ($api) {
                $api->controller(CountryController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('countries.index');
                    $api->post('/', 'store')->name('countries.store');
                    $api->get('/{id}', 'show')->name('countries.show');
                    $api->put('/{id}', 'update')->name('countries.update');
                    $api->delete('/{id}', 'destroy')->name('countries.destroy');
                });
            });

            $api->prefix('cities')->group(function ($api) {
                $api->controller(CityController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('cities.index');
                    $api->post('/', 'store')->name('cities.store');
                    $api->get('/{id}', 'show')->name('cities.show');
                    $api->put('/{id}', 'update')->name('cities.update');
                    $api->delete('/{id}', 'destroy')->name('cities.destroy');
                });
            });

            $api->prefix('clinics')->group(function ($api) {
                $api->controller(ClinicController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('clinics.index');
                    $api->post('/', 'store')->name('clinics.store');
                    $api->get('/{id}', 'show')->name('clinics.show');
                    $api->put('/{id}', 'update')->name('clinics.update');
                    $api->delete('/{id}', 'destroy')->name('clinics.destroy');
                });
            });

            $api->prefix('departments')->group(function ($api) {
                $api->controller(DepartmentController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('departments.index');
                    $api->post('/', 'store')->name('departments.store');
                    $api->get('/{id}', 'show')->name('departments.show');
                    $api->put('/{id}', 'update')->name('departments.update');
                    $api->delete('/{id}', 'destroy')->name('departments.destroy');
                });
            });

            $api->prefix('doctors')->group(function ($api) {
                $api->controller(DoctorController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('doctors.index');
                    $api->post('/', 'store')->name('doctors.store');
                    $api->get('/{id}', 'show')->name('doctors.show');
                    $api->put('/{id}', 'update')->name('doctors.update');
                    $api->delete('/{id}', 'destroy')->name('doctors.destroy');
                });
            });

            $api->prefix('patients')->group(function ($api) {
                $api->controller(PatientController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('patients.index');
                    $api->post('/', 'store')->name('patients.store');
                    $api->get('/{id}', 'show')->name('patients.show');
                    $api->put('/{id}', 'update')->name('patients.update');
                    $api->delete('/{id}', 'destroy')->name('patients.destroy');
                });
            });

            $api->prefix('complaints')->group(function ($api) {
                $api->controller(ComplaintController::class)->group(function ($api) {
                    $api->get('', 'index')->name('complaints.index');
                    $api->post('/', 'store')->name('complaints.store');
                    $api->get('/{id}', 'show')->name('complaints.show');
                    $api->put('/{id}', 'update')->name('complaints.update');
                    $api->delete('/{id}', 'destroy')->name('complaints.destroy');
                });
            });

            $api->prefix('appointments')->group(function ($api) {
                $api->controller(AppointmentController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('appointments.index');
                    $api->post('/', 'store')->name('appointments.store');
                    $api->get('/{id}', 'show')->name('appointments.show');
                    $api->put('/{id}', 'update')->name('appointments.update');
                    $api->delete('/{id}', 'destroy')->name('appointments.destroy');
                });
            });

            $api->prefix('available-appointments')->group(function ($api) {
                $api->controller(AvailableAppointmentController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('available-appointments.index');
                    $api->post('/', 'store')->name('available-appointments.store');
                    $api->get('/{id}', 'show')->name('available-appointments.show');
                    $api->put('/{id}', 'update')->name('available-appointments.update');
                    $api->delete('/{id}', 'destroy')->name('available-appointments.destroy');
                });
            });

            $api->prefix('ratings')->group(function ($api) {
                $api->controller(RatingController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('ratings.index');
                    $api->post('/', 'store')->name('ratings.store');
                    $api->get('/{id}', 'show')->name('ratings.show');
                    $api->put('/{id}', 'update')->name('ratings.update');
                    $api->delete('/{id}', 'destroy')->name('ratings.destroy');
                });
            });

            $api->prefix('notifications')->group(function ($api) {
                $api->controller(NotificationController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('notifications.index');
                    $api->post('/', 'store')->name('notifications.store');
                    $api->get('/{id}', 'show')->name('notifications.show');
                    $api->put('/{id}', 'update')->name('notifications.update');
                    $api->delete('/{id}', 'destroy')->name('notifications.destroy');
                });
            });

            $api->prefix('payments')->group(function ($api) {
                $api->controller(PaymentController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('payments.index');
                    $api->post('/', 'store')->name('payments.store');
                    $api->get('/{id}', 'show')->name('payments.show');
                    $api->put('/{id}', 'update')->name('payments.update');
                    $api->delete('/{id}', 'destroy')->name('payments.destroy');
                });
            });

            $api->prefix('invoices')->group(function ($api) {
                $api->controller(InvoiceController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('invoices.index');
                    $api->post('/', 'store')->name('invoices.store');
                    $api->get('/{id}', 'show')->name('invoices.show');
                    $api->put('/{id}', 'update')->name('invoices.update');
                    $api->delete('/{id}', 'destroy')->name('invoices.destroy');
                });
            });

            $api->prefix('invoice-details')->group(function ($api) {
                $api->controller(InvoiceDetailController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('invoice-details.index');
                    $api->post('/', 'store')->name('invoice-details.store');
                    $api->get('/{id}', 'show')->name('invoice-details.show');
                    $api->put('/{id}', 'update')->name('invoice-details.update');
                    $api->delete('//{id}', 'destroy')->name('invoice-details.destroy');
                });
            });

            $api->prefix('consultations')->group(function ($api) {
                $api->controller(ConsultationController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('consultations.index');
                    $api->post('/', 'store')->name('consultations.store');
                    $api->get('/{id}', 'show')->name('consultations.show');
                    $api->put('/{id}', 'update')->name('consultations.update');
                    $api->delete('/{id}', 'destroy')->name('consultations.destroy');
                });
            });

            $api->prefix('coupons')->group(function ($api) {
                $api->controller(CouponController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('coupons.index');
                    $api->post('/', 'store')->name('coupons.store');
                    $api->get('/{id}', 'show')->name('coupons.show');
                    $api->put('/{id}', 'update')->name('coupons.update');
                    $api->delete('/{id}', 'destroy')->name('coupons.destroy');
                });
            });

            $api->prefix('medical-questions')->group(function ($api) {
                $api->controller(MedicalQuestionController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('medical-questions.index');
                    $api->post('/', 'store')->name('medical-questions.store');
                    $api->get('/{id}', 'show')->name('medical-questions.show');
                    $api->put('/{id}', 'update')->name('medical-questions.update');
                    $api->delete('/{id}', 'destroy')->name('medical-questions.destroy');
                });
            });

            $api->prefix('medicines')->group(function ($api) {
                $api->controller(MedicineController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('medicines.index');
                    $api->post('/', 'store')->name('medicines.store');
                    $api->get('/{id}', 'show')->name('medicines.show');
                    $api->put('/{id}', 'update')->name('medicines.update');
                    $api->delete('/{id}', 'destroy')->name('medicines.destroy');
                });
            });

            $api->prefix('notes')->group(function ($api) {
                $api->controller(NotesController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('notes.index');
                    $api->post('/', 'store')->name('notes.store');
                    $api->get('/{id}', 'show')->name('notes.show');
                    $api->put('/{id}', 'update')->name('notes.update');
                    $api->delete('/{id}', 'destroy')->name('notes.destroy');
                });
            });

            $api->prefix('favorites')->group(function ($api) {
                $api->controller(FavoriteController::class)->group(function ($api) {
                    $api->get('/', 'index')->name('favorites.index');
                    $api->post('/', 'store')->name('favorites.store');
                    $api->get('/{id}', 'show')->name('favorites.show');
                    $api->put('/{id}', 'update')->name('favorites.update');
                    $api->delete('/{id}', 'destroy')->name('favorites.destroy');
                });
            });
        });
    });

    // **************** Admin ****************
    $v1->prefix('admin')->group(function ($api) {
        $api->controller(AdminController::class)->group(function ($api) {
            $api->post('login', 'login')->name('login');
            $api->post('register', 'register')->name('register');
            $api->middleware(['auth:sanctum', 'role:admin'])->group(function ($api) {
                $api->get('me', 'me')->name('me');
                $api->get('logout', 'logout')->name('logout');
                $api->get('refresh', 'refresh')->name('refresh');
            });
        });

        $api->middleware(['auth:sanctum'])->group(function ($api) {
        });
    });

    // **************** Doctor or Patient ****************
    $v1->prefix('user')->group(function ($api) {
        $api->controller(UserController::class)->group(function ($api) {
            $api->post('login', 'login')->name('login');
            $api->post('register', 'register')->name('register');
            $api->post('verify', 'verify')->name('verify');
            $api->post('forgot-password', 'forgotPassword')->name('forgot-password');

            //'role:doctor|patient'
            $api->middleware(['auth:sanctum'])->group(function ($api) {
                $api->get('me', 'me')->name('me');
                $api->get('logout', 'logout')->name('logout');
                $api->get('refresh', 'refresh')->name('refresh');
                $api->post('complete-patient-profile', 'completePatientProfile')->name('complete-patient-profile');
                $api->post('update-patient-profile', 'updatePatientProfile')->name('update-patient-profile');
                $api->post('update-password', 'updatePassword')->name('update-password');
                $api->post('reset-password', 'resetPassword')->name('reset-password');
            });
        });
        // **************** Clinics ****************
        $api->prefix('clinics')->group(function ($api) {
            $api->controller(ClinicController::class)->group(function ($api) {
                $api->get('/', 'index')->name('clinics.index');
            });
        });

        // **************** Doctors ****************
        $api->prefix('doctors')->group(function ($api) {
            $api->controller(DoctorController::class)->group(function ($api) {
                $api->get('/best-doctors', 'bestDoctor')->name('best-doctors.index');
                $api->get('/department-doctors/{id}', 'departmentDoctors')->name('department-doctors');
                $api->get('/search-doctors/{name}', 'searchDoctors')->name('search-doctors');
                $api->post('/filter-doctors', 'filterDoctors')->name('filter-doctors');
                $api->post('/favorite-doctors', 'favoriteDoctors')->name('favorite-doctors')->middleware(['auth:sanctum']);
                $api->get('/favorite-doctors', 'patientFavoriteDoctors')->name('favorite-doctors')->middleware(['auth:sanctum']);
            });
        });

    });
});
