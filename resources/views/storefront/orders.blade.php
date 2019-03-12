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

                                @if (session('verify'))
                                    <div class="alert alert-danger alert-dismissable">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                                        {{ session('verify')}} Didn't get the email? <a href="{{url('/resendEmail')}}">Resend</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <p class="title-shoping-cart">Your Orders</p>
                        @if(count($orders) == 0)
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>No Orders yet</h2>
                                </div>
                            </div>
                        @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Order Code</th>
                                            <th>Total Amount</th>
                                            <th>Date of Order</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                     @foreach($orders as $value)
                                         <tr>
                                             <td>{{$value->order_code}}</td>
                                             <td>₦{{$value->delivery_fee + $value->service_fee + $value->product_total}}</td>
                                             <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                             <td><a href="{{url('/order/'.$value->order_code)}}">View Order</a></td>
                                         </tr>
                                     @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="row  text-center">
                                <div class="pagging relative">
                                    {{$orders->links() }}
                                </div>
                            </div>
                        @endif
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

