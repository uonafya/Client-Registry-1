<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('login_register');
});

Route::get('facility_landing', function(){
    return view('Layouts.app');
});
Route::post('login', [UserController::class,'login'])->middleware('auth');

// Route::get('clientReg',[FacilityController::class, 'index']);

Route::get('/landing', [FacilityController::class, 'index'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
