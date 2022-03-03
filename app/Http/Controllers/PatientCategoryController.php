<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientCategoryRequest;
use App\Http\Requests\UpdatePatientCategoryRequest;
use App\Models\PatientCategory;

class PatientCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientCategory  $patientCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PatientCategory $patientCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientCategory  $patientCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientCategory $patientCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientCategoryRequest  $request
     * @param  \App\Models\PatientCategory  $patientCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientCategoryRequest $request, PatientCategory $patientCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientCategory  $patientCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientCategory $patientCategory)
    {
        //
    }
}
