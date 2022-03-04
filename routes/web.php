<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacilityController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;

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
    return view('login_register');
});

Route::post('login', [LoginController::class, 'login']);
// patients

Route::get('/dashboard', [FacilityController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('create_patient',[PatientController::class, 'store']);
Route::patch('patient/{id}',[PatientController::class, 'update']);

Route::get('/merger_patient/{id}/{id_no}',[PatientController::class, 'merge']);

Route::get('new_client', [PatientController::class, 'new_client']);

//Remote data source
Route::get('get_all_patients', [FacilityController::class, 'getPatient'] );
Route::get('get_all_facilities', [FacilityController::class, 'getFacility'] );
Route::post('add_patient', [FacilityController::class, 'addPatient'] );

