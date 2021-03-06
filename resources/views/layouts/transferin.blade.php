@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
    <div class="container" style="background-color: white; margin-top:10%; margin-bottom:20%;">
        @if (Session::has('success'))
        <div class="col-sm-12">
            <div class="alert alert-success " role="alert">
                {{ Session::get('success') }}
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
            </div>
        </div>
        @endif
        <form  action = "/editc/{{ $user->id }}" method = "post" >
            @csrf
            <div class="panel-heading">
                <center style="font-weight: bold"><h2>Client Transfer</h2></center>
            </div>
            <hr>
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
                    <input name="lname" type="text" class="form-control" id="mname" placeholder="Middle name" value="{{ $user->lname}}" readonly>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nemis">Nemis</label>
                    <input name="Nemis" type="text" class="form-control" id="Nemis" placeholder="Nemis" value="{{ $user->Nemis}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="dob">DOB</label>
                    <input name="dob" type="text" class="form-control" id="mname" placeholder="Middle name" value="{{ $user->dob}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <input name="gender" type="text" class="form-control" id="gender" value="{{ $user->gender}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number">Phone Number</label>
                    <input name="phone" type="text" class="form-control" id="gender" value="{{ $user->phone}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="national_id_number">National Id Number</label>
                    <input name="id_no" type="text" class="form-control" id="gender" value="{{ $user->id_no}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="facility">Current Facility</label>
                    <input name="facility1" type="text" class="form-control" id="facilitys" value="{{$user->facility_id}}  {{$user->name }}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="mfl_code">MFL Code</label>
                    <input name="mfl_code1" type="number" class="form-control" id="mfl_code1" readonly value="{{$user->facility_id}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="ccc_number">CCC Number</label>
                    <input name="CCC_Number" type="text" class="form-control" id="CCC_Number" readonly value="{{$user->CCC_Number}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="national_id_number">Facility Transferring To</label>
                    <select name="facility_id" id="facility" class="form-control">
                        <option selected disabled>Select facility</option>
                        @foreach ($facilities as $facilitykey => $facility)

                            <option value="{{ $facility->mfl_code }}" >{{$facility->mfl_code}} {{ $facility->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="mfl_code">MFL Code</label>
                    <input name="mfl_code" type="number" class="form-control" id="mfl_code"  readonly>
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
                    <input name="village" type="text" class="form-control" id="village">

                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="residence">Residence</label>
                    <input name="Resident" type="text" class="form-control" id="Resident" placeholder="1234 Main St"  value="{{$user->Resident}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="residence">Reason For Transfer</label>
                    <input name="rtransfer" type="text" class="form-control" id="rtransfer" placeholder="Reason for transfer"
                    style="height: 100px;">
                </div>
            </div>
            <div class="form-group">
                <label for="residence">Date of Initiation</label>
                <input name="enddate" type="date" class="form-control" id="enddate" placeholder="Date of Transfer">
            </div>
            <center><button type="submit" class="btn btn-success">Initiate Transfer</button></center>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <script type="text/javascript">
        $(document).ready(function($){
            $("#facility").select2();
            $('#mfl_code, #facility, #serial_number').on('change', function() {
                $('#mfl_code').val($('#facility').val());
            });
            $('#county, #Resident, #sub_county, #ward, #village').on('change', function() {

                $('#Resident').val($('#county').val() +'/'
                    + $('#sub_county').val()
                    +'/' +$('#ward').val()
                    + '/'+$('#village').val());
            });

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
