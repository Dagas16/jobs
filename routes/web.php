<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::get('/', function () {
    $jobs = Job::leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
        ->select('jobs.*', 'companies.name as companyName')
        ->get();
    return view('home', ['jobs' => $jobs]);
});



// auth routes
Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//profile

Route::get('/profile', function (Request $request) {
    $id = Auth::id();
    $experiences = User::find($id)->experiences;
    return view('profile', ['experiences' => $experiences]);
});

Route::post('/createExperience', [UserController::class, 'createExperience']);

// job routes

Route::get('/job/{id}', function (Request $request, string $id) {
    // gets jobs with company name
    $job = Job::leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
        ->select('jobs.*', 'companies.name as companyName')
        ->where('jobs.id', $id)
        ->first();
    return view('job', ['job' => $job]);
});

Route::get("/job/{id}/success", function (Request $request, string $id) {
    $job = Job::find($id);
    return view('jobSuccess', ['job' => $job]);
});


Route::get('/create-job', function () {
    $companies = Company::all();
    return view('createJob', ['companies' => $companies]);
});

Route::get('/my-applications', function (Request $request) {

    $id = Auth::id();
    $applications = User::find($id)->jobApplications;
    return view('myApplications', ['applications' => $applications]);
});



Route::post('/create-job', [JobController::class, 'createJob']);
Route::post('/job/send-application/{id}', [JobController::class, 'sendApplication']);
