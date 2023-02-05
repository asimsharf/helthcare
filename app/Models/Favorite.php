<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
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
