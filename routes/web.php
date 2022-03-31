<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HodController;
use App\Http\Controllers\StaffController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Route to Home
 */
Route::get('/home',[HomeController::class,'redirect']);
/**
 * Route to Dashboard
 */
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

// Route to staff management

Route::get('/staffmanagement',[HodController::class,'showstaff']);

//Route for Dashboard of HOD
Route::get('/dashboard1',[HodController::class,'dashboard']);

/** 
 * Route to create Staff
 */
Route::get('/creatstaff',[HodController::class,'CreateStaff']);

/**
 * Route to post staff
 */
Route::post('/poststaff',[HodController::class,'PostStaff']);

/**
 * Route to show leaves
 */
Route::get('/leavemanagement',[StaffController::class,'ShowLeave']);

/**
 * Route to create leave
 */
Route::get('/createleave',[StaffController::class,'CreateLeave']);

/**
 * Route to post leave
 */
Route::post('/postleave',[StaffController::class,'PostLeave']);

/**
 * Route to view leave
 */
Route::get('/viewleave/{id}',[StaffController::class,'ViewLeave']);

/**
 * Routr to dashboard of staff
 */
Route::get('/dashboard2',[StaffController::class,'Dashboard1']);

/**
 * route to hod leave management
 */
Route::get('/hodleavemanagement',[HodController::class,'hodleavemanagement']);

/**
 * edit leave data
 */
Route::get('/editleave/{id}',[HodController::class,'edithodleave']);

/**
 * Route to post edit leave
 */
 Route::post('/postedithodleave/{id}',[HodController::class,'PosthodeditLeave']);


 /**
  * to delete staff information from hod section
  */
  Route::delete('/users/{id}',[HodController::class,'delete']);

  /**
   * route to view hod section staff deatils
   */
 Route::get('/viewstaff/{id}',[HodController::class,'viewstaff']);

 /**
  * Route to show leave deatils at staff side
  */
  Route::get('/showleavedeatils/{id}',[StaffController::class,'ShowLeaveDeatils']);