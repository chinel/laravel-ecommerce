@if(!empty($sliders))
<div class="clearfix slide-box-home slide-v1 relative">
    <div class="clearfix slide-home owl-carousel owl-theme">
        <div class="item"><a href="{{url('/category/'.$sliders->getCategorySlug($sliders->big_slider1CategoryId))}}"><img src="{{$sliders->big_slider1Url}}" alt="#"></a></div>
        <div class="item"><a href="{{url('/category/'.$sliders->getCategorySlug($sliders->big_slider2categoryId))}}"><img src="{{$sliders->big_slider2Url}}" alt="#"></a></div>
        <div class="item"><a href="{{url('/category/'.$sliders->getCategorySlug($sliders->big_slider3CategoryId))}}"><img src="{{$sliders->big_slider3Url}}" alt="#"></a></div>
    </div>
</div>
<div class=" box-banner-small-v1 box-banner-small float-right">
    <div class="effect-layla relative clear-padding col-md-4 col-sm-4 col-xs-4 float-left zoom-image-hover">
        <img src="{{$sliders->small_slider1Url}}" alt="">
        <a href="{{url('/category/'.$sliders->getCategorySlug($sliders->small_slider1CategoryId))}}" class="relative"></a>
    </div>
    <div class="effect-layla relative clear-padding col-md-4 col-sm-4 col-xs-4 float-left zoom-image-hover">
        <img src="{{$sliders->small_slider2Url}}" alt="">
        <a href="{{url('/category/'.$sliders->getCategorySlug($sliders->small_slider2CategoryId))}}" class="relative"></a>
    </div>
    <div class="effect-layla relative clear-padding col-md-4 col-sm-4 col-xs-4 float-left zoom-image-hover">
        <img src="{{$sliders->small_slider3Url}}" alt="">
        <a href="{{url('/category/'.$sliders->getCategorySlug($sliders->small_slider3CategoryId))}}" class="relative"></a>
    </div>
</div>
@endif
