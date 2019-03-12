<div class="clearfix cart-website absolute">
    <a href="{{url('/cart')}}">
        <img alt="Icon Cart" src="{{asset('storefront/img/icon_cart.png')}}" />
        <?php $total = 0; ?>
        @if(session('cart'))
            @foreach(session('cart') as $value1)
                <?php $total += count($value1);?>
            @endforeach

        @endif
            <p class="count-total-shopping absolute" id="TotalCart" @if(session('cart') && $total > 0 ) style="background: #ff0000;" @endif>
                {{$total > 0 ? $total: ''}}
            </p>

    </a>
</div>

