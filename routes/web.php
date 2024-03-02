<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\JobListingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitersController;
use App\Http\Controllers\StudentsController;
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
    return redirect()->to('login');
});

Route::get('/dashboard', [AdminController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/recruiters/{id}', [RecruitersController::class, 'show']);

});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/users', [AdminController::class, 'usersList'])->name('users');
    Route::get('/admin/users/create', [AdminController::class, 'create']);
    Route::post('/admin/users', [AdminController::class, 'store']);
    Route::delete('/users/{id}', [AdminController::class, 'destroy']);
    Route::get('/admin/job-listing', [JobListingsController::class, 'adminJobList']);
    Route::patch('/admin/job-listing/{id}', [JobListingsController::class, 'StatusUpdate']);


});

Route::group(['middleware' => ['auth', 'student']], function () {
  //  Route::get('/students/{id}/edit', [StudentsController::class, 'edit']);
  //  Route::patch('/students/update/{id}', [StudentsController::class, 'update']);

    Route::get('/students/job-listing', [StudentsController::class, 'jobListing']);
    Route::post('/students/apply-job/{id}', [ApplyJobController::class, 'store']);
    Route::get('/students/apply-jobs', [ApplyJobController::class, 'getUserJobs']);
    Route::delete('/apply-jobs/{id}', [ApplyJobController::class, 'destroy']);


});
Route::group(['middleware' => ['auth', 'admin_or_student']], function () {
    Route::get('/students/{id}/edit', [StudentsController::class, 'edit']);
    Route::patch('/students/update/{id}', [StudentsController::class, 'update']);

});
Route::group(['middleware' => ['auth', 'admin_or_recruiter']], function () {
    Route::get('/recruiters/edit/{id}', [RecruitersController::class, 'edit']);
    Route::patch('/recruiters/update/{id}', [RecruitersController::class, 'update']);
});
Route::group(['middleware' => ['auth', 'recruiter']], function () {

    Route::get('/recruiters/get-candidate/{id}', [ApplyJobController::class, 'getStudentsApplied']);
    //Route::get('/recruiters/edit/{id}', [RecruitersController::class, 'edit']);
   // Route::patch('/recruiters/update/{id}', [RecruitersController::class, 'update']);
    Route::patch('/apply-jobs/{id}', [ApplyJobController::class, 'update']);

    Route::get('/recruiter/job-listing', [JobListingsController::class, 'index'])->name('job-listing');
    Route::get('/job-listing/create', [JobListingsController::class, 'create']);
    Route::post('/job-listing', [JobListingsController::class, 'store']);
    Route::get('/job-listing/edit/{id}', [JobListingsController::class, 'edit']);
    Route::patch('/job-listing/update/{id}', [JobListingsController::class, 'update']);
    Route::delete('/job-listing/{id}', [JobListingsController::class, 'destroy']);
});

Route::get('/send', [AdminController::class, 'show']);
require __DIR__.'/auth.php';
