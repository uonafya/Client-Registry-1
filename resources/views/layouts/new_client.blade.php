@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/create_patient" method="post" style="margin-top: 5%;">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fname">First Name</label>
                <input name="fname" type="text" class="form-control" id="fname" placeholder="First name">
            </div>
            <div class="form-group col-md-4">
                <label for="mname">Middle Name</label>
                <input name="mname" type="text" class="form-control" id="mname" placeholder="Middle name">
            </div>
            <div class="form-group col-md-4">
                <label for="lname">Last Name</label>
                <input name="lname" type="text" class="form-control" id="lname" placeholder="Last name">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nemis">Nemis</label>
                <input name="nemis" type="nemis" class="form-control" id="nemis" placeholder="Nemis">
            </div>
            <div class="form-group col-md-4">
                <label for="dob">DOB</label>
                <input name="dob" type="date" class="form-control" id="dob">
            </div>
            <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select name='gender' id="gender" class="form-control">
                    <option selected disabled>Select gender</option>
                    <option value='F'>Female</option>
                    <option value='M'>Male</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone_number">Phone Number</label>
                <input name="phone" type="text" class="form-control" id="phone_number" placeholder="Phone Number">
            </div>
            <div class="form-group col-md-6">
                <label for="national_id_number">National Id Number</label>
                <input name="id_no" type="text" class="form-control" id="national_id_number" placeholder="National Id Number">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="facility">Select Facility</label>
                <select  name="linked_facility" id="facility" class="form-control">
                    @foreach ($facility as $facilityOPtionsKey => $facilityOPtionsValue)
                        <option value="{{ $facilityOPtionsValue }}" {{ $facilityOPtionsValue  ? 'selected' : ''}} >{{ $facilityOPtionsValue }}</option>                                
                    @endforeach                            
                 </select>
                
            </div>
            
            <div class="form-group col-md-4">
                <label for="mfl_code">MFL Code</label>
                <input name="mfl_code" type="text" class="form-control" id="mfl_code" value='' readonly>
            </div>
            
            <div class="form-group col-md-4">
                <label for="serial_number">Serial Number</label>
                <input name="serial_no" type="number" class="form-control" id="serial_number" placeholder="Serial Number">
            </div>
        </div>
        <div class="form-group">
            <label for="residence">Residence</label>
            <input name="residence" type="text" class="form-control" id="residence" placeholder="1234 Main St">
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="county">County</label>
                    <select name="linked_facility" id="facility" class="form-control">
                @foreach ($patient as $countyOPtionsKey => $countyOPtionsValue)
                    <option value="{{ $countyOPtionsValue }}" {{ $countyOPtionsValue  ? 'selected' : ''}} >{{ $countyOPtionsValue }}</option>                                
                @endforeach
                        
                    </select>
            
                {{-- <input name='county' type="text" class="form-control" id="county"> --}}
            </div>

            <div class="form-group col-md-4">
                <label for="date_of_transfer">Date Of Transfer</label>
                <input name="dot" type="date" class="form-control" id="date_of_transfer">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection