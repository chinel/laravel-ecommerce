@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style>
        label.error{
            color: red;
        }

    </style>
@endsection
@section('header-title')
    Change Password
@endsection

@section('page-title')
    BackStore | Change Password
@endsection


@section('main-content')


    <div class="row mt-3">
        <div class="col-md-12">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach

            @endif

            @if (session('status'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{ session('status')}}
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Change Password</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{url('/backstore/updatePassword')}}" method="post" role="form" id="updatePassword">
                        @csrf
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" required name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label>Retype New Password</label>
                            <input type="password" class="form-control" required name="password_again" id="password_again">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success float-right" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
@section('scripts')
    <!-- DataTables -->
    <script src="{{url('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{url('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('admin/plugins/fastclick/fastclick.js')}}"></script>
    <script src="{{url('storefront/js/jquery.validate.min.js')}}" defer=""></script>
    <script>
        $(document).ready(function () {
            $("#updatePassword").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 5
                    },

                    password_again: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>


@endsection
