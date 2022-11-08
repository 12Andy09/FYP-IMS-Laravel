<?php

use App\Http\Controllers\StudentProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('internships', InternshipsController::class);

Route::resource('student_profile', StudentProfileController::class);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//Auth
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('Admin/AdminDashboard');
    })->middleware('can:isAdmin')->name('admin_dashboard');

    Route::get('/company/dashboard', function () {
        return view('Company/CompanyDashboard');
    })->middleware('can:isCompany')->name('company_dashboard');

    Route::get('/student/dashboard', function () {
        return view('Student/StudentDashboard');
    })->middleware('can:isStudent')->name('student_dashboard');

    Route::get('/supervisor/dashboard', function () {
        return view('Supervisor/SupervisorDashboard');
    })->middleware('can:isSupervisor')->name('supervisor_dashboard');
});

require __DIR__ . '/auth.php';
