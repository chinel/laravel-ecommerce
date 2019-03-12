@extends('backstore.layouts.master')

@section('header-title')

      Shoprite Pickup | BackStore - Dashboard

@endsection


@section('page-title')
      BackStore | Dashboard
@endsection


@section('main-content')

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-history"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pending Items</span>
                    <span class="info-box-number">
                  {{number_format($pendingItems)}}

                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total order</span>
                    <span class="info-box-number">{{number_format($totalOrderedItems)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total registrations</span>
                    <span class="info-box-number">{{number_format($allCustomers)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Paying Customers</span>
                    <span class="info-box-number">{{number_format($payingCustomers)}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- Main row -->
    <div class="row">


        <div class="col-md-12">

            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Orders</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Status</th>
                                <th>Ordered Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($latestOrders))
                                @foreach($latestOrders as $value)
                                    <tr>
                                        <td><a href="#">{{$value->order_code}}</a></td>
                                        <td>{{$value->getProductDetail($value->product_id)->title}}</td>
                                        <td>
                                            @switch($value->shipping_status)
                                              @case("pending")
                                                <span class="badge badge-warning">Pending</span></td>
                                               @break
                                                @case("processing")
                                                <span class="badge badge-info">Processing</span></td>
                                                @break
                                                @case("delivered")
                                                 <span class="badge badge-success">Delivered</span></td>
                                                @break
                                                @case("cancelled")
                                                <span class="badge badge-danger">Cancelled</span></td>
                                                @break
                                            @endswitch

                                        <td>
                                            {{date_format(date_create($value->created_at), "F jS, Y h:i:s A")}}
                                        </td>
                                    </tr>
                                @endforeach
                              @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="{{url('/backstore/orders')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- /.col -->
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

    <script src="{{url('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}'"></script>
    <!-- AdminLTE App -->
    <script src="{{url('admin/dist/js/adminlte.js')}}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{url('admin/dist/js/demo.js')}}"></script>

    <!-- PAGE PLUGINS -->
    <!-- SparkLine -->
    <script src="{{url('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jVectorMap -->
    <script src="{{url('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{url('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{url('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- ChartJS 1.0.2 -->
    <script src="{{url('admin/plugins/chartjs-old/Chart.min.js')}}"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{url('admin/dist/js/pages/dashboard2.js')}}"></script>
@endsection
