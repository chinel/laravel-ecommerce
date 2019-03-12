@extends('storefront.layouts.master')
@section('title')
  Shoprite Pickup | Cart
@endsection
@section('headlinks')
<link rel="stylesheet" type="text/css" href="{{url('storefront/css/multirange.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('storefront/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('storefront/css/slick-theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('storefront/css/cartpage.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('storefront/css/sweetalert.css')}}">
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
  <li class="animate-default title-hover-red"><a href="#">Shopping Cart</a></li>
@endsection
@section('content')

<div class="relative container-web">
  <div class="container">
      @if (session('success'))
          <div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
              {{ session('success')}}
          </div>
      @endif

    <div class="row relative">
      <!-- Content Shoping Cart -->
        <?php $total = 0; ?>
        @if(session('cart'))
            @foreach(session('cart') as $value1)
                <?php $total += count($value1);?>
            @endforeach

        @endif
        @if(session('cart') && $total > 0)
      <div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
        <p class="title-shoping-cart">Shopping Cart</p>
         <div class="row">
             <div class="col-md-9 col-sm-8 col-xs-6">
                 <p>Item</p>
             </div>
             <div class="col-md-1 col-sm-2 col-xs-3">
                 <p id="qty">Qty</p>
             </div>
             <div class="col-md-2 col-sm-2 col-xs-3">
                 <p class="text-right">Subtotal</p>
             </div>
         </div>
         <?php $total = 0;
               $currentDelivery = 0;

               ?>
        @foreach(session('cart') as $value1)
              @foreach($value1 as $key1 => $value)
          <?php $total += ((int)$value['quantity'] > 0) ? ((int)$value['quantity'] * (int)$value['price']) : (int)$value['price']; ?>

                  <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden">
                      <div class="relative product-in-cart-col-1 center-vertical-image">
                          <img src="{{$value['photo']}}" alt="">
                      </div>
                      <div class="relative product-in-cart-col-2">
                          <p class="title-hover-black">
                              <a href="{{url('/product/'.str_replace('.', '_', urlencode($value['name'])))}}" class="animate-default">{{$value['name']}}</a>
                              <small style="display: block;">

                                  @foreach($value['attributes'] as  $key => $value2)
                                   @foreach($value2 as $value3)
                                        <strong>{{key($value2)}}:</strong>  {{$value3}} &nbsp;
                                      @endforeach

                                  @endforeach
                                  </small>
                          </p>
                      </div>
                      <div class="relative product-in-cart-col-3">
                          @if($value['quantity'] > 0)
                             <form>
                                 <input type="hidden" name="productId" value="{{$value['id']}}">
                                 <input type="hidden" name="indexId" value="{{$key1}}">
                              <input type="number" size="1"  class="price form-control" min="1" value="{{$value['quantity']}}" style="margin-top: 49px;">
                             </form>

                            @else
                              <p class="noPrice">Nil</p>
                           @endif
                      </div>
                      <div class="relative product-in-cart-col-3">
                          <a href="{{url('deleteCart/'. $value['id']. "?index=". $key1)}}"><span class="ti-close relative remove-product"></span></a>
                          @if($value['quantity'] > 0)
                          <p class="text-red price-shoping-cart">₦{{((int)$value['quantity'] * (int)$value['price'])}}</p>
                              <small>(unit price - ₦{{$value['price']}})</small>
                           @else
                              <p class="text-red price-shoping-cart">₦{{$value['price']}}</p>
                          @endif
                      </div>
                  </div>
        @endforeach
          @endforeach



            <div class="row cartFooter">
                <div class="col-md-6 ccol-sm-6 col-xs-6">
                    <a href="{{url('/')}}" class="clear-margin animate-default btn-block">Continue Shopping</a>
                </div>
                <div class="col-md-6 ccol-sm-6 col-xs-6">
                    <form action="{{url('/checkout')}}" method="post">
                        @csrf
                        <input type="hidden" name="deliveryId" class="deliveryId">
                        <button type="submit" class="clear-margin animate-default btn-block">Proceed to Checkout</button>
                    </form>
                </div>
            </div>




      </div>
      <!-- End Content Shoping Cart -->
      <!-- Content Right -->
      <div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">

        <p class="title-shoping-cart">Cart Total</p>
        <div class="full-width relative cart-total bg-gray  clearfix">
          <div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
            <p>Subtotal</p>
            <p class="text-red price-shoping-cart">₦<span id="subTotal">{{$total}}</span></p>
          </div>
            <div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
                <p>Service Fee</p>
                <?php $serviceFee = $total > 50000 ? ($serviceFee->higherSubtotal/100) * $total : ($serviceFee->lowerSubtotal/100) * $total; ?>
                <p class="text-red price-shoping-cart">₦<span id="serviceFee">{{$serviceFee}}</span></p>
            </div>
          <div class="relative border top-margin-15-default bottom-padding-15-default no-border-t no-border-r no-border-l">
            <p class="bottom-margin-15-default">Shipping</p>
            <div class="relative justify-content">
              <ul class="check-box-custom title-check-box-black clear-margin clear-margin" style="width: 100%">
                @foreach($deliveryTypes as $index => $deliveryType)
                  <li>
                  <label>
                    <input type="radio" class="delivery" name="shipping" value="{{$deliveryType->id}}" <?php if($index == 0){ $currentDelivery = $deliveryType->fee; echo "checked";}?>>
                      {{$deliveryType->title}} - <small>{{$deliveryType->duration}} <?php echo (int)$deliveryType->duration > 1 ? $deliveryType->type."s": $deliveryType->type ;?></small>
                    </label>
                      <span class="deliveryFee price-gray-sidebar float-right">₦{{$deliveryType->fee}}</span>
                </li>
                @endforeach

              </ul>

            </div>
          </div>
          <div class="relative justify-content top-margin-15-default">
            <p class="bold">Total</p>
            <p class="text-red price-shoping-cart">₦<span id="total">{{$currentDelivery + $total + $serviceFee}}</span></p>
          </div>
        </div>
          <form action="{{url('/checkout')}}" method="post">
              @csrf
              <input type="hidden" name="deliveryId" class="deliveryId">
              <button class="btn-proceed-checkout button-hover-red full-width top-margin-15-default">Proceed to Checkout</button>
          </form>
      </div>
      <!-- End Content Right -->

        @else
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center">Your Shopping Cart is empty</h2>
                <div>
                    <img src="{{url('storefront/img/Cart-empty.gif')}}" class="img-responsive" alt="Empty Cart">
                </div>
                <div class="row cartFooter alterMargin">
                    <div class="col-md-12">
                        <a href="{{url('/')}}" class="clear-margin animate-default btn-block">Continue Shopping</a>
                    </div>
                </div>

            </div>

            <div class="col-md-3"></div>

        @endif
    </div>
  </div>
</div>

@endsection

@section('scripts')
    <script src="{{url('storefront/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('storefront/js/multirange.js')}}" ></script>
    <script src="{{url('storefront/js/slick.min.js')}}"></script>
    <script src="{{url('storefront/js/sweetalert.js')}}"></script>
    <script src="{{url('storefront/js/owl.carousel.min.js')}}" ></script>
    <?php
    if (session('successOrder')){?>
    <script>
        $(document).ready(function () {
            // $('#myModal').modal('show');
            swal({
                title: "Message",
                text: '<p class="alert alert-success"> <?php echo session('successOrder');?> .</p>',
                type: "success",
                html: true,
                showCancelButton: true,
                cancelButtonText: "Close!",
                closeOnConfirm: false,
                showConfirmButton:false
            });
        });
    </script>

    <?php } ?>

    <script type="text/javascript">


        (function ($) {
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            $(document).ready(function () {

                $('input.price').on('change keyup paste',function(e){
                   $this = $(this);
                    var currentVal = parseInt($this.val());
                    console.log(currentVal);
                   if(!isNaN(currentVal) || currentVal == 0){
                       $productId = $this.closest('form').find('input[name="productId"]').val();
                       $indexId = $this.closest('form').find('input[name="indexId"]').val();
                       url = '/updateCart';

                       // Send the data using post
                       var posting = $.post( url, {'productId': $productId,'quantity': currentVal, 'indexId' : $indexId} );
                       posting.done(function( data ) {

                           $result = JSON.parse(data);
                           console.log(data);
                           if($result['status'] == "ok") {
                                location.reload();
                           }else{
                               alert('Oops an error occurred');
                           }

                       });
                   }
                   else{
                       $productId = $this.closest('form').find('input[name="productId"]').val();
                       $indexId = $this.closest('form').find('input[name="indexId"]').val();
                       url = '/deleteFromCart';

                       // Send the data using post
                       var posting = $.post( url, {'productId': $productId, 'indexId' : $indexId} );
                       posting.done(function( data ) {

                           $result = JSON.parse(data);
                           if($result['status'] == "ok") {
                               location.reload();
                           }else{
                               alert('Oops an error occurred');
                           }

                       });
                   }
                });


              $('.delivery').change(function(){
                  $this = $(this);
                 $deliveryValue = parseInt($this.val());
                 $subTotal = parseInt($('#subTotal').text());
                 $serviceFee =  parseInt($('#serviceFee').text());
                  $("input[class='deliveryId']").val($deliveryValue);
                 $('#total').text($deliveryValue + $subTotal + $serviceFee);
              });


              $("input[class='deliveryId']").val($("input[class='delivery']").first().val());


            });

        })(jQuery);
    </script>

@endsection
