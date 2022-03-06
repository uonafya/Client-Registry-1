@extends('layouts.app')

@section('content')

<<<<<<< Updated upstream
    <div class="container" style="margin-top:10%;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{--                <a href="referrals" > <button class="btn-primary btn btn-sm" type="button" id="new_appointment"><i class="fa fa-plus"></i> New Referral</button></a>--}}
=======
<div class="container">
    <div class="col-md-12">
        <div >
            <div class="card-body col-md-12">
                {{-- <a href="referrals"> <button class="btn-primary btn btn-sm" type="button" id="new_appointment"><i
                            class="fa fa-plus"></i> New Referral</button></a>--}}
>>>>>>> Stashed changes

                <br>
                <br>
                <br>
                {{-- <table id="example3" class="display dataTable table-striped table-bordered  compact stripe" style="width:100%; border-radius: 12px;"> --}}
                <table id="example3" class="display dataTable table-responsive  table-striped">
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
                        <td>{{$user->name}}</td>
                        <td><a href='edit/{{ $user->id }}'><button class="btn btn-success">Initiate
                                    Transfer</button></a></td>
                        <td><a href='update_client/{{ $user->id }}'><button class="btn btn-success">Edit</button></a>
                        </td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('jscontent')
<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#quickForm').validate({
      rules: {
        name: {
          required: true,
          name: true,
        },
      },
      messages: {
        name: {
          required: "Please enter a client name ",
          email: "Please enter a vaild client name "
        },
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    });
    });
  </script>
@endsection