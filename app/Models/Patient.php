<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name',
        'l_name',
        'gender',
        'mobile',
        'dob',
        'age',
        'email',
        'marital_status',
        'address',
        'blood_group',
        'blood_pressure',
        'blood_sugar',
        'condition',
        'image',
    ];
}
