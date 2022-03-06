@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <div class="container" style="background-color: white; margin-top:10%; margin-bottom:30%;">
            @if (Session::has('success'))
            <div class="col-sm-12">
                <div class="alert alert-success " role="alert">
                    {{ Session::get('success') }}
                    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                </div>
            </div>
            @elseif(Session::has('error'))
                <div class="col-sm-12">
                    <div class="alert alert-danger " role="alert">
                        {{ Session::get('error') }}
                        <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                        <button type="button" class="btn btn-primary"><a href="/search"><span aria-hidden="true" style="color: black;">OK</span></a></button>
                    </div>
                </div>
            @endif
            <form action = "/transferup/{{ $user->id }}" method = "post" style="margin-top: 5%; padding:10px;">
                @csrf
                <div class="panel-heading">
                    <center style="font-weight: bold"><h2>Client Transfer</h2></center>
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
                    <div class="form-group col-md-4">
                        <label for="facility">Current Facility</label>
                        {{--                    <select name="facility" id="linked_facility" class="form-control" searchable>--}}
                        {{--                        <option selected disabled>Select facility</option>--}}
                        {{--                        @foreach ($facilities as $facilitykey => $facility)--}}

                        {{--                            <option value="{{ $facility->mfl_code }}" >{{$facility->mfl_code}} {{ $facility->name }}</option>--}}
                        {{--                        @endforeach--}}
                        {{--                    </select>--}}
                        <input name="facility1" type="text" class="form-control" id="facilitys" value="{{ $user->name}}" readonly>
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
                    <div class="form-group col-md-4">
                        <label for="national_id_number">Facility Transferring To</label>
                        <input name="facility_name" type="text" class="form-control" id="CCC_Number" readonly value="{{  $facilityobj["name"] }}">
                        <input style="display: none;" name="facility_id" type="text" class="form-control" id="CCC_Number" readonly value="{{  $user->facility2}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mfl_code">MFL Code</label>
                        <input name="mfl_code" type="number" class="form-control" id="mfl_code1" readonly value="{{$user->facility2}}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="dot">Date Transfer was Initiated</label>
                        <input name="enddate" type="date" class="form-control" id="enddate" placeholder="Date of Transfer" value="{{$user->dot}}" readonly>
                    </div>


                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="county">Client Transfer Status</label>

                        <div class="input-select">
                            <label name="mfl_code1" type="text" class="form-control" id="mfl_code1" readonly>
                                @if($user->transferstatus == 0)
                                    <span class="badge badge-success " style="font-size: 15px;">In Facility</span>
                                @elseif($user->transferstatus == 1)
                                    <span class="badge badge-warning " style="font-size: 15px;">Awaiting Approval</span>
                                @else
                                    <span class="badge badge-primary" style="font-size: 15px;">Approved</span>
                            </label>
                            @endif
                            <br>
                            <br>
                            <select onchange="showDiv('reject', this)"  name="transferstatus" class="input--style-5 zmdi-airplanemode-inactive" style="color: #0420c6; font-weight: bold;">
                                <option>Please Approve/Reject</option>
                                <option id="rej"  value="0" <?php echo isset($user->transferstatus) == 0  ?>>Reject Transfer</option>
                                <option id="approve" value="2" <?php echo isset($user->transferstatus)  == 1  ?>>Approve Transfer</option>
                            </select>
                    </div>

                </div>
                    <div class="form-group col-md-6" id="reject" style="display: none;">
                        <label for="residence" style="color: red;">Please give a reason for rejection</label>
                        <input name="rject" type="text" class="form-control" id="rject" placeholder="Reason"
                               style="height: 90px;">
                    </div>
                </div>

            @endforeach

                <center><button type="submit" class="btn btn-primary">Save</button></center>
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
        <script>
            function showDiv(divId, element)
            {
                document.getElementById(divId).style.display = element.value == 0 ? 'block' : 'none';
            }
        </script>
@endsection
