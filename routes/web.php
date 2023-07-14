<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PatientController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->user())
        return redirect()->route('dashboard');
    else
        return view('auth.login');
});

// Route::post('/info/addDoctor', [InfoController::class, 'storeDoctor'])->name('info.addDoctor');
// Route::post('/info/addPatient', [InfoController::class, 'storePatient'])->name('info.addPatient');

Route::get('/dashboard', [Controller::class, 'redirect'])->middleware(['auth', 'verified', 'detail.auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/departments', DepartmentController::class);
    Route::resource('/doctors', DoctorController::class);
    Route::resource('/patients', PatientController::class);
    Route::resource('/appointments', AppointmentController::class);
});

Route::group(['middleware' => 'role.auth:admin'], function () {
    // Routes accessible only to admins
});

Route::group(['middleware' => 'role.auth:doctor'], function () {
    Route::post('/status/{id}/{signal}', [AppointmentController::class, 'status'])->name('change.status');
});

Route::group(['middleware' => 'role.auth:patient'], function () {
    Route::post('/patientAction/{id}/{signal}', [AppointmentController::class, 'patientAction'])->name('patient.action');
    Route::get('/patientAction', [AppointmentController::class, 'book'])->name('book.appointment');
});

Route::get('/infoAdd', function () {
    $departments = Department::all();
    return view('doctorLayout.info', compact('departments'));
});

Route::get('/userEntry/{name}/{email}/{role}', [RegisteredUserController::class, 'entry'])->name('new.register');


require __DIR__ . '/auth.php';
