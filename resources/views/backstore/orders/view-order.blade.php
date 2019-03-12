@extends('backstore.layouts.master')
@section('link')
    <!-- DataTables -->
    <link rel="stylesheet" href="../admin/plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{url('admin/css/fileUpload.css')}}">
@endsection
@section('header-title')
    Order Details
@endsection

@section('breadcrumb')
    Order Details
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
            <h3 class="card-title">Order Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-3"><p><strong>Order code </strong> <br>{{$shippingDetail->order_code}}</p></div>
                                <div class="col-md-3"><p><strong>Payment Method </strong> <br>{{$shippingDetail->payment_method}}</p></div>
                                <div class="col-md-3"><p><strong>Date Ordered </strong> <br>{{date_format(date_create($shippingDetail->created_at), "F jS, Y h:i:s A")}}</p></div>
                                <div class="col-md-3"><p><strong>Delivery Date </strong> <br>{{$shippingDetail->delivery_date}}</p></div>
                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body  p-0">
                            <form action="{{url('backstore/updateOrder')}}" method="post">
                                @csrf
                                 <div class="table-responsive">
                                <table class="table table-hover">
                                   <thead>
                                   <tr>
                                       <th>Id</th>
                                       <th>Product</th>
                                       <th>Qty</th>
                                       <th>Status</th>
                                       <th>Sub total</th>

                                   </tr>
                                   </thead>
                                    <tbody>
                                    @foreach($orders as $index => $value)
                                    <tr>
                                        <td width="5%">1</td>
                                        <td  width="40%"><?php $product = $value->getProductDetail($value->product_id);?>
                                            <img src="{{$product->cover_image}}" alt="{{$product->title}}" style="width: 100px;">
                                            <br>
                                            <a href="#" target="_blank">{{$product->title}}</a>

                                            <small style="display: block;">{{$value->variation_types}} </small>
                                        </td>
                                        <td width="15%">
                                            @if($value->qty > 0)
                                                {{$value->qty}}
                                            @else
                                                <p class="noPrice">Nil</p>
                                            @endif

                                        </td>
                                        <td>
                                            <select name="orderId[{{$value->id}}]" >
                                                <option @if($value->shipping_status == "pending") selected @endif value="pending">Pending</option>
                                                <option @if($value->shipping_status == "processing") selected @endif value="processing">Processing</option>
                                                <option @if($value->shipping_status == "delivered") selected @endif value="delivered">Delivered</option>
                                                <option @if($value->shipping_status == "cancelled") selected @endif value="cancelled">Cancelled</option>
                                            </select>
                                        </td>

                                        <td width="20%">
                                            ₦{{$value->sub_total}}
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr><th colspan="4"><h5>Delivery Fee</h5></th><th>₦{{$shippingDetail->delivery_fee}}</th></tr>
                                    <tr><th colspan="4"><h5>Service Fee</h5></th><th>₦{{$shippingDetail->service_fee}}</th></tr>
                                    <tr><th colspan="4"><h5>Total</h5></th><th>₦{{$shippingDetail->delivery_fee + $shippingDetail->service_fee + $shippingDetail->product_total }}</th></tr>
                                    <tr><th colspan="4"><h5></h5></th><th>
                                            @if(\Auth::user()->role_id != 3)
                                            <button type="submit" class="btn btn-success">Update</button>
                                            @endif
                                        <th></tr>
                                    </tfoot>

                                </table>
                                 </div>
                                <input type="hidden" name="orderCode" value="{{$shippingDetail->order_code}}">
                            </form>

                            <div class="row mt-5">

                                    <div class="col-md-6 pl-3">
                                        <h4>Shipping Details</h4>
                                        <p>{{$shippingDetail->billing_firstname}} {{$shippingDetail->billing_lastname}},</p>
                                        <p>{{$shippingDetail->billing_email}} ,{{$shippingDetail->billing_phone}}</p>
                                        <p>{{$shippingDetail->billing_address}}, {{$shippingDetail->billing_city}}, {{$shippingDetail->billing_state}}</p>
                                    </div>
                                    <div class="col-md-6 text-right pr-3">
                                        <h4>Ordered By/ Owner</h4>
                                        <?php $userDetails = $shippingDetail->getUserDetails($shippingDetail->user_id); ?>
                                        <p>{{$userDetails->firstname}} {{$userDetails->lastname}},</p>
                                        <p>{{$userDetails->email}} ,{{$userDetails->phone}}</p>
                                    </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.row -->


        </div>
        <!-- /.card-body -->
    </div>@endsection
@section('scripts')

    <!-- SlimScroll -->
    <script src="../admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../admin/plugins/fastclick/fastclick.js"></script>


@endsection
