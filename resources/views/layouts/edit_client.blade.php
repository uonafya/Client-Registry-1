@extends('layouts.app')

@section('content')

    @foreach ($users as $user)
    <div class="container" style="background-color: white; margin-top:10%; margin-bottom:30%; ">

        @if (Session::has('success'))
            <div class="col-sm-12">
                <div class="alert alert-success " role="alert">
                    {{ Session::get('success') }}
                    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                </div>
            </div>
        @endif

        <form  action = "/update_client/{{ $user->id }}" method = "post" style="margin-top: 5%; ">
            @csrf
            <div class="panel-heading">
                <center ><h4>Edit Client Information</h4></center>
            </div>
            <hr>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fname">First Name</label>
                    <input name="fname" type="text" class="form-control" id="fname" placeholder="First name" value="{{ $user->fname}}" >
                </div>
                <div class="form-group col-md-4">
                    <label for="mname">Middle Name</label>
                    <input name="mname" type="text" class="form-control" id="mname" placeholder="Middle name" value="{{ $user->mname}}" >
                </div>
                <div class="form-group col-md-4">
                    <label for="lname">Last Name</label>
                    <input name="lname" type="text" class="form-control" id="mname" placeholder="Middle name" value="{{ $user->lname}}" >
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nemis">Nemis</label>
                    <input name="nemis" type="text" class="form-control" id="nemis" placeholder="Nemis" value="{{ $user->Nemis}}" >
                </div>
                <div class="form-group col-md-4">
                    <label for="dob">DOB</label>
                    <input name="dob" type="text" class="form-control" id="mname" placeholder="Middle name" value="{{ $user->dob}}" >
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select name='gender' id="gender" class="form-control" value="{{ $user->gender}}">
                        {{-- <option selected disabled>{{ $user->gender}}</option> --}}
                        <option value='F'>Female</option>
                        <option value='M'>Male</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number">Phone Number</label>
                    <input name="phone" type="text" class="form-control" id="gender" value="{{ $user->phone}}" >
                </div>
                <div class="form-group col-md-6">
                    <label for="national_id_number">National Id Number</label>
                    <input name="id_no" type="text" class="form-control" id="gender" value="{{ $user->id_no}}" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="national_id_number">Facility</label>
                    <select name="facility_id" id="facility_id" class="form-control">
                        <option defaultValue="{{ $user->facility_id }}" selected disabled>{{$user->facility_id}}  {{$user->name  }}</option>
                        @foreach ($facilities as $facilitykey => $facility)

                            <option value="{{ $facility->mfl_code }}" >{{$facility->mfl_code}} {{ $facility->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="mfl_code">MFL Code</label>
                    <input name="mfl_code" type="text" class="form-control" id="mfl_code" value="{{$user->facility_id}}"  readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="serial_number">Serial Number</label>
                  
                    <input name="serial_number" type="text" class="form-control" id="serial_number" value="{{ $user->CCC_Number}}">
                </div>
                <div class="form-group col-md-3">
                    <label for="ccc_number">CCC Number</label>
                  
                    <input name="CCC_Number" type="text" class="form-control" id="CCC_Number" value="{{ $user->CCC_Number}}" readonly>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="county">County</label>
                    <select name="county" id="county" class="form-control">
                        <option value="" selected disabled>Select County</option>
                        @foreach ($patient as $countyOPtionsKey => $countyOPtionsValue)

                            <option value="{{ $countyOPtionsValue }}" >{{ $countyOPtionsValue }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group col-md-3">
                    <label for="sub_county">Sub County</label>
                    <select name="sub_county" id="sub_county" class="form-control">
                        <option value="" selected disabled>Select Sub County</option>
                        @foreach ($patient as $countyOPtionsKey => $countyOPtionsValue)

                            <option value="{{ $countyOPtionsValue }}"  >{{ $countyOPtionsValue }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group col-md-3">
                    <label for="ward">Ward</label>
                    <select name="ward" id="ward" class="form-control">
                        <option value="" selected disabled>Select  Ward</option>
                        @foreach ($patient as $countyOPtionsKey => $countyOPtionsValue)

                            <option value="{{ $countyOPtionsValue }}" >{{ $countyOPtionsValue }}</option>
                        @endforeach

                    </select>

                </div>

                <div class="form-group col-md-3">
                    <label for="village">Village</label>
                    <input name="village" type="text" class="form-control" id="village" >

                </div>
            </div>
            <div class="form-group">
                <label for="residence">Residence</label>
                <input name="Resident" type="text" class="form-control" id="Resident" placeholder="1234 Main St" value="{{$user->Resident}}">
            </div>
            <button type="submit" class="btn btn-success">Edit  </button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function($){

            $('#mfl_code, #CCC_Number, #facility_id, #serial_number').on('change', function() {
                $('#mfl_code').val($('#facility_id').val());
                $('#CCC_Number').val($('#facility_id').val()+ ' - '+$('#serial_number').val());
            });
            
            $('#county, #Resident, #sub_county, #ward, #village').on('change', function() {

                $('#Resident').val($('#county').val() +'/'
                    + $('#sub_county').val()
                    +'/' +$('#ward').val()
                    + '/'+$('#village').val());
            });

            //extract serial number
            var ccc_number=$('#CCC_Number').val();
            var array= ccc_number.split(" - ");
            var serial_no = array[1];
            $('#serial_number').val(serial_no);

            //extract residence
            var residence=$('#Resident').val();
            var array= residence.split("/");
            var county = array[0];
            var subcounty = array[1];
            var ward = array[2];
            var village = array[3];
            $('#county').val(county);
            $('#sub_county').val(subcounty);
            $('#ward').val(ward);
            $('#village').val(village);

        })
    </script>
    @endforeach
@endsection
