<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function redirect()
    {
        $role = auth()->user()->role;

        if ($role === "doctor") {
            return view('dashboardDoc');
        } else if ($role === "patient") {
            return view('dashboardPat');
        } else if ($role === "admin") {
            return view('dashboard');
        }
    }
}
