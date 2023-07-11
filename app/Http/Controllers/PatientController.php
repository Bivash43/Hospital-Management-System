<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::all();
        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        return view('admin.patients.create');
    }

    public function store(Request $request)
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
        return redirect()->back()->with('success', 'Patient information has been stored successfully.');
    }

    public function edit(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.create', compact('patient'));
    }

    public function update(Request $request, string $id)
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
        $patient = Patient::findOrFail($id);

        $patient->f_name = $validatedData['f_name'];
        $patient->l_name = $validatedData['l_name'];
        $patient->gender = $validatedData['gender'];
        $patient->mobile = $validatedData['mobile'];
        $patient->dob = bcrypt($validatedData['dob']);
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
        return redirect()->back()->with('success', 'Patient information updated successfully.');
    }

    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient Deleted Successfully');
    }
}
