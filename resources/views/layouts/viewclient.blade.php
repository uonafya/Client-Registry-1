@extends('layouts.app')

@section('content')
<body>
<div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{--                <a href="referrals" > <button class="btn-primary btn btn-sm" type="button" id="new_appointment"><i class="fa fa-plus"></i> New Referral</button></a>--}}

                    <br>
                    <table class="table table-bordered" style="border-radius: 12px;">
                        <thead>
                        <tr style="color: blue;">
                            <th>CCC No.</th>
                            <th>Firstname</th>
                            <th>Midlename</th>
                            <th>Lastname</th>
                            <th>DOB</th>
                            <th>ID No.</th>
                            <th>Facility</th>
{{--                            <th>Transfer Status</th>--}}
                            <center><th colspan="2">Tools</th></center>
                        </tr>
                        </thead>

                        <tr>
                        @foreach ($users as $user)
                            <tr style="margin-left: 20px;">
                                <td>{{ $user->CCC_Number }}</td>
                                <td>{{ $user->fname}}</td>
                                <td>{{ $user->mname}}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->dob}}</td>
                                <td>{{ $user->id_no}}</td>
                                <td>{{$user->fname}}</td>
{{--                                <td> <li style="margin-left: 9px;"> <strong >--}}
{{--                                            <?php--}}
{{--                                            $account = DB::table('patients')--}}
{{--                                                ->where('transferin',0)--}}
{{--                                                ->get();--}}
{{--                                            if($account ==0):?>--}}
{{--                                            <span class="badge badge-primary" style="font-size: 15px;">In Facility</span>--}}
{{--                                            <?php elseif($account ==1):?>--}}
{{--                                            <span class="badge badge-warning" style="font-size: 15px;">Transferred</span>--}}
{{--                                            <?php endif ?>--}}
{{--                                        </strong></li></td>--}}
                                <td><a href = 'edit/{{ $user->id }}'><button class="btn btn-success">Initiate Transfer</button></a></td>
                                @endforeach
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
