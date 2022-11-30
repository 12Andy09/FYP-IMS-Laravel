<?php

use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChartJSController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipsController;
use App\Models\Internship;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);

Route::resource('internships', InternshipsController::class);
Route::resource('applications', ApplicationController::class);
Route::resource('users', UsersController::class)->middleware('can:isAdmin');
Route::resource('student_profile', StudentProfileController::class);
Route::resource('company_profile', CompanyProfileController::class);

Route::get('/view/student_profile/{id}', [StudentProfileController::class, 'index'])
    ->where('id', '[0-9]');
Route::get('/view/company_profile/{id}', [CompanyProfileController::class, 'index'])
    ->where('id', '[0-9]');
Route::get('/view/internship/{id}', [InternshipsController::class, 'view']);

Route::get('admin/view_report', [ChartJSController::class, 'Charts'])->middleware('can:isAdmin')->name('viewReport');

Route::get('/filterCategory/{category_id}', [\App\Http\Controllers\StudentDashboardController::class, 'filterInternshipBasedOnCategory'])->name('filterCategory');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
//Auth
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [ApplicationController::class, 'index'], function () {
        return view('Admin/AdminDashboard');
    })->middleware('can:isAdmin')->name('admin_dashboard');

    Route::get('/company/dashboard', [ApplicationController::class, 'index'], function () {
        return view('Company/CompanyDashboard');
    })->middleware('can:isCompany')->name('company_dashboard');

    Route::get('/student/dashboard', [StudentDashboardController::class, 'lists'], function () {
        return view('Student/StudentDashboard');
    })->middleware('can:isStudent')->name('student_dashboard');

    Route::get('/supervisor/dashboard', function () {
        return view('Supervisor/SupervisorDashboard');
    })->middleware('can:isSupervisor')->name('supervisor_dashboard');
});

require __DIR__ . '/auth.php';
