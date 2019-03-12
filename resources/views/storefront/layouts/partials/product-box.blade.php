
@section('product-box-1')
    @if(!empty($section2))
        <div class="top-margin-default container-web">
            <div class=" container">
                <div class="row">
                    <div class="clearfix title-box full-width border">
                        <div class="clearfix name-title-box title-category title-green-bg relative">
                            <img alt="{{$section2->getCategoryTitle($section2->category_id)}}" src="{{$section2->getCategoryIcon($section2->category_id)}}" class="absolute" />

                            <p>{{$section2->getCategoryTitle($section2->category_id)}}</p>
                        </div>
                        <div class="clearfix menu-title-box bold uppercase">
                            <ul>
                                <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section2->getSubCategorySlug($section2->subcategory1)}}','.box-food-content1')">{{$section2->getSubCategoryTitle($section2->subcategory1)}}</a></li>
                                <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section2->getSubCategorySlug($section2->subcategory2)}}','.box-food-content1')">{{$section2->getSubCategoryTitle($section2->subcategory2)}}</a></li>
                                <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section2->getSubCategorySlug($section2->subcategory3)}}','.box-food-content1')">{{$section2->getSubCategoryTitle($section2->subcategory3)}}</a></li>
                                <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section2->getSubCategorySlug($section2->subcategory4)}}','.box-food-content1')">{{$section2->getSubCategoryTitle($section2->subcategory4)}}</a></li>
                                <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section2->getSubCategorySlug($section2->subcategory5)}}','.box-food-content1')">{{$section2->getSubCategoryTitle($section2->subcategory5)}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="display-table bottom-margin-default full-width">
                        <div class="clearfix clear-padding list-logo-category border no-border-t no-border-r list-logo-category-v1 float-left">
                            <?php $brandList = comma_separated_to_array($section2->brandlist); ?>
                            <?php $brands = $section2->getBrandDetails($brandList);?>
                            <ul>
                                @foreach($brands as $brand)
                                    <li><a href="{{url('/brand/'. $brand->slug)}}"><img src="{{$brand->imageUrl}}" alt="{{$brand->title}}"></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class=" banner-category banner-category-v1 float-left relative effect-bubba zoom-image-hover">
                            <img src="{{$section2->bannerUrl}}" alt="#">
                            <a href="{{url('/category/'.$section2->getCategorySlug($section2->category_id))}}"></a>
                        </div>
                        <div class="clearfix list-products-category list-products-category-v1 float-left relative">
                            <div class="box-food-content1 box-food-content relative animate-default active-box-category hidden-content-box border-collapsed-box" id="{{$section2->getSubCategorySlug($section2->subcategory1)}}">
                                <?php $productList1 = comma_separated_to_array($section2->subcategory1_childlist); ?>
                                <?php $products1 = $section2->getProductDetails($productList1);?>

                                @foreach($products1 as $value1)
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                    @if(strlen($value1->title) > 18)
                                                        {{substr($value1->title,0,18)}} ..
                                                    @else
                                                    {{$value1->title}}
                                                    @endif
                                                </a></p>
                                            <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="box-food-content1 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section2->getSubCategorySlug($section2->subcategory2)}}">
                                <?php $productList2 = comma_separated_to_array($section2->subcategory2_childlist); ?>
                                <?php $products2 = $section2->getProductDetails($productList2);?>

                                @foreach($products2 as $value1)
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                    @if(strlen($value1->title) > 18)
                                                        {{substr($value1->title,0,18)}} ..
                                                    @else
                                                    {{$value1->title}}
                                                    @endif
                                                </a></p>
                                            <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="box-food-content1 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section2->getSubCategorySlug($section2->subcategory3)}}">
                                <?php $productList3 = comma_separated_to_array($section2->subcategory3_childlist); ?>
                                <?php $products3 = $section2->getProductDetails($productList3);?>

                                @foreach($products3 as $value1)
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                    @if(strlen($value1->title) > 18)
                                                        {{substr($value1->title,0,18)}} ..
                                                    @else
                                                    {{$value1->title}}
                                                    @endif
                                                </a></p>
                                            <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="box-food-content1 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section2->getSubCategorySlug($section2->subcategory4)}}">
                                <?php $productList4 = comma_separated_to_array($section2->subcategory4_childlist); ?>
                                <?php $products4 = $section2->getProductDetails($productList4);?>

                                @foreach($products4 as $value1)
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                    @if(strlen($value1->title) > 18)
                                                        {{substr($value1->title,0,18)}} ..
                                                    @else
                                                    {{$value1->title}}
                                                    @endif
                                                </a></p>
                                            <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="box-food-content1 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section2->getSubCategorySlug($section2->subcategory5)}}">

                                <?php $productList5 = comma_separated_to_array($section2->subcategory5_childlist); ?>
                                <?php $products5 = $section2->getProductDetails($productList5);?>

                                @foreach($products5 as $value1)
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                    @if(strlen($value1->title) > 18)
                                                        {{substr($value1->title,0,18)}} ..
                                                    @else
                                                    {{$value1->title}}
                                                    @endif
                                                </a></p>
                                            <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection



@section('product-box-2')
    @if(!empty($section6))


  <div class=" full-width category-percent-two bottom-margin-default">
    <div class="clearfix container-web">
        <div class=" container">
            <div class="row">
                <div class=" clearfix content-left col-md-6 col-sm-6">
                    <!-- Title Product -->
                    <div class="clearfix title-box full-width border">
                        <div class="clearfix name-title-box title-category title-magenta-bg relative">
                            <img src="{{$section6->getCategoryIcon($section6->category1_id)}}" alt="{{$section6->getCategoryTitle($section6->category1_id)}}" class="absolute">
                            <p>{{$section6->getCategoryTitle($section6->category1_id)}}</p>
                        </div>
                        <div class="clearfix menu-title-box">
                            <p class="view-all-product-category title-hover-red"><a href="{{url('/category/'.$section6->getCategorySlug($section6->category1_id))}}" class="animate-default">view all</a></p>
                        </div>
                    </div>
                    <div class=" banner-percent-product overfollow-hidden zoom-image-hover effect-oscar relative">
                        <img src="{{$section6->banner1Url}}" class="max-width" alt="{{$section6->getCategoryTitle($section6->category1_id)}}" />
                        <a href="{{url('/category/'.$section6->getCategorySlug($section6->category1_id))}}"></a>
                    </div>
                    <!-- Content Product Box -->
                    <div class="clearfix product-percent-content border-collapsed-box full-width">
                        <?php $productList1 = comma_separated_to_array($section6->product1List); ?>
                        <?php $products = $section6->getProductDetails($productList1);?>

                        @foreach($products as $value1)
                                <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                    <div class="effect-hover-zoom center-vertical-image">
                                        <img src="{{$value1->cover_image}}" alt="#">
                                        <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                    </div>
                                    <div class="clearfix absolute name-product-no-ranking">
                                        <p class="title-product clearfix full-width title-hover-black" title="{{$value1->title}}"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}" title="{{$value1->title}}">
                                                @if(strlen($value1->title) > 18)
                                                    {{substr($value1->title,0,18)}} ..
                                                @else
                                                    {{$value1->title}}
                                                @endif</a></p>
                                        <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                    </div>
                                </div>

                            @endforeach
                       </div>
                </div>
                <div class=" clearfix content-right col-md-6 col-sm-6">
                    <!-- Title Product -->
                    <div class="clearfix title-box full-width border">
                        <div class="clearfix name-title-box title-category title-orchild-bg relative">
                            <img src="{{$section6->getCategoryIcon($section6->category2_id)}}" alt="{{$section6->getCategoryTitle($section6->category2_id)}}" class="absolute">
                            <p>{{$section6->getCategoryTitle($section6->category2_id)}}</p>
                        </div>
                        <div class="clearfix menu-title-box">
                            <p class="view-all-product-category title-hover-red"><a href="{{url('/category/'.$section6->getCategorySlug($section6->category2_id))}}" class="animate-default">view all</a></p>
                        </div>
                    </div>
                    <div class=" banner-percent-product overfollow-hidden zoom-image-hover effect-oscar relative">
                        <img src="{{$section6->banner2Url}}" class="max-width" alt="{{$section6->getCategoryTitle($section6->category2_id)}}" />
                        <a href="{{url('/category/'.$section6->getCategorySlug($section6->category2_id))}}"></a>
                    </div>
                    <!-- Content Product Box -->
                    <div class="clearfix product-percent-content border-collapsed-box full-width">
                        <?php $productList2 = comma_separated_to_array($section6->product2List); ?>
                        <?php $products2 = $section6->getProductDetails($productList2);?>

                        @foreach($products2 as $value2)
                            <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                <div class="effect-hover-zoom center-vertical-image">
                                    <img src="{{$value2->cover_image}}" alt="Product Image . . .">
                                    <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                </div>
                                <div class="clearfix absolute name-product-no-ranking">
                                    <p class="title-product clearfix full-width title-hover-black" title="{{$value2->title}}"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}" title="{{$value2->title}}">
                                            @if(strlen($value2->title) > 18)
                                                {{substr($value2->title,0,18)}} ..
                                            @else
                                                {{$value2->title}}
                                            @endif</a></p>
                                    <p class="clearfix price-product"> @if($value2->price_type == 'fixed')₦{{number_format($value2->price)}} @else flexible price @endif</p>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endif
@endsection



@section('product-box-3')
    @if(!empty($section4))
    <div class="top-margin-default container-web">
        <div class=" container">
            <div class="row">
                <div class="clearfix title-box full-width border">
                    <div class="clearfix name-title-box title-category title-green-bg relative">
                        <img alt="{{$section4->getCategoryTitle($section4->category_id)}}" src="{{$section4->getCategoryIcon($section4->category_id)}}" class="absolute" />

                        <p>{{$section4->getCategoryTitle($section4->category_id)}}</p>
                    </div>
                    <div class="clearfix menu-title-box bold uppercase">
                        <ul>
                            <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section4->getSubCategorySlug($section4->subcategory1)}}','.box-food-content2')">{{$section4->getSubCategoryTitle($section4->subcategory1)}}</a></li>
                            <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section4->getSubCategorySlug($section4->subcategory2)}}','.box-food-content2')">{{$section4->getSubCategoryTitle($section4->subcategory2)}}</a></li>
                            <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section4->getSubCategorySlug($section4->subcategory3)}}','.box-food-content2')">{{$section4->getSubCategoryTitle($section4->subcategory3)}}</a></li>
                            <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section4->getSubCategorySlug($section4->subcategory4)}}','.box-food-content2')">{{$section4->getSubCategoryTitle($section4->subcategory4)}}</a></li>
                            <li><a href="javascript:;" onclick="showBoxCateHomeByID('#{{$section4->getSubCategorySlug($section4->subcategory5)}}','.box-food-content2s')">{{$section4->getSubCategoryTitle($section4->subcategory5)}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="display-table bottom-margin-default full-width">
                    <div class="clearfix clear-padding list-logo-category border no-border-t no-border-r list-logo-category-v1 float-left">
                        <?php $brandList = comma_separated_to_array($section4->brandlist); ?>
                        <?php $brands = $section4->getBrandDetails($brandList);?>
                        <ul>
                            @foreach($brands as $brand)
                                <li><a href="{{url('/brand/'. $brand->slug)}}"><img src="{{$brand->imageUrl}}" alt="{{$brand->title}}"></a></li>
                             @endforeach
                        </ul>
                    </div>
                    <div class=" banner-category banner-category-v1 float-left relative effect-bubba zoom-image-hover">
                        <img src="{{$section4->bannerUrl}}" alt="#">
                        <a href="{{url('/category/'.$section4->getCategorySlug($section4->category_id))}}"></a>
                    </div>
                    <div class="clearfix list-products-category list-products-category-v1 float-left relative">
                        <div class="box-food-content2 box-food-content relative animate-default active-box-category hidden-content-box border-collapsed-box" id="{{$section4->getSubCategorySlug($section4->subcategory1)}}">
                            <?php $productList1 = comma_separated_to_array($section4->subcategory1_childlist); ?>
                            <?php $products1 = $section4->getProductDetails($productList1);?>

                            @foreach($products1 as $value1)
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                            <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                    @if(strlen($value1->title) > 18)
                                                        {{substr($value1->title,0,18)}} ..
                                                    @else
                                                    {{$value1->title}}
                                                    @endif
                                                </a></p>
                                            <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                        <div class="box-food-content2 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section4->getSubCategorySlug($section4->subcategory2)}}">
                            <?php $productList2 = comma_separated_to_array($section4->subcategory2_childlist); ?>
                            <?php $products2 = $section4->getProductDetails($productList2);?>

                            @foreach($products2 as $value1)
                                <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                    <div class="effect-hover-zoom center-vertical-image">
                                        <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                        <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                    </div>
                                    <div class="clearfix absolute name-product-no-ranking">
                                        <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 18)
                                                    {{substr($value1->title,0,18)}} ..
                                                @else
                                                {{$value1->title}}
                                                @endif
                                            </a></p>
                                        <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="box-food-content2 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section4->getSubCategorySlug($section4->subcategory3)}}">
                            <?php $productList3 = comma_separated_to_array($section4->subcategory3_childlist); ?>
                            <?php $products3 = $section4->getProductDetails($productList3);?>

                            @foreach($products3 as $value1)
                                <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                    <div class="effect-hover-zoom center-vertical-image">
                                        <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                        <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                    </div>
                                    <div class="clearfix absolute name-product-no-ranking">
                                        <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 18)
                                                    {{substr($value1->title,0,18)}} ..
                                                @else
                                                {{$value1->title}}
                                                @endif
                                            </a></p>
                                        <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="box-food-content2 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section4->getSubCategorySlug($section4->subcategory4)}}">
                            <?php $productList4 = comma_separated_to_array($section4->subcategory4_childlist); ?>
                            <?php $products4 = $section4->getProductDetails($productList4);?>

                            @foreach($products4 as $value1)
                                <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                    <div class="effect-hover-zoom center-vertical-image">
                                        <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                        <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                    </div>
                                    <div class="clearfix absolute name-product-no-ranking">
                                        <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 18)
                                                    {{substr($value1->title,0,18)}} ..
                                                @else
                                                {{$value1->title}}
                                                @endif
                                            </a></p>
                                        <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                    </div>
                                </div>
                            @endforeach

                       </div>
                        <div class="box-food-content2 box-food-content relative animate-default hidden-content-box border-collapsed-box" id="{{$section4->getSubCategorySlug($section4->subcategory5)}}">

                            <?php $productList5 = comma_separated_to_array($section4->subcategory5_childlist); ?>
                            <?php $products5 = $section4->getProductDetails($productList5);?>

                            @foreach($products5 as $value1)
                                <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                    <div class="effect-hover-zoom center-vertical-image">
                                        <img src="{{$value1->cover_image}}" alt="{{$value1->title}}">
                                        <a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}"></a>
                                    </div>
                                    <div class="clearfix absolute name-product-no-ranking">
                                        <p class="title-product clearfix full-width title-hover-black"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value1->title)))}}">
                                                @if(strlen($value1->title) > 18)
                                                    {{substr($value1->title,0,18)}} ..
                                                @else
                                                {{$value1->title}}
                                                @endif
                                            </a></p>
                                        <p class="clearfix price-product"> @if($value1->price_type == 'fixed')₦{{number_format($value1->price)}} @else flexible price @endif</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
