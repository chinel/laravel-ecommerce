@extends('storefront.layouts.master')
@section('title')
    Shoprite Pickup | Your Dashboard
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
    <li class="animate-default title-hover-red"><a href="{{url('/dashboard')}}" style="text-transform: capitalize;">Profile</a></li>
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
                        <p class="title-shoping-cart">Profile Details</p>
                        <form action="{{url('/updateProfile')}}" class="form-contact" method="post">
                            @csrf
                            <div class="relative clearfix full-width">
                                <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                    <label>First Name *</label>
                                    <input class="full-width" type="text" name="firstname" required value="{{Auth::user()->firstname}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
                                    <label>Last Name *</label>
                                    <input class="full-width" type="text" name="lastname" required value="{{Auth::user()->lastname}}">
                                </div>
                            </div>
                            <div class="relative clearfix full-width">
                                <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                    <label>Email Address </label>
                                    <input class="full-width" type="text" readonly value="{{Auth::user()->email}}">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
                                    <label>Phone *</label>
                                    <input class="full-width" type="text" name="phone" required value="{{Auth::user()->phone}}">
                                </div>
                            </div>

                            <div class="row pushDown">
                                <div class="col-md-12">
                                    <button type="submit" class="pull-right uppercase animate-default button-hover-red">Update</button>
                                </div>
                            </div>
                        </form>


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

@endsection

