@if(!empty($section1))
<div class="clearfix box-product full-width top-padding-default bg-gray">
    <div class="clearfix container-web">
        <div class=" container">
            <div class="row">
                <!-- Title Product -->
                <div class="clearfix title-box full-width bottom-margin-default border bg-white">
                    <div class="clearfix name-title-box title-hot-bg relative">
                        <p> {{$section1->title}} </p>
                    </div>
                    <div class="clearfix menu-title-box bold uppercase">
                        <ul>
                            <li><a onclick="showBoxCateHomeByID('#{{$section1->getCategorySlug($section1->category1)}}','.good-deal-product')" href="javascript:;">{{$section1->getCategoryTitle($section1->category1)}}</a></li>
                            <li><a onclick="showBoxCateHomeByID('#{{$section1->getCategorySlug($section1->category2)}}','.good-deal-product')" href="javascript:;">{{$section1->getCategoryTitle($section1->category2)}}</a></li>
                            <li><a onclick="showBoxCateHomeByID('#{{$section1->getCategorySlug($section1->category3)}}','.good-deal-product')" href="javascript:;">{{$section1->getCategoryTitle($section1->category3)}}</a></li>
                            <li><a onclick="showBoxCateHomeByID('#{{$section1->getCategorySlug($section1->category4)}}','.good-deal-product')" href="javascript:;">{{$section1->getCategoryTitle($section1->category4)}}</a></li>
                            <li><a onclick="showBoxCateHomeByID('#{{$section1->getCategorySlug($section1->category5)}}','.good-deal-product')" href="javascript:;">{{$section1->getCategoryTitle($section1->category5)}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix content-product-box bottom-margin-default full-width">
                <div class="row">
                    <div class="relative">
                        <div class="good-deal-product animate-default active-box-category hidden-content-box" id="{{$section1->getCategorySlug($section1->category1)}}">
                            <!-- Product Son -->
                            <div class="owl-carousel owl-theme">
                                <?php $productList1 = comma_separated_to_array($section1->productlist1); ?>
                                <?php $products1 = $section1->getProductDetails($productList1);?>
                               @foreach($products1 as $value1)
                                        <div class=" product-son ">
                                            <div class="clearfix image-product relative animate-default">
                                                <div class="center-vertical-image">
                                                    <img src="{{$value1->cover_image}}" alt="{{$value1->title}}" style="width: 270px; height: 270px;" />
                                                </div>
                                                <ul class="option-product animate-default">
                                                    <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value1->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                    <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                            <?php $averageRating = $value1->getAverageRatingOfPdt($value1->id); ?>
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
                                            <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                    @if(strlen($value1->title) > 28)
                                                            {{substr($value1->title,0,28)}} ..
                                                    @else
                                                        {{$value1->title}}
                                                    @endif</a></p>
                                            <p class="clearfix price-product">
                                            @if($value1->price > 0)
                                                <p class="clearfix price-product"> ₦{{number_format($value1->price)}}</p>
                                            @else
                                                <p class="clearfix price-product"> Flexible price</p>
                                                @endif
                                            </p>
                                        </div>
                               @endforeach

                            </div>
                        </div>
                        <div class="good-deal-product animate-default hidden-content-box" id="{{$section1->getCategorySlug($section1->category2)}}">
                            <!-- Product Son -->
                            <div class="owl-carousel owl-theme">
                                <?php $productList2 = comma_separated_to_array($section1->productlist2); ?>
                                <?php $products2 = $section1->getProductDetails($productList2);?>
                                @foreach($products2 as $value1)
                                    <div class=" product-son ">
                                        <div class="clearfix image-product relative animate-default">
                                            <div class="center-vertical-image">
                                                <img src="{{$value1->cover_image}}" alt="{{$value1->title}}" style="width: 270px; height: 270px;" />
                                            </div>
                                            <ul class="option-product animate-default">
                                                <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value1->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <?php $averageRating = $value1->getAverageRatingOfPdt($value1->id); ?>
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
                                        <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 28)
                                                    {{substr($value1->title,0,28)}} ..
                                                @else
                                                    {{$value1->title}}
                                                @endif</a></p>
                                        <p class="clearfix price-product">
                                        @if($value1->price > 0)
                                            <p class="clearfix price-product"> ₦{{number_format($value1->price)}}</p>
                                        @else
                                            <p class="clearfix price-product"> Flexible price</p>
                                            @endif
                                            </p>
                                    </div>
                            @endforeach
                                <!-- End Product Son -->
                            </div>
                        </div>
                        <div class="good-deal-product animate-default hidden-content-box" id="{{$section1->getCategorySlug($section1->category3)}}">
                            <!-- Product Son -->
                            <div class="owl-carousel owl-theme">
                                <?php $productList3 = comma_separated_to_array($section1->productlist3); ?>
                                <?php $products3 = $section1->getProductDetails($productList3);?>
                                @foreach($products3 as $value1)
                                    <div class=" product-son ">
                                        <div class="clearfix image-product relative animate-default">
                                            <div class="center-vertical-image">
                                                <img src="{{$value1->cover_image}}" alt="{{$value1->title}}" style="width: 270px; height: 270px;" />
                                            </div>
                                            <ul class="option-product animate-default">
                                                <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value1->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <?php $averageRating = $value1->getAverageRatingOfPdt($value1->id); ?>
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
                                        <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 28)
                                                    {{substr($value1->title,0,28)}} ..
                                                @else
                                                    {{$value1->title}}
                                                @endif</a></p>
                                        <p class="clearfix price-product">
                                        @if($value1->price > 0)
                                            <p class="clearfix price-product"> ₦{{number_format($value1->price)}}</p>
                                        @else
                                            <p class="clearfix price-product"> Flexible price</p>
                                            @endif
                                            </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="good-deal-product animate-default hidden-content-box" id="{{$section1->getCategorySlug($section1->category4)}}">
                            <!-- Product Son -->
                            <div class="owl-carousel owl-theme">
                                <?php $productList4 = comma_separated_to_array($section1->productlist4); ?>
                                <?php $products4 = $section1->getProductDetails($productList4);?>
                                @foreach($products4 as $value1)
                                    <div class=" product-son ">
                                        <div class="clearfix image-product relative animate-default">
                                            <div class="center-vertical-image">
                                                <img src="{{$value1->cover_image}}" alt="{{$value1->title}}" style="width: 270px; height: 270px;" />
                                            </div>
                                            <ul class="option-product animate-default">
                                                <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value1->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <?php $averageRating = $value1->getAverageRatingOfPdt($value1->id); ?>
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
                                        <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 28)
                                                    {{substr($value1->title,0,28)}} ..
                                                @else
                                                    {{$value1->title}}
                                                @endif</a></p>
                                        <p class="clearfix price-product">
                                        @if($value1->price > 0)
                                            <p class="clearfix price-product"> ₦{{number_format($value1->price)}}</p>
                                        @else
                                            <p class="clearfix price-product"> Flexible price</p>
                                            @endif
                                            </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="good-deal-product animate-default hidden-content-box" id="{{$section1->getCategorySlug($section1->category5)}}">
                            <!-- Product Son -->
                            <div class="owl-carousel owl-theme">
                                <?php $productList5 = comma_separated_to_array($section1->productlist5); ?>
                                <?php $products5 = $section1->getProductDetails($productList5);?>
                                @foreach($products5 as $value1)
                                    <div class=" product-son ">
                                        <div class="clearfix image-product relative animate-default">
                                            <div class="center-vertical-image">
                                                <img src="{{$value1->cover_image}}" alt="{{$value1->title}}" style="width: 270px; height: 270px;" />
                                            </div>
                                            <ul class="option-product animate-default">
                                                <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value1->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <?php $averageRating = $value1->getAverageRatingOfPdt($value1->id); ?>
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
                                        <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 28)
                                                    {{substr($value1->title,0,28)}} ..
                                                @else
                                                    {{$value1->title}}
                                                @endif</a></p>
                                        <p class="clearfix price-product">
                                        @if($value1->price > 0)
                                            <p class="clearfix price-product"> ₦{{number_format($value1->price)}}</p>
                                        @else
                                            <p class="clearfix price-product"> Flexible price</p>
                                            @endif
                                            </p>
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
