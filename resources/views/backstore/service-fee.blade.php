@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
@endsection
@section('header-title')
    Service Fee
@endsection

@section('page-title')
    BackStore | Service Fee
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
            <h3 class="card-title"><?php echo (empty($serviceFee)) ? "Add" : 'Edit';?>  Service Fee</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form action="{{url('/backstore/addServiceFee')}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label>Service Fee for Sub total lower than 50,000 Naira(%)</label>
                            <input type="number" class="form-control" required name="lowerSubtotal"  @if(!empty($serviceFee)) value="{{$serviceFee->lowerSubtotal}}" @endif>
                        </div>

                        <div class="form-group">
                            <label>Service Fee for Sub total higher than 50,000 Naira(%)</label>
                            <input type="number" class="form-control" required name="higherSubtotal"  @if(!empty($serviceFee)) value="{{$serviceFee->higherSubtotal}}" @endif>
                        </div>

                        @if(\Auth::user()->role_id != 3)
                        <div class="row">
                            <div class="col-md-12">
                                @if(empty($serviceFee))
                                    <input type="submit" class="btn btn-success float-right" value="Add">
                                @else
                                    <input type="submit" class="btn btn-success float-right" value="Update">
                                @endif
                            </div>
                        </div>
                            @endif
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
