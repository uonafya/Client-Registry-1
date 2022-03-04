@extends('layouts.app')
@section('content')
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
                                    <!--                               4 stars and up -->
                                    <option>
                                        <a>
                                            <p>Id Number</p>
                                        </a href="#">
                                    </option>
                                    <!--                               3 stars and up -->
                                    <option>
                                        <a>
                                            <p>&#9733; &#9733; &#9733; &#x2606; &#x2606;</p>
                                        </a href="#">
                                    </option>
                                    <!--                               2 stars and up -->
                                    <option>
                                        <a>
                                            <p>&#9733; &#9733; &#x2606; &#x2606; &#x2606;</p>
                                        </a href="#">
                                    </option>
                                    <!--                               1 star and up -->
                                    <option>
                                        <a>
                                            <p>&#9733; &#x2606; &#x2606; &#x2606; &#x2606;</p>
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
@endsection