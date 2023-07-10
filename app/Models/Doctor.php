<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Department;

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

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'department_has_doctors');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_has_appointments');
    }
}
