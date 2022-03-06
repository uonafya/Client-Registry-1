

@extends('layouts.app')

@section('content')
<div class="container" style="background-color: white; margin-top:10%;">
    <form action="/create_patient" method="post" >
        @csrf
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
           

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Nemis</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <div class="form-group col-md-6">
                <label for="confirm_password">Last Name</label>
                <input name="confirm_password" type="password" class="form-control" id="password" placeholder="Confirm password">
            </div>
            
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        
    </form>
</div>
@endsection
