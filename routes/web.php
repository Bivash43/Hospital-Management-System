<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PatientController;
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
    return view('auth.login');
});

Route::post('/info/addDoctor', [InfoController::class, 'storeDoctor'])->name('info.addDoctor');
Route::post('/info/addPatient', [InfoController::class, 'storePatient'])->name('info.addPatient');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
    // Routes accessible only to users
});

Route::group(['middleware' => 'role.auth:patient'], function () {
    // Routes accessible only to users
});



require __DIR__ . '/auth.php';
