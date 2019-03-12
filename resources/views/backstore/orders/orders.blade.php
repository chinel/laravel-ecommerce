@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="../admin/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">
@endsection
@section('header-title')
    Orders
@endsection

@section('breadcrumb')
    Orders
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

            @if (session('error'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{ session('error')}}
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Orders</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>S/N</th>
                    <th>Order Code</th>
                    <th>Total Amount</th>
                    <th>Ordered By</th>
                    <th>Contact Details</th>
                    <th>Date Ordered</th>
                    <th>Delivery Date/Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $index => $value)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$value->order_code}}</td>
                        <td>₦{{$value->delivery_fee + $value->service_fee + $value->product_total}}</td>
                        <td>{{$value->getUserName($value->user_id)}}</td>
                        <td>{{$value->getUserContactDetails($value->user_id)}}</td>
                        <td>{{date_format(date_create($value->created_at), "F jS, Y h:i:s A")}}</td>
                        <td>{{$value->delivery_date}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{url('/backstore/view-order/'.$value->order_code)}}"> View order</a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Title </th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>

            <div class="row text-center">
                <div class="col-md-12">
                    <div class="pagging relative">
                        {!! $orders->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>@endsection
@section('scripts')
    <!-- DataTables -->
    <script src="../admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- SlimScroll -->
    <script src="../admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../admin/plugins/fastclick/fastclick.js"></script>

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
