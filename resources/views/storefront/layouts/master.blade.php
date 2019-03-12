<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:100,300,400,500,700,900%7CRoboto+Condensed:100,300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../storefront/css/icon-font-linea.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/style.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/effect.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../storefront/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/multirange.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/category.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('storefront/css/owl.carousel.min.css')}}">
    @yield('headlinks')
</head>

<body>
  <div class="wrappage">

        <!-- push menu-->
        @yield('header')
        <!-- End Header Box -->
        <!-- Content Box -->
        <div class="relative clearfix full-width">


            <!-- Menu & Slide -->
            @if (!(Request::is('/')))

          <div class="container-web relative">
              <div class="container">

                <div class="row">
                  <div class="breadcrumb-web">
                    <ul class="clear-margin">
                      <li class="animate-default title-hover-red"><a href="/">Home</a></li>
                                  @yield('breads')
                    </ul>
                  </div>
                </div>

              </div>
            </div>
            @endif

  @yield('sider')

                @yield('content')





                <!-- QuickView -->
<div class="modal fade bs-example-modal-lg" id="quickview" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content clearfix">
                      <div class="modal-body clearfix" >
                        <div class=" relative clearfix">
                          <button type="button" class="close-modal animate-default" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="ti-close"></span>
                          </button>
                          <!---modal content here -->
                            <div class="row" id="cartWrap" style="margin-top: 20px;">

                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            <div class="modal modal-sm fade" id="successCart" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Success</h4>
                        </div>
                        <div class="modal-body">
                            <p>Item Successfully added to cart</p>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" data-dismiss="modal" class="btn btn-default btn-block">Continue Shopping</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{url('/cart')}}" class="btn btn-danger btn-block">View Cart</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

      <!-- End Content Modal -->
        </div>
        <!-- End Content Box -->
        @include('storefront.layouts.partials.support')
  </div>
 {{-- <div class="loading">
      <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i><br/>
      <span>Please Wait</span>
  </div>--}}
  @include('storefront.layouts.partials.footer')

  <!-- End Footer Box -->
  <script src="{{url('storefront/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{url('storefront/js/bootstrap.min.js')}}" defer=""></script>
  <script src="{{url('storefront/js/jquery.formvalidate.js')}}" defer=""></script>
  <script src="{{url('storefront/js/typeahead.js')}}" defer=""></script>
  <script src="{{url('storefront/js/multirange.js')}}" defer=""></script>
  <script src="{{url('storefront/js/slick.min.js')}}" defer=""></script>
  <script src="{{url('storefront/js/owl.carousel.min.js')}}" defer=""></script>
  <script type="application/javascript">
       $(document).ready(function () {
           $('input.search').typeahead({
               source:  function (query, process) {
                   return $.get('/search/products', { term: query }, function (data) {
                       return process(data);
                   });
               }
           });
       });
  </script>
  <script>
      (function ($) {
          $.ajaxSetup({
              headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
          });
      $(document).ready(function() {




          $(document).on('click', 'a.cartIcon',function(event)
          {
              event.preventDefault();

              var pdturl = $(this).attr('href');
              $.ajax(
                  {
                      url: pdturl,
                      type: "get",
                      datatype: "html"
                  }).done(function(data){
                  $("#cartWrap").empty().html(data);
                  $('#quickview').modal('show');

              }).fail(function(jqXHR, ajaxOptions, thrownError){
                  alert('No response from server');
              });

          });



      });
      })(jQuery);
      $('#cartWrap').on("submit", "form.cartForm2", function(e){
          e.preventDefault();

          var $form = $(this),
              formData = $form.serialize();

          url = $form.attr("action");

          // Send the data using post
          var posting = $.post( url, formData );


          $('#addCartBtn').prop('disabled', true).css("background-color", "#ccc").text('Please wait');

          // Put the results in a div
          posting.done(function( data ) {
              console.log(data);

              setTimeout(function(){
                  $('#addCartBtn').prop('disabled', false).css("background-color", "#e3171b").text('Add to Cart');
              }, 1000);

              $('#quickview').modal('hide');
              $('#successCart').modal('show');
              $result = JSON.parse(data);
              if($result['status'] == "ok") {
                  $('#TotalCart').css({"background": "#ff0000"}).html($result['totalCart']);
                  //console.log($result['totalCart']);
              }else{
                  alert('Oops an error occurred');
              }

          });
      });
  </script>
  @yield('scripts')
  <script src="../storefront/js/scripts.js" defer=""></script>
  <script>
      $(function(){
          $('.checkBrands').on('change',function(){
              setTimeout(function (){$('#customProducts').submit()}, 2000);
          });
      });

      $('#filter').change(function () {
          setTimeout(function (){$('#customProducts').submit()}, 1000);
      });
  </script>

  </body>

  </html>
