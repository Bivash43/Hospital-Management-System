<?php

namespace App\Http\Middleware;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserDetailChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $email1 = Doctor::where('email', $user->email);
        $email2 = Patient::where('email', $user->email);
        if ($user->role === "admin") {
            return $next($request);
        } elseif ($user->role === "doctor") {
            if ($email1->count() == 0) {
                $departments = Department::all();
                return response(view('doctorLayout.info', compact('departments'))->with('error', 'Please Fill Up the Details First'));
            }
            return $next($request);
        } elseif ($user->role === "patient") {
            if ($email2->count() == 0) {
                return response(view('patientLayout.info')->with('error', 'Please Fill Up the Details First'));
            }
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
