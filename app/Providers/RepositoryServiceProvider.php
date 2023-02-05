<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\CountryInterface;
use App\Repositories\CountryRepository;

use App\Interfaces\CityInterface;
use App\Repositories\CityRepository;

use App\Interfaces\ClinicInterface;
use App\Repositories\ClinicRepository;

use App\Interfaces\DepartmentInterface;
use App\Repositories\DepartmentRepository;

use App\Interfaces\DoctorInterface;
use App\Repositories\DoctorRepository;

use App\Interfaces\RatingInterface;
use App\Repositories\RatingRepository;

use App\Interfaces\AppointmentInterface;
use App\Repositories\AppointmentRepository;

use App\Interfaces\InvoiceInterface;
use App\Repositories\InvoiceRepository;

use App\Interfaces\ComplaintInterface;
use App\Repositories\ComplaintRepository;

use App\Interfaces\NotificationInterface;
use App\Repositories\NotificationRepository;

use App\Interfaces\PatientInterface;
use App\Repositories\PatientRepository;

use App\Interfaces\PaymentInterface;
use App\Repositories\PaymentRepository;

use App\Interfaces\SuperAdminInterface;
use App\Repositories\SuperAdminRepository;

use App\Interfaces\AdminInterface;
use App\Repositories\AdminRepository;

use App\Interfaces\UserInterface;
use App\Repositories\UserRepository;

use App\Interfaces\RoleInterface;
use App\Repositories\RoleRepository;

use App\Interfaces\PermissionInterface;
use App\Repositories\PermissionRepository;

use App\Interfaces\AnotherPatiantInterface;
use App\Repositories\AnotherPatiantRepository;

use App\Interfaces\AvailableAppointmentInterface;
use App\Repositories\AvailableAppointmentRepository;

use App\Interfaces\ConsultationInterface;
use App\Repositories\ConsultationRepository;

use App\Interfaces\CouponInterface;
use App\Repositories\CouponRepository;

use App\Interfaces\MedicalQuestionInterface;
use App\Repositories\MedicalQuestionRepository;

use App\Interfaces\FavoriteInterface;
use App\Repositories\FavoriteRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryInterface::class, CountryRepository::class);
        $this->app->bind(CityInterface::class, CityRepository::class);
        $this->app->bind(ClinicInterface::class, ClinicRepository::class);
        $this->app->bind(DepartmentInterface::class, DepartmentRepository::class);
        $this->app->bind(DoctorInterface::class, DoctorRepository::class);
        $this->app->bind(RatingInterface::class, RatingRepository::class);
        $this->app->bind(AppointmentInterface::class, AppointmentRepository::class);
        $this->app->bind(InvoiceInterface::class, InvoiceRepository::class);
        $this->app->bind(ComplaintInterface::class, ComplaintRepository::class);
        $this->app->bind(NotificationInterface::class, NotificationRepository::class);
        $this->app->bind(PatientInterface::class, PatientRepository::class);
        $this->app->bind(PaymentInterface::class, PaymentRepository::class);
        $this->app->bind(SuperAdminInterface::class, SuperAdminRepository::class);
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
        $this->app->bind(AnotherPatiantInterface::class, AnotherPatiantRepository::class);
        $this->app->bind(AvailableAppointmentInterface::class, AvailableAppointmentRepository::class);
        $this->app->bind(ConsultationInterface::class, ConsultationRepository::class);
        $this->app->bind(CouponInterface::class, CouponRepository::class);
        $this->app->bind(MedicalQuestionInterface::class, MedicalQuestionRepository::class);
        $this->app->bind(FavoriteInterface::class, FavoriteRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
