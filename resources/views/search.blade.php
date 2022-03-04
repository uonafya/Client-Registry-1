@extends('layouts.app')
@section('content')
    <div class="card">
        <img src="/public/img/log.svg" alt="National Logo"/>
    </div>
    <div style="width:auto%; margin:30%; padding-left:8%" class="align-middle">
        <section class="search-sec">
            <div class="container">
                <form action="#" method="post" novalidate="novalidate">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <input type="text" class="form-control search-slt" placeholder="Enter Search">
                                </div>
                                &nbsp;
                                &nbsp;
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <select class="form-control search-slt">
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
                                                <p>Id Number</p>
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
                                    <button type="button" class="btn btn-danger wrn-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection