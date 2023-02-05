<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalQuestion extends Model
{
    use HasFactory;


    protected $fillable = [
        'patient_id',
        'text',
        'answer',
    ];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
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
