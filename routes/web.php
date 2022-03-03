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

<<<<<<< HEAD
Route::get('new_client', function(){
    return view('layouts.new_client');
});
=======
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('create_patient',[PatientController::class, 'store']);
Route::patch('patient/{id}',[PatientController::class, 'update']);

Route::get('/merger_patient/{id}/{id_no}',[PatientController::class, 'merge']);


Route::get('new_client', [PatientController::class, 'new_client'])
>>>>>>> c2659b1515664b253febcbba889e37d5c56da1c9
