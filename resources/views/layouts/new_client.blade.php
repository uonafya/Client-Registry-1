@extends('layouts.app')

@section('content')
<div class="container">
    <form style="margin-top: 5%;">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fname">First Name</label>
                <input type="email" class="form-control" id="fname" placeholder="First name">
            </div>
            <div class="form-group col-md-4">
                <label for="mname">Middle Name</label>
                <input type="mname" class="form-control" id="mname" placeholder="Middle name">
            </div>
            <div class="form-group col-md-4">
                <label for="lname">Last Name</label>
                <input type="lname" class="form-control" id="lname" placeholder="Last name">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nemis">Nemis</label>
                <input type="nemis" class="form-control" id="nemis" placeholder="Nemis">
            </div>
            <div class="form-group col-md-4">
                <label for="dob">DOB</label>
                <input type="date" class="form-control" id="dob">
            </div>
            <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control">
                    <option selected disabled>Select gender</option>
                    <option value='F'>Female</option>
                    <option value='M'>Male</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" placeholder="Phone Number">
            </div>
            <div class="form-group col-md-6">
                <label for="national_id_number">National Id Number</label>
                <input type="text" class="form-control" id="national_id_number" placeholder="National Id Number">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="facility">Facility</label>
                <select id="facility" class="form-control">
                    <option selected disabled>Select facility</option>
                    <option value='Facility1'>Facility 1</option>
                    <option value='facility2'>Facility 2</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="mfl_code">MFL Code</label>
                <input type="text" class="form-control" id="mfl_code" value='' readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="serial_number">Serial Number</label>
                <input type="number" class="form-control" id="serial_number" placeholder="Serial Number">
            </div>
        </div>
        <div class="form-group">
            <label for="residence">Residence</label>
            <input type="text" class="form-control" id="residence" placeholder="1234 Main St">
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="county">County</label>
                <input type="text" class="form-control" id="county">
            </div>

            <div class="form-group col-md-4">
                <label for="date_of_transfer">Date Of Transfer</label>
                <input type="date" class="form-control" id="date_of_transfer">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection