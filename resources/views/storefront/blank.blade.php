@extends('storefront.layouts.master')
@section('title')
  Shoprite Pickup | Category
@endsection
@section('headlinks')
<link rel="stylesheet" type="text/css" href="../storefront/css/multirange.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/product.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/slick.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/slick-theme.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/category.css">
<link rel="stylesheet" type="text/css" href="../storefront/css/owl.carousel.min.css">
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
  <li class="animate-default title-hover-red"><a href="#">Shopping Cart</a></li>
@endsection
@section('content')


@endsection

@section('scripts')
    <script src="../storefront/js/multirange.js" defer=""></script>
    <script src="../storefront/js/slick.min.js" defer=""></script>
    <script src="../storefront/js/owl.carousel.min.js" defer=""></script>

@endsection
