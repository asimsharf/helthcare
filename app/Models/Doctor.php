<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'department_id',
        'experience_years',
        'place_of_study',
        'image',
        'certificate',
        'social_media',
        'about_the_doctor',
        'rating_percentage',
        'consultation_price',
        'skills',
        'iqama',
        'work_experience',
        'authority_card',
        'health_affairs_licensing',
    ];

    private $rules = [
        'name' => 'required|string',
        'user_id' => 'required|integer',
        'department_id' => 'required|integer',
        'experience_years' => 'required|integer',
        'place_of_study' => 'required|string',
        'image' => 'required|string',
        'certificate' => 'required|string',
        'social_media' => 'required|string',
        'about_the_doctor' => 'required|string',
        'rating_percentage' => 'required|integer',
        'consultation_price' => 'required|integer',
        'skills' => 'required|string',
        'iqama' => 'required|string',
        'work_experience' => 'required|string',
        'authority_card' => 'required|string',
        'health_affairs_licensing' => 'required|string',
    ];

    protected $hidden = [
        'user_id',
        'department_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->hasOneThrough(Country::class, Department::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(City::class, Department::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, Department::class, 'clinic_id', 'id', 'department_id', 'id');
    }

    public function available_appointments()
    {
        return $this->hasMany(AvailableAppointment::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, Appointment::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function ratings()
    {
        return $this->hasManyThrough(Ratings::class, Appointment::class, 'doctor_id', 'appointment_id', 'id', 'id');
    }

    public function getRatingPercentageAttribute($value)
    {
        $rating = $this->ratings();
        if ($rating->count() > 0) {
            $rating = $rating->sum('amount') / $rating->count();
        } else {
            $rating = 0;
        }
        return $rating;
    }

    public function isFavorite()
    {
        if (auth()->guard('api')->check()) {
            $patient_id = Patient::where('user_id',  auth()->guard('api')->user()->id)->first()->id;
            if (Favorite::where('doctor_id', $this->id)->where('patient_id', $patient_id)->first()) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }


    public function getCreatedAtAttribute($value)
    {
        return date('d M Y', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d M Y', strtotime($value));
    }

    public function getDeletedAtAttribute($value)
    {
        return date('d M Y', strtotime($value));
    }
}
