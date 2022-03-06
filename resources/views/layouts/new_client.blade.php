

@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white; margin-top:10%; margin-bottom:30%;">
    @if (Session::has('success'))
    <div class="col-sm-12">
        <div class="alert alert-success " role="alert">
            {{ Session::get('success') }}
            <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
        </div>
    </div>
    @endif
    <form action="/create_patient" method="post" >
        @csrf
        <div class="panel-heading" style="padding-top:2%">
            <center>Client Information</center>
        </div>
               <hr><br>
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
                <input name="Nemis" type="text" class="form-control" id="Nemis" placeholder="Nemis">
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
            <div class="form-group col-md-3">
                <label for="facility">Facility</label>
                <select name="facility_id" id="facility_id" class="form-control">
                    <option value="" selected disabled>Select facility</option>
                    {{-- <option value='Facility1'>Facility 1</option>
                    <option value='Facility2'>Facility 2</option> --}}

                    @foreach ($facilities as $facilitykey => $facility)

                    <option value="{{ $facility->mfl_code }}" >{{$facility->mfl_code}}  - {{ $facility->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="mfl_code">MFL Code</label>
                <input name="mfl_code" type="text" class="form-control" id="mfl_code" readonly >
            </div>
            <div class="form-group col-md-3">
                <label for="serial_number">Serial Number</label>
                <input name="serial_no" type="number" class="form-control" id="serial_number" placeholder="Serial Number">
            </div>
            <div class="form-group col-md-3">
                <label for="ccc_number">CCC Number</label>
                <input name="CCC_Number" type="text" class="form-control" id="CCC_Number" readonly>
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
                    <select name="ward" id="ward" value=""class="form-control">
                        <option value="" selected disabled>Select  Ward</option>
                @foreach ($patient as $countyOPtionsKey => $countyOPtionsValue)

                        <option value="{{ $countyOPtionsValue }}" >{{ $countyOPtionsValue }}</option>
                @endforeach

                    </select>

            </div>

            <div class="form-group col-md-3">
                
                    <label for="village">Village</label>
                    <input name="village" type="text" class="form-control" id="village" placeholder="Village">
            </div>
        </div>
        <div class="form-group">
            <label for="residence">Residence</label>
            <input name="Resident" type="text" class="form-control" id="Resident" placeholder="1234 Main St">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script type="text/javascript">
    $(document).ready(function($){
        $("#facility_id").select2();
        $('#mfl_code, #CCC_Number, #facility_id, #serial_number').on('change', function() {
            $('#CCC_Number').val($('#facility_id').val() + ' - ' + $('#serial_number').val() );
            $('#mfl_code').val($('#facility_id').val());
        });
        $('#county, #Resident, #sub_county, #ward, #village').on('change', function() {

        $('#Resident').val(
                            // if($('#county').val() =="" || $('#sub_county').val()== ""||$('#ward').val()==""){
                            //     $('#county').val()="",
                            //     $('#sub_county').val()="",
                            //     $('#ward').val()="",
                            // }
                            $('#county').val() +'/'
                            + $('#sub_county').val()
                            +'/' +$('#ward').val()
                            + '/'+$('#village').val());
        });

    })
</script>
@endsection
