@extends('layouts.app')
@section('content')

<div class="container" style="width:auto%; margin-left:auto; margin-right:auto; padding-top:15%;">
    <section class="search-sec">
        <div class="container">
            <form method="post" action="{{ url('/search-query/') }}" style="" novalidate="novalidate">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <input id="queryData" name="actual_search" type="text" class="form-control search-slt"
                                    placeholder="Enter Search">
                            </div>
                            &nbsp;
                            &nbsp;
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select name="search_criteria" class="form-control search-slt" required>
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
                                <button class="btn btn-success" type="submit">search</button>
                            </div>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </form>
            <table style="width: 100%" id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr style="color: green;">
                        <th style="width: 20%">CCC No.</th>
                        <th style="width: 20%">Firstname</th>
                        <th style="width: 20%">Midlename</th>
                        <th style="width: 20%">Lastname</th>
                        <th style="width: 20%">DOB</th>
                        <th style="width: 20%">ID No.</th>
                        <th style="width: 20%">Facility</th>
                        {{-- <th>Transfer Status</th>--}}
                        <center>
                            <th colspan="2">Tools</th>
                        </center>
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
                    <td>{{$user->facility_id}}{{$user->name}}</td>
                    <td><a href='edit/{{ $user->id }}'><button class="btn btn-success">Initiate
                                Transfer</button></a></td>
                    <td><a href='update_client/{{ $user->id }}'><button
                                class="btn btn-success">Edit</button></a>
                        @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $("#queryData").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#example3 tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
//     $(document).mouseup(function(e)
//         {
//             var container = $(".textInput");
//             if (!container.is(e.target) && container.has(e.target).length === 3)
//         {
//             container.hide();
//             }
//         });
// });
    // $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    // $(function() {
    // $("#example1").DataTable({
    //   "responsive": true,
    //   "lengthChange": false,
    //   "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
    // $('#quickForm').validate({
    //   rules: {
    //     name: {
    //       required: true,
    //       name: true,
    //     },
    //   },
    //   messages: {
    //     name: {
    //       required: "Please enter a client name ",
    //       email: "Please enter a vaild client name "
    //     },
    //   },
    //   errorElement: 'span',
    //   errorPlacement: function(error, element) {
    //     error.addClass('invalid-feedback');
    //     element.closest('.form-group').append(error);
    //   },
    //   highlight: function(element, errorClass, validClass) {
    //     $(element).addClass('is-invalid');
    //   },
    //   unhighlight: function(element, errorClass, validClass) {
    //     $(element).removeClass('is-invalid');
    //   }
    // });
    // });
    // });
</script>
@endsection