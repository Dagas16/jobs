<?php

use App\Enums\ExperienceTypeEnum;
use App\Http\Controllers\CompanyController;
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
use App\Http\Middleware\IsRecruiter;
use App\Http\Middleware\IsUser;
use App\Http\Middleware\Authenticate;
use App\Models\Experience;
use Illuminate\Auth\Events\Authenticated;

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
    $jobs = Job::all();
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

    $personalia = User::find($id);
    $experiences = $personalia->experiencesTypeGroups();
    $experiencesCount = $personalia->experiences()->count();

    return view('profile', ['personalia' => $personalia, 'experiencesCount' => $experiencesCount, 'experiences' => $experiences]);
})->middleware(IsUser::class);

Route::post('/update-user', [UserController::class, 'updateUser']);
Route::post('/create-experience', [UserController::class, 'createExperience']);
Route::post('/delete-experience/{id}', [UserController::class, 'deleteExperience']);

//update experience
Route::get('/update-experience/{id}', function (Request $request, int $id) {

    $exp = Experience::find($id);

    return view('/updateExperience', ['exp' => $exp]);
});

Route::post('/update-experience/{id}', [UserController::class, 'updateExperience']);


// job routes

Route::get('/job/{id}', function (Request $request, string $id) {
    // gets jobs with company name
    $job = Job::leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
        ->select('jobs.*', 'companies.name as company_name', 'companies.logo_path as company_logo_path')
        ->where('jobs.id', $id)
        ->first();

    $userApplication = JobApplication::where(['user_id' =>  Auth::id(), 'job_id' => $id])->first();
    return view('job', ['job' => $job, 'userApplication' => $userApplication]);
});

Route::get("/job/{id}/success", function (Request $request, string $id) {
    $job = Job::find($id);
    return view('jobSuccess', ['job' => $job]);
});


Route::get('/create-job', function () {
    $companies = Company::all();
    return view('createJob', ['companies' => $companies]);
})->middleware(IsRecruiter::class);

Route::get('/my-applications', function (Request $request) {

    $id = Auth::id();
    $applications = User::find($id)->jobApplications;
    return view('myApplications', ['applications' => $applications]);
});

Route::post('/create-job', [JobController::class, 'createJob'])->middleware(IsRecruiter::class);;
Route::post('/job/send-application/{id}', [JobController::class, 'sendApplication']);

//dashboard
Route::get('/dashboard', function (Request $request) {
    $id = Auth::id();
    $company = User::find($id)->company;
    return view('dashboard', ['company' => $company]);
})->middleware(IsRecruiter::class);

Route::get('/create-company', function () {
    $id = Auth::id();
    $company = User::find($id)->company;
    if ($company) {
        return redirect('/dashboard');
    }

    return view('createCompany');
});

Route::get('/dashboard/job/{jobId}/applications', function (Request $request, int $jobId) {
    $job = Job::find($jobId);
    $applications = JobApplication::all()->where("job_id", $jobId);
    return view('jobApplications', ['job' => $job, 'jobApplications' => $applications]);
})->middleware(IsRecruiter::class);

Route::get('/dashboard/application/{id}', function (Request $request, int $id) {
    $application = JobApplication::find($id);
    return view('application', ['application' => $application]);
})->middleware(IsRecruiter::class);


Route::post('/create-company', [CompanyController::class, 'createCompany']);
