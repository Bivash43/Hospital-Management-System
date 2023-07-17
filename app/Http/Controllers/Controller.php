<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function redirect()
    {
        $role = auth()->user()->role;
        $patient = Patient::where('email', auth()->user()->email)->first();
        $doctor = Doctor::where('email', auth()->user()->email)->first();

        if ($role === "doctor") {
            return view('dashboardDoc', compact('doctor'));
        } else if ($role === "patient") {
            return view('dashboardPat', compact('patient'));
        } else if ($role === "admin") {

            $months = [1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'];
            $doctor = [];
            $patient = [];
            foreach ($months as $key => $month) {
                $doctor[$month] = Doctor::whereMonth('created_at', $key)->count();
                $patient[$month] = Patient::whereMonth('created_at', $key)->count();
            }

            $doctor = json_encode(($doctor));
            $patient = json_encode(($patient));

            return view('dashboard', compact('doctor', 'patient'));
        }
    }
}
