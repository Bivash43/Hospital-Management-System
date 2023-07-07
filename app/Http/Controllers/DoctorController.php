<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('doctors.createDoctor', compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'gender' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'education' => 'required',
            'image' => 'required',
        ]);
    }
}
