@extends('storefront.layouts.master')
@section('title')
    Shoprite Pickup | Reset your password
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
    <li class="animate-default title-hover-red"><a href="#">Reset your password</a></li>
@endsection
@section('content')
    <div class="container">
        <div class="row relative">
            <div class="full-width relative top-checkout-box overfollow-hidden top-margin-default">
                <div class="col-md-3 col-sm-1 col-xs-1"></div>
                <div class="col-md-6 col-sm-10 col-xs-10 clear-padding-left left-top-checkout">
                    <div class="full-width box-btn-top-click" id="authWrapper">
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
                        <h2 class="text-center authHeader">Reset your password</h2>
                        <div class="relative">
                            <form method="POST" action="{{url('/resetPassword')}}" class="form-placeholde-animate" id="resetPassword">
                                @csrf
                                <div class="field-wrap">
                                    <label>
                                        New Password<span class="req">*</span>
                                    </label>
                                    <input type="password" name="password" id="password" required autocomplete="off" />
                                </div>
                                <br>
                                <div class="field-wrap" style="margin-bottom: 38px">
                                    <label>
                                        Confirm New password<span class="req">*</span>
                                    </label>
                                    <input type="password" name="password_again" id="password_again" required autocomplete="off" />
                                </div>
                                <input type="hidden" name="email" value="{{$email}}">

                                <div class="relative justify-content form-login-checkout">
                                    <button type="submit" class="animate-default button-hover-red btn-block authBtn">Reset Password</button>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-3 col-sm-1 col-xs-1"></div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="../storefront/js/multirange.js" defer=""></script>
    <script src="../storefront/js/slick.min.js" defer=""></script>
    <script src="../storefront/js/owl.carousel.min.js" defer=""></script>
    <script src="../storefront/js/jquery.validate.min.js" defer=""></script>
    <script>
        $(document).ready(function () {
            $("#resetPassword").validate({
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
