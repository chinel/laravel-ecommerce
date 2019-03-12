@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
@endsection
@section('header-title')
    Edit Admin User
@endsection

@section('page-title')
    BackStore | Edit Admin User
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
            <h3 class="card-title">Edit Admin User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{url('/backstore/update-adminUser/'.$adminUser->id)}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" class="form-control" required name="firstname" value="{{$adminUser->firstname}}">
                        </div>
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" class="form-control" required name="lastname" value="{{$adminUser->lastname}}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" required name="email" value="{{$adminUser->email}}">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required name="phone" value="{{$adminUser->phone}}">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" id="" class="form-control" required>
                                <option value="">-- Select a Role --</option>
                                @foreach($roles as $role)
                                    <option @if($adminUser->role_id == $role->id) selected @endif value="{{$role->id}}">{{$role->title}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="active" id="" class="form-control" required>
                                <option value="">-- Select a Status</option>
                                <option @if($adminUser->active == 1) selected @endif value="1">Active</option>
                                <option @if($adminUser->active == 0) selected @endif value="0">Inctive</option>
                            </select>
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
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
