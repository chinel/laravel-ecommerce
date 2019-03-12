@extends('storefront.layouts.master')
@section('headlinks')
  <link rel="stylesheet" type="text/css" href="{{url('storefront/css/home.css')}}">

@endsection
@section('header')
  @include('storefront.layouts.partials.topnav')
  <!-- end push menu-->
  <!--  Header Box -->
  @include('storefront.layouts.partials.nav')
  @yield('page-menu')
@endsection
@section('sider')
<div class="clearfix container-web relative">
    <div class=" container relative">
        <div class="row">

            <div class="clearfix relative menu-slide clear-padding bottom-margin-default">
                <!-- Menu -->
                      @include('storefront.layouts.partials.categories')

                <!-- Slide -->
                      @include('storefront.layouts.partials.slider')
            </div>

            <!-- End Menu & Slide -->
        </div>
    </div>
</div>
@endsection
@section('content')
    <?php
    function comma_separated_to_array($string_value, $separator = ',')
    {
        //Explode on comma
        $vals     =   explode($separator, $string_value);
        $count    =   count($vals);
        $val      =   array();
        //Trim whitespace
        for($i=0;$i<=$count-1;$i++) {
            $val[]   .=   $vals[$i];
        }
        return $val;
    }
    ?>
      <!-- Content Product -->
      @include('storefront.layouts.partials.deals')
      <!-- End Content Product -->
      <!-- Product Box -->
      @include('storefront.layouts.partials.product-box')
      @yield('product-box-1')
      <!-- End Product Box -->
      <!-- Banner Full With -->
      <!-- End Banner Full With -->
      <!-- Product Box -->

      <!-- End Product Box -->
      <!-- Banner Full With -->
      @include('storefront.layouts.partials.banners')
      @yield('fullbanner1')
      <!-- End Banner Full With -->
      <!-- Product Box -->
      @yield('product-box-3')

      <!-- End Product Box -->
      <!-- Banner Half Website -->
      @yield('halfbanner')
      <!-- End Banner Half Website -->
      <!-- Product Category Percent 2 -->
      @yield('product-box-2')
      <!-- End Product Category Percent 2 -->
      <!-- Slide Logo Brand -->
      @include('storefront.layouts.partials.brandicons')
      <!-- End Slide Brand -->
      <!-- Banner Full With -->
      @include('storefront.layouts.partials.banners')
      @yield('fullbanner2')
      <!-- End Banner Full With -->
@endsection
@section('scripts')
<script src="{{url('storefront/js/owl.carousel.min.js')}}" defer=""></script>
<script src="{{url('storefront/js/sync_owl_carousel.js')}}" defer=""></script>
<script src="{{url('storefront/js/scripts.js')}}" defer=""></script>
@endsection
