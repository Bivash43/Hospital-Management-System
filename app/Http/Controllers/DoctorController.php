<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.doctors.createDoctor', compact('departments'));
    }

    public function store(Request $request)
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


        return redirect()->back()->with('success', 'Doctor information has been stored successfully.');
    }

    public function edit(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $departments = Department::all();
        return view('admin.doctors.createDoctor', compact('doctor', 'departments'));
    }

    public function update(Request $request, string $id)
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
            'image' => 'image',

        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        }

        $doctor = Doctor::findOrFail($id);
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

        return redirect()->route('doctors.index')->with('success', 'Doctor information has been Updated successfully.');
    }

    public function destroy(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor Deleted');
    }
}
