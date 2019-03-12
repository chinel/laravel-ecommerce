<div class="col-md-5 relative col-sm-12 col-xs-12">
    <div id="owl-big-slide" class="relative sync-owl-big-image">
        <div class="item center-vertical-image">
            <img src="{{$productDetails->cover_image}}" alt="{{$productDetails->title}}" title="{{$productDetails->title}}" style="width: 400px; height: 400px;">
        </div>


    </div>

</div>
<!-- Info Top Product -->
<div class="col-md-7 col-sm-12 col-xs-12">
    <form  action="{{url('addToCart')}}" method="post" class="cartForm2" >
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
