@extends('storefront.layouts.master')
@section('title')
    Shoprite Pickup | Search Result
@endsection
@section('headlinks')
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/multirange.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/category.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/owl.carousel.min.css')}}">
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
    <li class="animate-default title-hover-red"><a>Search Result</a></li>
@endsection
@section('content')


    <!-- End Breadcrumb -->
    <!-- Content Category -->
    <div class="relative container-web">
        <div class="container">
            <div class="row">
                <div class="col-md-12 relative clear-padding">
                    <div class="col-sm-12 col-xs-12 relative overfollow-hidden clear-padding button-show-sidebar">
                        <p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
                    </div>

                </div>
            </div>
            <form action="" id="customProducts">

                <div class="row ">
                    <input type="hidden" name="filterIn" @if(isset($_GET['filterIn']))value="<?php echo htmlspecialchars($_GET['filterIn']);?>" @endif>
                    <input type="hidden" name="term" @if(isset($_GET['term']))value="<?php echo htmlspecialchars($_GET['term']);?>"@endif>
                    <!-- Sider Bar -->

                <!-- End Sider Bar Box -->
                    <!-- Content Category -->
                    <div class="col-md-12 relative clear-padding">
                        <!-- Product Content Category -->
                        <div class="row">
                            <div class="bar-category bottom-margin-default border no-border-r no-border-l no-border-t">
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-4">
                                        <p class="clear-margin" style="text-transform: capitalize;">{{$products->total()}} <?php echo ($products->total() == 1) ? "record" : "records"; ?> found for {{$term}}</p>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-8 right-category-bar float-right relative">

                                        <label for="" id="filterLabel">Sort By: </label>
                                        <select name="sortBy" id="filter">
                                            <option value="newest">Newest</option>
                                            <option value="cheapest_prices">Cheapest Prices</option>
                                            <option value="highest_prices">Highest Prices</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @if(count($products) == 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>No Products found</h2>
                                    </div>
                                </div>
                            @else
                                @foreach($products as $value)
                                    <div class="col-md-3 col-sm-3 col-xs-12 product-category relative effect-hover-boxshadow animate-default">
                                        <div class="image-product relative overfollow-hidden">
                                            <div class="center-vertical-image">
                                                <img src="{{asset($value->cover_image)}}" alt="{{$value->title}}" style="width: 270px; height: 270px;">
                                            </div>
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}"></a>
                                            <ul class="option-product animate-default">
                                                <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3 class="title-product clearfix full-width title-hover-black">
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}">

                                                @if(strlen($value->title) > 28)
                                                    {{substr($value->title,0,28)}} ..
                                                @else
                                                    {{$value->title}}
                                                @endif
                                            </a>
                                        </h3>
                                        @if($value->price > 0)
                                            <p class="clearfix price-product"> ₦{{number_format($value->price)}}</p>
                                        @else
                                            <p class="clearfix price-product"> Flexible price</p>
                                        @endif
                                        <?php $averageRating = $value->getAverageRatingOfPdt($value->id); ?>
                                        @switch($averageRating)
                                            @case(1)
                                            <div class="clearfix  ranking-color">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </div>
                                            @break
                                            @case(2)
                                            <div class="clearfix  ranking-color">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </div>
                                            @break
                                            @case(3)
                                            <div class="clearfix  ranking-color">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </div>
                                            @break
                                            @case(4)
                                            <div class="clearfix  ranking-color">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </div>
                                            @break
                                            @case(5)
                                            <div class="clearfix  ranking-color">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            @break
                                            @default

                                            <div class="clearfix  ranking-color">
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </div>
                                            @break
                                        @endswitch
                                    </div>

                                @endforeach

                            @endif

                        </div>
                        <div class="row  text-center">
                            <div class="pagging relative">

                                {{$products->appends(request()->input())->links() }}
                            </div>
                        </div>
                        <!-- End Product Content Category -->
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- End Sider Bar -->
    </div>

@endsection

@section('scripts')
    <script src="{{url('storefront/js/multirange.js')}}" defer=""></script>
    <script src="{{url('storefront/js/slick.min.js')}}" defer=""></script>
    <script src="{{url('storefront/js/owl.carousel.min.js')}}" defer=""></script>

@endsection
