@section('fullbanner1')
    @if(!empty($section3))
<div class="clearfix relative full-width bottom-margin-default">
    <div class="clearfix container-web">
        <div class=" container banner_full_width">
            <div class="row relative banners-effect5">
                <img src="{{$section3->bannerUrl}}" alt="#" class="img-responsive">
                <a href="{{url('/category/'.$section3->getCategorySlug($section3->categoryId))}}"></a>
            </div>
        </div>
    </div>
</div>
    @endif
@endsection


@section('fullbanner2')
    @if(!empty($section8))
        <div class="clearfix relative full-width bottom-margin-default">
            <div class="clearfix container-web">
                <div class=" container banner_full_width">
                    <div class="row relative banners-effect5">
                        <img src="{{$section8->bannerUrl}}" alt="#" class="img-responsive">
                        <a href="{{url('/category/'.$section8->getCategorySlug($section8->categoryId))}}"></a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('halfbanner')
      @if(!empty($section5))
      <div class=" relative banner-half-web full-width bottom-margin-default">
          <div class="clearfix container-web">
              <div class=" container">
                  <div class="row">
                      <div class="clearfix content-left col-md-6 col-sm-6 col-xs-12 zoom-image-hover overfollow-hidden">
                          <div class="overfollow-hidden effect-oscar relative">
                              <img class="max-width" src="{{$section5->banner1Url}}" alt="" />
                              <a href="{{url('/category/'.$section5->getCategorySlug($section5->banner1CategoryId))}}"></a>
                          </div>
                      </div>
                      <div class="clearfix content-right col-md-6 col-sm-6 col-xs-12 zoom-image-hover overfollow-hidden">
                          <div class="overfollow-hidden effect-oscar relative">
                              <img class="max-width" src="{{$section5->banner2Url}}" alt="" />
                              <a href="{{url('/category/'.$section5->getCategorySlug($section5->banner2CategoryId))}}"></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endif
@endsection
