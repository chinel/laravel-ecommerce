<div class=" slide-brand-box full-width bottom-margin-default">
    <div class="clearfix container-web relative">
        <div class=" container relative">
            <div class="row">
                <div class="nav-prev nav-slide-brand"></div>
                <div class="slide-logo-brand col-md-12 clear-padding relative owl-theme owl-carousel border-collapsed-box">
                   @if(!empty($brands))
                   @for($i = 0; $i < count($brands) - 1; ++$i)
                        <div class="item">

                            <div class="clearfix border-collapsed-element relative logo-brand-son"><a href="{{url('/brand/'. $brands[$i]['slug'])}}"><img src="{{$brands[$i]['imageUrl']}}" alt="{{$brands[$i]['title']}}"></a></div>

                            {{--
                                                            <div class="clearfix border-collapsed-element relative logo-brand-son"><img src="{{$brands[$i+3]['imageUrl']}}" alt="Logo"></div>
                            --}}


                        </div>


                    @endfor
                       @endif



                </div>
                <div class="nav-next nav-slide-brand"></div>
            </div>
        </div>
    </div>
</div>
