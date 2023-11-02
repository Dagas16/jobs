<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
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
    $jobs = Job::leftJoin('companies', 'jobs.company_id', '=', 'companies.id')
        ->select('jobs.*', 'companies.name as companyName')
        ->get();
    return view('home', ['jobs' => $jobs]);
});

Route::get("/login", function () {
    return view('login');
});

Route::get("/register", function () {
    return view('register');
});

Route::get("/create-job", function () {
    $companies = Company::all();
    return view("createJob", ['companies' => $companies]);
});


Route::post("/register", [UserController::class, 'register']);
Route::post("/logout", [UserController::class, 'logout']);
Route::post("/login", [UserController::class, 'login']);

// Job routes
Route::post("/create-job", [JobController::class, 'createJob']);
