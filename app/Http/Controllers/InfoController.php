<?php

namespace App\Http\Controllers;

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
            'password' => 'required',
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
        $doctor->password = bcrypt($validatedData['password']);
        $doctor->designation = $validatedData['designation'];
        $doctor->address = $validatedData['address'];
        $doctor->email = $validatedData['email'];
        $doctor->dob = $validatedData['dob'];
        $doctor->education = $validatedData['education'];
        $doctor->image = $imageName ?? null;
        $doctor->save();
        $doctor->departments()->attach($validatedData['department']);


        return redirect()->back()->with('success', 'Doctor information has been stored successfully.');
    }
}
