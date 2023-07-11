<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('admin.appointments.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doa' => 'required|date',
            'time' => 'required',
            'case' => 'required',
            'note' => 'required',
            'report' => 'required|file',
            'doctor' => 'required',
            'patient' => 'required',

        ]);

        // Handle file upload
        if ($request->hasFile('report')) {
            $report = $request->file('report');
            $reportName = time() . '_' . $report->getClientOriginalName();
            $report->storeAs('public/reports', $reportName);
        }

        // Create a new appointment instance and save it
        $appointment = new Appointment();

        $appointment->doa = $validatedData['doa'];
        $appointment->time = $validatedData['time'];
        $appointment->case = $validatedData['case'];
        $appointment->note = $validatedData['note'];
        $appointment->report = $reportName ?? null;
        $appointment->save();
        $appointment->doctors()->attach($validatedData['doctor']);
        $appointment->patients()->attach($validatedData['patient']);


        return redirect()->back()->with('success', 'Appointment information has been stored successfully.');
    }

    public function edit(string $id)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $appointment = Appointment::findOrFail($id);
        return view('admin.appointments.create', compact('appointment', 'patients', 'doctors'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'doa' => 'required|date',
            'time' => 'required',
            'case' => 'required',
            'note' => 'required',
            'report' => 'required|file',
            'doctor' => 'required',
            'patient' => 'required',

        ]);

        // Handle file upload
        if ($request->hasFile('report')) {
            $report = $request->file('report');
            $reportName = time() . '_' . $report->getClientOriginalName();
            $report->storeAs('public/reports', $reportName);
        }

        // Create a new appointment instance and save it
        $appointment = Appointment::findOrFail($id);

        $appointment->doa = $validatedData['doa'];
        $appointment->time = $validatedData['time'];
        $appointment->case = $validatedData['case'];
        $appointment->note = $validatedData['note'];
        $appointment->report = $reportName ?? null;
        $appointment->save();
        $appointment->doctors()->attach($validatedData['doctor']);
        $appointment->patients()->attach($validatedData['patient']);


        return redirect()->back()->with('success', 'Appointment information has been stored successfully.');
    }

    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment Deleted Successfully');
    }
}
