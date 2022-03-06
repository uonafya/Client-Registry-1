

@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white; margin-top:10%;">
    <form action="/create_user" method="post" >
        @csrf
        @if (Session::has('success'))
        <div class="col-sm-12">
            <div class="alert alert-success " role="alert">
                {{ Session::get('success') }}
                <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
            </div>
        </div>
        @endif
        <div class="panel-heading" style="padding-top:2%">
            <center>Register User</center>
        </div>
               <hr><br>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Facility MFL_CODE</label>
                <input name="facility_id" type="number class="form-control" id="email" placeholder="Enter Facility MFL_CODE">
            </div>


        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
            </div>

        </div>

        <button type="submit" class="btn btn-success">Save</button>

    </form>
</div>
@endsection
