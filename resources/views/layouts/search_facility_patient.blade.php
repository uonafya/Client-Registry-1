@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top:10%;">
        <div class="col-md-12">
                    <br>
                    <table class="table table-striped" style="border-radius: 12px;">
                        <thead class="thead-light">
                        <tr >
                            <th>CCC No.</th>
                            <th>Firstname</th>
                            <th>Midlename</th>
                            <th>Lastname</th>
                            <th>DOB</th>
                            <th>ID No.</th>
                            <th>Facility</th>
                            <center><th colspan="2">Tools</th></center>
                        </tr>
                        </thead>

                        <tr>
                        @foreach ($facilityPatients as $user)
                            <tr style="margin-left: 20px;">
                                <td>{{ $user->CCC_Number }}</td>
                                <td>{{ $user->fname}}</td>
                                <td>{{ $user->mname}}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->dob}}</td>
                                <td>{{ $user->id_no}}</td>
                                <td>{{$user->name}}</td>
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
                                <td><a href = 'update_client/{{ $user->id }}'><button class="btn btn-success">Edit</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

        </div>
    </div>

@endsection