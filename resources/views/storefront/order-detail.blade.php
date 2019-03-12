@extends('storefront.layouts.master')
@section('title')
    Shoprite Pickup | Your Orders
@endsection
@section('headlinks')
    <link rel="stylesheet" type="text/css" href="../storefront/css/multirange.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/slick.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/contact.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/cartpage.css">


@endsection
@section('header')
    <!-- push menu-->
    @include('storefront.layouts.partials.topnav')

    <!-- end push menu-->
    <!-- Menu Mobile -->
    @include('storefront.layouts.partials.mobilemenu')
    <!-- Header Box -->
    @include('storefront.layouts.partials.nav')
    @yield('product-menu')
    <!-- End Header Box -->
@endsection
@section('breads')
    <li class="animate-default title-hover-red"><a href="{{url('/dashboard')}}">Dashboard</a></li>
    <li class="animate-default title-hover-red"><a href="{{url('/orders')}}" style="text-transform: capitalize;">Your Orders</a></li>
    <li class="animate-default title-hover-red"><a href="{{url('/order/'.$shippingDetail->order_code)}}" style="text-transform: capitalize;">{{$shippingDetail->order_code}}</a></li>

@endsection
@section('content')
    <div class="relative container-web">
        <div class="container">
            <div class="row ">
                <!-- Sider Bar -->
            @include('storefront.layouts.partials.dashboard-sidebar')
            <!-- End Sider Bar Box -->
                <!-- Content Category -->
                <div class="col-md-9 relative clear-padding">
                    <div class="col-sm-12 col-xs-12 col-md-1 relative overfollow-hidden clear-padding button-show-sidebar clearfix">
                        <p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
                    </div>
                    <!-- Product Content Detail -->
                    <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">

                        <p class="title-shoping-cart">Order Details</p>
                       <div class="row">
                           <div class="col-md-4"><p><strong>Order code: </strong> {{$shippingDetail->order_code}}</p></div>
                           <div class="col-md-4"><p><strong>Payment Method: </strong> {{$shippingDetail->payment_method}}</p></div>
                           <div class="col-md-4"><p><strong>Date Ordered: </strong> {{date('d-m-Y', strtotime($shippingDetail->created_at))}}</p></div>
                       </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Sub total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($orders as $index => $value)
                                                <tr>
                                                    <td width="5%">{{$index + 1}}</td>
                                                    <td width="40%">
                                                        <?php $product = $value->getProductDetail($value->product_id);?>
                                                            <img src="{{$product->cover_image}}" alt="{{$product->title}}" class="order-img">
                                                            <br>
                                                        <a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}" target="_blank">{{$product->title}}</a>

                                                           <small style="display: block;">{{$value->variation_types}}</small>
                                                    </td>
                                                    <td width="15%">
                                                        @if($value->qty > 0)
                                                            {{$value->qty}}
                                                        @else
                                                            <p class="noPrice">Nil</p>
                                                                      @endif

                                                        </td>
                                                    <td width="20%">
                                                        @switch($value->shipping_status)
                                                            @case("pending")
                                                            <span class="label label-warning">Pending</span>
                                                            @break

                                                            @case("processing")
                                                            <span class="label label-info">Processing</span>
                                                            @break

                                                            @case("delivered")
                                                            <span class="label label-success">Delivered</span>
                                                            @break

                                                            @case("cancelled")
                                                            <span class="label label-danger">Cancelled</span>
                                                            @break

                                                        @endswitch

                                                    </td>
                                                    <td width="20%">₦{{$value->sub_total}}</td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                            <tfoot>
                                            <tr><th colspan="4"><h5>Delivery Fee</h5></th><th>₦{{$shippingDetail->delivery_fee}}</th></tr>
                                            <tr><th colspan="4"><h5>Service Fee</h5></th><th>₦{{$shippingDetail->service_fee}}</th></tr>
                                            <tr><th colspan="4"><h5>Total</h5></th><th>₦{{$shippingDetail->delivery_fee + $shippingDetail->service_fee + $shippingDetail->product_total }}</th></tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <h4>Shipping Details</h4>
                                    <p>{{$shippingDetail->billing_firstname}} {{$shippingDetail->billing_lastname}},</p>
                                    <p>{{$shippingDetail->billing_email}} ,{{$shippingDetail->billing_phone}}</p>
                                    <p>{{$shippingDetail->billing_address}}, {{$shippingDetail->billing_city}}, {{$shippingDetail->billing_state}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4>Estimated Delivery Date/Time</h4>
                                    <p>{{$shippingDetail->delivery_date}} </p>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{url('storefront/js/multirange.js')}}" defer=""></script>
    <script src="{{url('storefront/js/slick.min.js')}}" defer=""></script>
    <script src="{{url('storefront/js/owl.carousel.min.js')}}" defer=""></script>
    <script src="../storefront/js/jquery.validate.min.js" defer=""></script>


@endsection

