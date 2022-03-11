<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccessAPIController;
use App\Http\Controllers\ProductController;

Route::post('login', [AccessAPIController::class, 'authenticate']);
Route::post('register', [AccessAPIController::class, 'register']);


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AccessAPIController::class, 'logout']);
    Route::get('get_user', [AccessAPIController::class, 'get_user']);
    // getAllPatientsInFacility

    //patients
    Route::get('get_facility',[AccessAPIController::class, 'getFacilityByMfl']);
    Route::get('get_all_facility_patients',[AccessAPIController::class, 'getAllPatientsInFacility']);
    Route::get('get_patient',[AccessAPIController::class, 'getPatientWithCCC']);

});

// Route::group(['middleware' => ['api_token']], function () {

// });
