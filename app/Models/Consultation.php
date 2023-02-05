<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'diagnoes',
        'doctor_instructions',
        'number_diagnoes_session',
        'expire_date',
    ];

   
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
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
