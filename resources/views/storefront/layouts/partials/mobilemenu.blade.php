@if(!empty($categories))
<div class="menu-mobile-left-content">
    <ul>
        @foreach($categories as $category)
            <li><a href="{{url('/category/'.$category->slug)}}"><img src="{{$category->white_iconUrl}}" alt="{{$category->title}}" /> <p>{{$category->title}}</p></a></li>

        @endforeach
      </ul>
</div>
@endif
<!--
<div class="menu-mobile-left-content menu-bg-red">
  <ul>
    <li><a href="#"><img src="../storefront/img/icon_hot_gray.png" alt="Icon Hot Deals" /> <p>Hot Deals</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_food_gray.png" alt="Icon Food" /> <p>Food</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_mobile_gray.png" alt="Icon Mobile & Tablet" /> <p>Mobile & Tablet</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_electric_gray.png" alt="Icon Electric Appliances" /> <p>Electric Appliances</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_computer_gray.png" alt="Icon Electronics & Technology"/> <p>Electronics & Technology</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_fashion_gray.png" alt="Icon Fashion" /> <p>Fashion</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_health_gray.png" alt="Icon Health & Beauty" /> <p>Health & Beauty</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_mother_gray.png" alt="Icon Mother & Baby" /> <p>Mother & Baby</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_book_gray.png" alt="Icon Books & Stationery" /> <p>Books & Stationery</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_home_gray.png" alt="Icon Home & Life" /> <p>Home & Life</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_sport_gray.png" alt="Icon Sports & Outdoors" /> <p>Sports & Outdoors</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_auto_gray.png" alt="Icon Auto & Moto" /> <p>Auto & Moto</p></a></li>
    <li><a href="#"><img src="../storefront/img/icon_voucher_gray.png" alt="Icon Voucher Service" /> <p>Voucher Service</p></a></li>
  </ul>
</div>
-->
