<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;

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

Route::get('/', [JobController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/jobs/{id}/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');

Route::get('/user/profile', [UserController::class, 'index'])->name('userProfile.index');
Route::post('/user/profile/create', [UserController::class, 'store'])->name('userProfile.store');
Route::post('/user/coverletter', [UserController::class, 'coverletter'])->name('coverletter');
Route::post('/user/resume', [UserController::class, 'resume'])->name('resume');
Route::post('/user/avatar', [UserController::class, 'avatar'])->name('avatar');

