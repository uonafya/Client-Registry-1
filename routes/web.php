<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacilityController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::get('/dashboard', [FacilityController::class, 'index']);

Route::get('new_client', function(){
    return view('layouts.new_client');
});
