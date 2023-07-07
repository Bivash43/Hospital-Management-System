<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name',
        'l_name',
        'gender',
        'mobile',
        'password',
        'designation',
        'address',
        'email',
        'dob',
        'education',
        'image',
    ];
}
