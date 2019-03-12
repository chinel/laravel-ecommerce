<!-- Sider Bar -->
<div class="col-md-3 relative right-padding-default clear-padding" id="slide-bar-category">
  <div class="col-md-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
    <p class="title-siderbar bold">Categories</p>

    <ul class="clear-margin list-siderbar">
        @if( $searchByCategory == false)
        @foreach($searchResultCategory as $value)
            @if($_GET)
            <li><a href="{{url('/subcategory/'. $value->slug ."?".$_SERVER['QUERY_STRING'])}}">{{$value->title}}</a></li>
        @else
                <li><a href="{{url('/subcategory/'. $value->slug)}}">{{$value->title}}</a></li>
         @endif

                @endforeach
            @else
            @foreach($searchResultCategory as $value)
                @if($_GET)
                    <li><a href="{{url('/category/'. $value->slug ."?".$_SERVER['QUERY_STRING'])}}">{{$value->title}}</a></li>
                @else
                    <li><a href="{{url('/category/'. $value->slug)}}">{{$value->title}}</a></li>
                @endif

            @endforeach
        @endif
    </ul>
  </div>
    <div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
        <p class="title-siderbar bold">BRANDS</p>


            <ul class="check-box-custom clear-margin clear-margin">
                @foreach($searchResultBrands as $brand)
                    <li>
                        <label>{{$brand->title}}{{-- ({{$productCategory->getTotalBrandsByCategory($productCategory->id, $brand->id)}})--}}
                            <input type="checkbox" class="checkBrands" value="{{$brand->slug}}" name="brands[]" @if (in_array($brand->slug,$selectedBrands)) checked @endif>
                            <span class="checkmark"></span>
                        </label>
                    </li>
                @endforeach

            </ul>

    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 relative border bottom-margin-default sider-bar-category">
        <div class="relative border no-border-t no-border-l no-border-r bottom-padding-default">
            <p class="title-siderbar bold">price</p>

                <div class="range-slider">
                    <input value="10000" min="0" max="{{$originalMax}}" class="multi-range" type="range" >
                    <input type="hidden" value="{{$min}}" id="originalMin">
                    <input type="hidden" value="{{$max}}" id="originalMax">
                    <input type="hidden" name="minimum" id="adjMin">
                    <input type="hidden" name="maximum" id="adjMax">
                    <p class="text-range">Range: <span class="number-range"></span></p>
                </div>

        </div>

    </div>

</div>
<!-- End Sider Bar Box -->
