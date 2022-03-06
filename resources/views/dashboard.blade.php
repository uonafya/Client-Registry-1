@extends('layouts.app')
@section('content')
<div style="width:auto%; margin-left:auto; margin-right:auto;" class="align-middle">
    {{-- <div>
        <img class="logo" style="display: block; margin-left:auto; margin-right:auto; width:30% background-color:whitesmoke;" src="img/Kenya-logo.webp" alt="National Logo"/>
    </div> --}}
    <br>
    <br>
<div class="container" style="width:auto%; margin-left:auto; margin-right:auto; padding-top:15%;">
        <section class="search-sec"> 
            <div class="container">
                <form method="post" action="{{ url('/search-query/') }}" style="padding-left:25%" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <input name="actual_search" type="text" class="form-control search-slt" placeholder="Enter Search">
                                </div>
                                &nbsp;
                                &nbsp;
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <select name="search_criteria" class="form-control search-slt">
                                        <option>Choose Criteria</option>
                                        <option>
                                            <a>
                                                <p>Client Name</p>
                                            </a href="#">
                                        </option>
                                        <!--                               1 star and up -->
                                        <option>
                                            <a>
                                                <p>Facility</p>
                                            </a href="#">
                                        </option>
                                        <option>
                                            <a>
                                                <p>National ID Number</p>
                                            </a href="#">
                                        </option>
                                        <option>
                                            <a>
                                                <p>CCC Number</p>
                                            </a href="#">
                                        </option>                                
                                    </select>
                                </div>
                                {{-- &nbsp;
                                &nbsp; --}}
                                <div class="col-lg-2 col-md-2 col-sm-12">
                                    <a href="{{ url('/allclients') }}" class="btn btn-success wrn-btn">Search</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection