@extends('storefront.layouts.master')
@section('title')
  Shoprite Pickup | Product
@endsection
@section('headlinks')

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

          <li class="animate-default title-hover-red"><a href="{{url('/category/'.$productDetails->getCategorySlug($productDetails->category_id))}}">{{$productDetails->getCategory($productDetails->category_id)}}</a></li>
          <li class="animate-default title-hover-red"><a href="{{url('/product/'.$productDetails->title)}}">{{$productDetails->title}}</a></li>

@endsection
@section('content')

<!-- End Breadcrumb -->
<!-- Content Category -->
<div class="relative container-web">
  <div class="container">
    <div class="row ">
        <div class="col-md-3 relative right-padding-default clear-padding" id="slide-bar-category">
            <div class="col-md-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
                <p class="title-siderbar bold">CATEGORIES</p>
                @if(!empty($categories))
                <ul class="clear-margin list-siderbar">
                    @foreach($categories as $category)
                        <li><a href="{{url('/category/'.$category->slug)}}">{{$category->title}}</a></li>
                        @endforeach
                </ul>
                    @endif
            </div>
          @if(!empty($sideBanners))
            <div class="bottom-margin-default banner-siderbar col-md-12 col-sm-12 col-xs-12 clear-padding clearfix">
                <div class="overfollow-hidden banners-effect5 relative">
                    <img src="{{$sideBanners->banner1}}" />
                    <a href="{{$sideBanners->banner1Url}}"></a>
                </div>
            </div>

            <div class="bottom-margin-default banner-siderbar col-md-12 col-sm-12 col-xs-12 clear-padding clearfix">
                <div class="overfollow-hidden banners-effect5 relative">
                    <img src="{{$sideBanners->banner2}}"  />
                    <a href="{{$sideBanners->banner2Url}}"></a>
                </div>
            </div>

            <div class="bottom-margin-default banner-siderbar col-md-12 col-sm-12 col-xs-12 clear-padding clearfix">
                <div class="overfollow-hidden banners-effect5 relative">
                    <img src="{{$sideBanners->banner3}}"  />
                    <a href="{{$sideBanners->banner3Url}}"></a>
                </div>
            </div>

              @endif
        </div>
      <!-- Content Category -->
      <div class="col-md-9 relative clear-padding">
        <div class="col-sm-12 col-xs-12 col-md-1 relative overfollow-hidden clear-padding button-show-sidebar clearfix">
          <p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
        </div>
        <!-- Product Content Detail -->
        <div class="top-product-detail relative ">
          <div class="row">
            <!-- Slide Product Detail -->
            <div class="col-md-7 relative col-sm-12 col-xs-12">
              <div id="owl-big-slide" class="relative sync-owl-big-image">
                <div class="item center-vertical-image">
                  <img src="{{$productDetails->cover_image}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 400px; height: 400px;">
                </div>
                 @if($productDetails->other_image1 != null)
                <div class="item center-vertical-image">
                  <img src="{{$productDetails->other_image1}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 400px; height: 400px;">
                </div>
                 @endif

                  @if($productDetails->other_image2 != null)
                      <div class="item center-vertical-image">
                          <img src="{{$productDetails->other_image2}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 400px; height: 400px;">
                      </div>
                  @endif

                  @if($productDetails->other_image3 != null)
                      <div class="item center-vertical-image">
                          <img src="{{$productDetails->other_image3}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 400px; height: 400px;">
                      </div>
                  @endif

              </div>
              <div class="relative thumbnail-slide-detail">
                <div id="owl-thumbnail-slide" class="sync-owl-thumbnail-image" data-items="3,4,3,2">
                  <div class="item center-vertical-image">
                      <img src="{{$productDetails->cover_image}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 190px; height: 190px;">
                  </div>
                    @if($productDetails->other_image1 != null)
                  <div class="item center-vertical-image">
                      <img src="{{$productDetails->other_image1}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 190px; height: 190px;">
                  </div>
                   @endif

                    @if($productDetails->other_image2 != null)
                        <div class="item center-vertical-image">
                            <img src="{{$productDetails->other_image2}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 190px; height: 190px;">
                        </div>
                    @endif

                    @if($productDetails->other_image3 != null)
                        <div class="item center-vertical-image">
                            <img src="{{$productDetails->other_image3}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 190px; height: 190px;">
                        </div>
                    @endif

                </div>
                <div class="relative nav-prev-detail btn-slide-detail"></div>
                <div class="relative nav-next-detail btn-slide-detail"></div>
              </div>
            </div>
            <!-- Info Top Product -->
            <div class="col-md-5 col-sm-12 col-xs-12">
                <form  action="{{url('addToCart')}}" method="post" id="cartForm1" >
                    <input type="hidden" name="productId" value="{{$productDetails->id}}">
                    <input type="hidden" name="productName" value="{{$productDetails->title}}">
                    <input type="hidden" name="productPhoto" value="{{$productDetails->cover_image}}">
                    @if($productDetails->price_type == "fixed")
                        <input type="hidden" name="productPrice" value="{{$productDetails->price}}">
                    @endif
              <div class="name-ranking-product relative bottom-padding-15-default bottom-margin-15-default border no-border-r no-border-t no-border-l">
                <h1 class="name-product">{{$productDetails->title}}</h1>
                  <?php $averageRating = $productDetails->getAverageRatingOfPdt($productDetails->id); ?>
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
                  @if($productDetails->price > 0)
                      <p class="clearfix price-product"> ₦{{$productDetails->price}}</p>
                  @else
                      <p class="clearfix price-product"> Flexible price</p>
                  @endif

              </div>
              <div class="relative intro-product-detail bottom-margin-15-default bottom-padding-15-default border no-border-r no-border-t no-border-l">
                <p class="clear-margin">{!!html_entity_decode($productDetails->overview)!!}</p>
              </div>
              <div class="relative option-product-detail bottom-padding-15-default border no-border-r no-border-t no-border-l">

                <p class="bold clear-margin bottom-margin-15-default">Available Options:</p>
                  <?php $productVariations = $productDetails->getProductVariations($productDetails->id);?>
                  @if(count($productVariations) > 0)
                    @foreach($productVariations as $value)
                     @if((strcasecmp($value->type,"color") == 0) || (strcasecmp($value->type,"colour") == 0))
                          <div class="relative option-product-1 bottom-margin-15-default">
                              <p class="float-left">Color:</p>
                              <ul class="check-box-custom list-color clearfix clear-margin">
                                  <?php $colors = explode(',', $value->subtypes);?>
                                  @foreach($colors as $key => $color)
                                          <li>
                                              <input type="radio" name="subtypes[]" value="{{$value->type}}_{{$color}}"  class="form-radio required" title="color" style="background: {{$color}};  opacity: 1;" @if($key == 0) required @endif >

                                          </li>
                                  @endforeach

                              </ul>
                          </div>

                    @else
                  <div class="relative option-product-2 clearfix" style="display: block;">
                      <div class="option-product-son">
                          <p class="float-left">{{$value->type}}:</p>
                          <select class="" name="subtypes[]" required>
                              <option value="">-- Select --</option>
                              <?php $otherSubtypes = explode(',', $value->subtypes);?>
                              @foreach($otherSubtypes as $otherSubtype)
                              <option value="{{$value->type}}_{{$otherSubtype}}">{{$otherSubtype}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                          @endif
                   @endforeach
                          @endif
                  @if($productDetails->price_type == "fixed")
                  <div class="relative option-product-2 clearfix" style="display: block;">
                  <div class="option-product-son  right-margin-default">
                    <p class="float-left">Qty:</p>
                    <input type="number" class="left-margin-15-default" min="01" step="1" max="10" value="1" name="qty" required>
                  </div>
                </div>
                  @endif
                  @if($productDetails->price_type == "flexible")
                      <div class="relative option-product-2 clearfix" style="display: block;">
                          <div class="option-product-son  right-margin-default">
                              <p class="float-left">Amount:</p>
                              <input type="number" class="left-margin-15-default" min="0"  name="productPrice" required>
                          </div>
                      </div>
                      <input type="hidden" name="qty" value="0">
                  @endif


              </div>
              <div class="relative button-product-list clearfix full-width clear-margin">
                <ul class="clear-margin top-margin-default clearfix bottom-margin-default">
                  <li class="button-hover-red"><button type="submit" class="addToCart" id="addCartBtn">Add to Cart</button></li>
                </ul>
                <div class="btn-print clearfix">
{{--
                  <a href="javascript:;" class="right-margin-default animate-default title-hover-black" onclick="printWebsite()"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
--}}
{{--
                  <a href="mailto:" class=" animate-default title-hover-black"><i class="fa fa-envelope" aria-hidden="true"></i> Send to a Friend</a>
--}}
                </div>
              </div>


                    <div id="cartLoader" style="display: none;"></div>

                </form>
            </div>
          </div>
        </div>
        <div class="info-product-detail bottom-margin-default relative">
          <div class="row">
            <div class="col-md-12 relative overfollow-hidden">
              <ul class="title-tabs clearfix relative">
                <li onclick="changeTabsProductDetail(1)" class="title-tabs-product-detail title-tabs-1 border no-border-b active-title-tabs bold uppercase">Product Details</li>
                <li onclick="changeTabsProductDetail(2)" class="title-tabs-product-detail title-tabs-2 border no-border-b bold uppercase">Reviews</li>
              </ul>
              <div class="content-tabs-product-detail relative content-tab-1 border active-tabs-product-detail bottom-padding-default top-padding-default left-padding-default right-padding-default">
                  {!!html_entity_decode($productDetails->description)!!}
              </div>
              <div class="content-tabs-product-detail relative content-tab-2 border bottom-padding-default top-padding-default left-padding-default right-padding-default">
                  <div class="container">

                        <!--- Review Holder -->
                      <div id="reviewHead">
                          @include('storefront.layouts.partials.ReviewWrapper')
                      </div>

                      <div id="reviewWrapper">
                       @include('storefront.layouts.partials.productReview')
                      </div>

                  </div> <!-- /container -->

              </div>
            </div>
          </div>
        </div>
        @include('storefront.layouts.partials.relatedproduct')

        <!-- End Product Content Category -->
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

    <script src="{{url('storefront/js/jquery.validate.min.js')}}" defer=""></script>

    <script type="text/javascript">
        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });

        $(document).ready(function()
        {
            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];

                getData(page);
            });

        });

        function getData(page){
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html"
                }).done(function(data){
                $("#reviewWrapper").empty().html(data);
                location.hash = page;
            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert('No response from server');
            });
        }
    </script>
    <script>
        (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

        var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

        $(function(){

            $('#new-review').autosize({append: "\n"});

            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function(e)
            {
                $.get( "/checkIfUserIsLoggedIn")
                    .done(function( data ) {

                        console.log(data);
                        if(data.status == "success"){
                            reviewBox.slideDown(400, function()
                            {
                                $('#new-review').trigger('autosize.resize');
                                newReview.focus();
                            });
                            openReviewBtn.fadeOut(100);
                            closeReviewBtn.show();
                        }else{
                            window.location = '/login';
                        }

                    });

            });

            closeReviewBtn.click(function(e)
            {
                e.preventDefault();
                reviewBox.slideUp(300, function()
                {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });

            $('.starrr').on('starrr:change', function(e, value){
                ratingsField.val(value);
            });
        });


    </script>
    <script type="application/javascript">

        (function ($) {
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            $(document).ready(function () {

                $('form#cartForm1').submit(function(e){
                    e.preventDefault();

                    var $form = $(this),
                        formData = $form.serialize();

                    url = $form.attr("action");

                    // Send the data using post
                    var posting = $.post( url, formData );

                    $('#cartLoader').show(1000);
                    $('#addCartBtn').prop('disabled', true).css("background-color", "#ccc").text('Please wait');

                    // Put the results in a div
                    posting.done(function( data ) {
                        console.log(data);
                        $('#cartLoader').hide(1000);
                        setTimeout(function(){
                            $('#addCartBtn').prop('disabled', false).css("background-color", "#e3171b").text('Add to Cart');
                            }, 1000);
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

                $("#writeReview").validate(
                    {
                        submitHandler: function (form, event) {
                            var $form = $('#writeReview'),
                                formData = $form.serialize();

                            var reviewUrl = $('a#reviewUrl').attr('href');

                            url = $form.attr("action");

                            // Send the data using post
                            var posting = $.post( url, formData );

                            $('#imgLoader').show(1000);
                            $('#submitReview').prop('disabled', true).css("background-color", "#ccc").text('Please wait');

                            // Put the results in a div
                            posting.done(function( data ) {

                                console.log(data);

                                $('#imgLoader').hide(1000);
                                setTimeout(function(){
                                    $('#submitReview').prop('disabled', false).css("background-color", "#4fa84f").text('Save');
                                }, 1000);

                                //console.log(data);
                                //$result = JSON.parse(data);
                                console.log(data.amessage);
                                if(data.status == "ok") {

                                    $('#messageWrapper').html('<div class="alert alert-success alert-dismissible">\n' +
                                        '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                                        data.message + '\n' +
                                        '</div>');
                                    setTimeout(function () {
                                       $('#messageWrapper').html("");
                                        $("#writeReview").trigger("reset");
                                        $('#post-review-box').slideUp(300, function()
                                        {
                                            $('#new-review').focus();
                                            $('#open-review-box').fadeIn(200);
                                        });
                                        $('#close-review-box').hide();
                                    },2000);
                                    //console.log($result['totalCart']);

                                    $.ajax(
                                        {
                                            url: reviewUrl,
                                            type: "get",
                                            datatype: "html"
                                        }).done(function(data) {
                                        $("#reviewHead").empty().html(data);

                                    });
                                }else{
                                    $('#messageWrapper').html('<div class="alert alert-danger alert-dismissible">\n' +
                                        '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' + data.message + '\n' +
                                        '</div>');
                                }

                            });
                        }
                    }
            );
            })

        })(jQuery);
    </script>
@endsection
