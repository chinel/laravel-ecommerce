<div class="slide-product-bottom relative">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 relative bottom slide-related-product">
      <p class="bold title-slide-product-bottom">RELATED PRODUCTS</p>
      <div class="button-slide-related" id="btn-slide-1"></div>
      <div class="owl-theme owl-carousel" data-items="1,2,3">
          <?php $relatedProducts = $productDetails->getRelatedProducts($productDetails->subcategory_id);?>
          @if(!empty($relatedProducts))
          @foreach($relatedProducts as $value)
                      <div class="items">
                          <div class="full-width product-category relative">
                              <div class="image-product  relative overfollow-hidden">
                                  <div class="center-vertical-image">
                                      <img src="{{asset($value->cover_image)}}" alt="{{$value->title}}" style="width: 270px; height: 270px;">
                                  </div>
                                  <a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}"></a>

                                  <ul class="option-product animate-default">
                                      <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                      <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                  </ul>

                              </div>
                              <h3 class="title-product animate-default title-hover-black clearfix full-width">
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
                      </div>
          @endforeach
              @endif


      </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 relative slide-related-product">
      <p class="bold title-slide-product-bottom">YOU MIGHT ALSO LIKE</p>
      <div class="button-slide-related" id="btn-slide-2"></div>
      <div class="owl-theme owl-carousel" data-items="1,2,3">
          <?php $youMayLikeProducts = $productDetails->getYouMayLikeProducts($productDetails->category_id);?>
          @if(!empty($youMayLikeProducts))
              @foreach($youMayLikeProducts as $value)
                  <div class="items">
                      <div class="full-width product-category relative">
                          <div class="image-product  relative overfollow-hidden">
                              <div class="center-vertical-image">
                                  <img src="{{asset($value->cover_image)}}" alt="{{$value->title}}" style="width: 270px; height: 270px;">
                              </div>
                              <a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}"></a>

                              <ul class="option-product animate-default">
                                  <li class="relative"><a  href="{{url('/ajaxProduct/'.str_replace('.', '_', urlencode($value->title)))}}" class="cartIcon"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                  <li class="relative"><a href="{{url('/product/'.str_replace('.', '_', urlencode($value->title)))}}" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                              </ul>

                          </div>
                          <h3 class="title-product animate-default title-hover-black clearfix full-width">
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
                  </div>
              @endforeach
          @endif

      </div>
    </div>
  </div>
</div>
