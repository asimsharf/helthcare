<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;  

    protected $fillable = [
        'user_id',
        'date',
        'time',
        'title',
        'description',
        'user_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
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
