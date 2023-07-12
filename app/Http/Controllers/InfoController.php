<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;


class InfoController extends Controller
{
    public function storeDoctor(Request $request)
    {
        $validatedData = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'gender' => 'required',
            'mobile' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'education' => 'required',
            'image' => 'required|image',

        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        }

        // Create a new Doctor instance and save it
        $doctor = new Doctor();

        $doctor->f_name = $validatedData['f_name'];
        $doctor->l_name = $validatedData['l_name'];
        $doctor->gender = $validatedData['gender'];
        $doctor->mobile = $validatedData['mobile'];
        $doctor->designation = $validatedData['designation'];
        $doctor->address = $validatedData['address'];
        $doctor->email = $validatedData['email'];
        $doctor->dob = $validatedData['dob'];
        $doctor->education = $validatedData['education'];
        $doctor->image = $imageName ?? null;
        $doctor->save();
        $doctor->departments()->attach($validatedData['department']);

        return redirect()->route('login')->with('success', 'Login with your User Details');
    }

    public function storePatient(Request $request)
    {

        $validatedData = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'gender' => 'required',
            'mobile' => 'required',
            'dob' => 'required|date',
            'age' => 'required',
            'email' => 'required | email',
            'marital_status' => 'required',
            'address' => 'required',
            'blood_group' => 'required',
            'blood_pressure' => 'required',
            'blood_sugar' => 'required',
            'condition' => 'required',
            'image' => 'required|image',

        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        }

        // Create a new patient instance and save it
        $patient = new Patient();

        $patient->f_name = $validatedData['f_name'];
        $patient->l_name = $validatedData['l_name'];
        $patient->gender = $validatedData['gender'];
        $patient->mobile = $validatedData['mobile'];
        $patient->dob = ($validatedData['dob']);
        $patient->age = $validatedData['age'];
        $patient->email = $validatedData['email'];
        $patient->marital_status = $validatedData['marital_status'];
        $patient->address = $validatedData['address'];
        $patient->blood_group = $validatedData['blood_group'];
        $patient->blood_pressure = $validatedData['blood_pressure'];
        $patient->blood_sugar = $validatedData['blood_sugar'];
        $patient->condition = $validatedData['condition'];
        $patient->image = $imageName ?? null;
        $patient->save();

        return redirect()->route('login')->with('success', 'Login with your User Details');
    }
}
