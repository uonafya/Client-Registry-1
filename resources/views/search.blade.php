@extends('layouts.app')
@section('content')
<div style="width:auto%; margin-left:auto; margin-right:auto;" class="align-middle">
    <div>
        <img class="logo" style="display: block; margin-left:auto; margin-right:auto; width:30% background-color:whitesmoke;" src="img/Kenya-logo.webp" alt="National Logo"/>
    </div>
    <br>
    <br>
        <section class="search-sec">
            <div class="container">
                <form action="#" style="padding-left:25%" method="post" novalidate="novalidate">
                    <div class="row">
                        <form method="POST" action="{{ url('/searchPatient') }}">
                            @csrf
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                        <input type="text" class="form-control search-slt" placeholder="Enter Search">
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                        <select class="form-control search-slt">
                                            <option value="" disabled selected>Choose Criteria</option>

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
                                    &nbsp;
                                    &nbsp;
                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                        <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
