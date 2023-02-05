<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'type',
        'time',
        'date',
        'status',
        'number',
        'duration',
        'reason',
        'for_another_patient',
        'cancel',
        'reject',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function another_patients()
    {
        return $this->belongsTo(AnotherPatiant::class);
    }

    public function rating()
    {
        return $this->hasOne(Ratings::class);
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
