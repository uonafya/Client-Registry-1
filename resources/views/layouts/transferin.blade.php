@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
    <div class="container" style="background-color: white">
        <form  action = "/edit/{{ $user->id }}" method = "post" style="margin-top: 5%; padding:10px;">
            @csrf
            <div class="panel-heading">
                <center style="font-weight: bold"><h2>Client TransferIn</h2></center>
            </div>
            <hr><br>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fname">First Name</label>
                    <input name="fname" type="text" class="form-control" id="fname" placeholder="First name" value="{{ $user->fname}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="mname">Middle Name</label>
                    <input name="mname" type="text" class="form-control" id="mname" placeholder="Middle name" value="{{ $user->mname}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="lname">Last Name</label>
                    <input name="lname" type="text" class="form-control" id="lname" placeholder="Last name" value="{{ $user->lname}}" readonly>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nemis">Nemis</label>
                    <input name="Nemis" type="text" class="form-control" id="nemis" placeholder="Nemis" value="{{ $user->Nemis}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="dob">DOB</label>
                    <input name="dob" type="date" class="form-control" id="dob" value="{{ $user->dob}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <input name="gender" type="text" class="form-control" id="gender" value="{{ $user->gender}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number">Phone Number</label>
                    <input name="phone" type="number" class="form-control" id="phone_number" placeholder="Phone Number" value="{{ $user->phone}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="national_id_number">National Id Number</label>
                    <input name="id_no" type="number" class="form-control" id="national_id_number" placeholder="National Id Number" value="{{ $user->id_no}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                        <label for="national_id_number">Current Facility</label>
                        <input name="facilitydisp" type="text" class="form-control" id="facility" placeholder="National Id Number" value="{{ $user->facility}}" readonly>
                    </div>
                <div class="form-group col-md-4">
                    <label for="mfl_code">MFL Code</label>
                    <input name="mfl_code" type="text" class="form-control" id="mfl_code"  readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="serial_number"> Client CCC Number</label>
                    <input name="CCC_Number" type="varchar" class="form-control" id="serial_number" placeholder="Serial Number" value="{{ $user->CCC_Number}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="national_id_number">Facility Transferring To</label>
                    <input name="facility" type="text" class="form-control" id="facility" placeholder="Facility Transferring To">
                </div>
                <div class="form-group col-md-4">
                    <label for="mfl_code">MFL Code</label>
                    <input name="mfl_code" type="text" class="form-control" id="mfl_code"  readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="residence">Residence</label>
                <input name="Resident" type="text" class="form-control" id="residence" placeholder="1234 Main St" {{ $user->Resident}}>
            </div>

            <div class="form-row">
{{--                <div class="form-group col-md-4">--}}
{{--                    <label for="county">County</label>--}}
{{--                    <select name="county" id="facility" class="form-control">--}}

{{--                    </select>--}}

{{--                    --}}{{-- <input name='county' type="text" class="form-control" id="county"> --}}
{{--                </div>--}}
                <div class="form-group col-md-4">
                    <label for="date_of_transfer">Date Of Transfer</label>
                    <input name="enddate" type="date" class="form-control" id="date_of_transfer">
                </div>

            </div>

            <center><button type="submit" class="btn btn-success">TransferIn  </button></center>
        </form>
    </div>
    @endforeach
@endsection
