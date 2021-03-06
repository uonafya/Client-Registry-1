@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <div class="container" style="background-color: white">
            <form  method = "post" style="margin-top: 5%; padding:10px;">
                @csrf
                <div class="panel-heading">
                    <center style="font-weight: bold"><h2>Client Details</h2></center>
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
                    <div class="form-group col-md-3">
                        <label for="facility">Current Facility</label>
                        {{--                    <select name="facility" id="linked_facility" class="form-control" searchable>--}}
                        {{--                        <option selected disabled>Select facility</option>--}}
                        {{--                        @foreach ($facilities as $facilitykey => $facility)--}}

                        {{--                            <option value="{{ $facility->mfl_code }}" >{{$facility->mfl_code}} {{ $facility->name }}</option>--}}
                        {{--                        @endforeach--}}
                        {{--                    </select>--}}
                        <input name="facility1" type="text" class="form-control" id="facilitys" value="{{ $user->name}}" readonly>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="mfl_code">MFL Code</label>
                        <input name="mfl_code1" type="number" class="form-control" id="mfl_code1" readonly value="{{$user->facility_id}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ccc_number">CCC Number</label>
                        <input name="CCC_Number" type="text" class="form-control" id="CCC_Number" readonly value="{{$user->CCC_Number}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="national_id_number">Facility Transferring To</label>
                        <input name="CCC_Number" type="text" class="form-control" id="CCC_Number" readonly value="{{$user->facility2}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mfl_code">MFL Code</label>
                        <input name="mfl_code1" type="number" class="form-control" id="mfl_code1" readonly value="{{$user->mflcode2}}">
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="county">Client Transfer Status</label>

                        <label name="mfl_code1" type="text" class="form-control" id="mfl_code1" readonly>
                                @if($user->transferstatus == 0)
                                    <span class="badge badge-success " style="font-size: 15px;">In Facility</span>
                                @elseif($user->transferstatus == 1)
                                    <span class="badge badge-warning " style="font-size: 15px;">Awaiting Approval</span>
                                @else
                                    <span class="badge badge-primary" style="font-size: 15px;">Approved</span>
                        </label>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="residence">Reason For Transfer</label>
                        <input name="rtransfer" type="text" class="form-control" id="rtransfer" placeholder="Reason"
                               style="height: 100px; font-weight: bold;"value="{{$user->rtransfer}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="residence">Date Transfer was Initiated</label>
                    <input name="enddate" type="date" class="form-control" id="enddate" placeholder="Date of Transfer" value="{{$user->dot}}" readonly>
                </div>
                <center><button type="submit" class="btn btn-primary">Close</button></center>
            </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript">
            $(document).ready(function($){
                $('#mfl_code, #facility, #serial_number').on('change', function() {
                    $('#mfl_code').val($('#facility').val());
                });
                $('#county, #residence, #sub_county, #ward, #village').on('change', function() {

                    $('#residence').val($('#county').val() +',  '
                        + $('#sub_county').val()
                        +',  ' +$('#ward').val()
                        + ',  '+$('#village').val());
                });

            })
        </script>
    @endforeach
@endsection
