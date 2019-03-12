<!-- Menu Mobile -->
@include('storefront.layouts.partials.mobilemenu')
<!-- Header Box -->
@section('page-menu')
    <header class="relative full-width box-shadow">
        <div class="clearfix container-web relative">
            <div class=" container">
                <div class="row">
                  @include('storefront.layouts.partials.header-top')
                </div>
                <div class="row">
                    <div class="clearfix header-content full-width relative">
                        <div class="clearfix icon-menu-bar">
                            <i class="data-icon data-icon-arrows icon-arrows-hamburger-2 icon-pushmenu js-push-menu" aria-hidden="true"></i>
                        </div>
                        @include('storefront.layouts.partials.searchbox')
                        <div class="clearfix icon-search-mobile absolute">
                            <i onclick="showBoxSearchMobile()" class="data-icon data-icon-basic icon-basic-magnifier"></i>
                        </div>

                        @include('storefront.layouts.partials.cart')
                        <div class="mask-search absolute clearfix" onclick="hiddenBoxSearchMobile()"></div>
                        <div class="clearfix box-search-mobile">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <a class="menu-vertical hidden-md hidden-lg" onclick="showMenuMobie()">
          <span class="animate-default"><i class="fa fa-list" aria-hidden="true"></i> all categories</span>
        </a>
                </div>
            </div>
        </div>
        <div class="header-ontop">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="clearfix logo">
                            <a href="#"><img alt="Logo" src="{{$logo}}" /></a>
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="menu-header">
                            <div class="clearfix search-box2 relative float-left">
                                <form method="GET" action="{{url('search')}}" class="">
                                    <div class="clearfix category-box relative">
                                        <select name="filterIn">
                                            <option value="all">All Category</option>
                                            @foreach($categories as $category)
                                                <option @if(isset($filterIn))@if($filterIn == $category->slug) selected @endif @endif value="{{$category->slug}}">{{$category->title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <input class="search" type="text" name="term"  placeholder="Enter keyword here . . ." autocomplete="off" @if(isset($term)) value="{{$term}}" @endif>
                                    <button type="submit" class="animate-default button-hover-red">Search</button>
                                </form>
                            </div>
                            {{--<ul class="main__menu clear-margin">
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">home</a>
                                    <ul class="sub-menu mega-menu">
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v1.html"><img src="img/home_1_menu-min.png" alt=""></a>
                                            <p><a href="home_v1.html">Home 1</a></p>
                                        </li>
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v2.html"><img src="img/home_2_menu-min.png" alt=""></a>
                                            <p><a href="home_v2.html">Home 2</a></p>
                                        </li>
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v3.html"><img src="img/home_3_menu-min.png" alt=""></a>
                                            <p><a href="home_v3.html">Home 3</a></p>
                                        </li>
                                    </ul>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">shop</a>
                                    <div class="sub-menu mega-menu-v2">
                                        <ul>
                                            <li>Catgory Type</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1.html">Category v1</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1_2.html">Category v1.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2.html">Category v2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2_2.html">Category v2.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3.html">Category v3</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3_2.html">Category v3.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4.html">Category v4</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4_2.html">Category v4.2</a></li>
                                        </ul>
                                        <ul>
                                            <li>Single Product Type</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v1.html">Product Single 1</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v2.html">Product Single 2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v3.html">Product Single 3</a></li>
                                        </ul>
                                        <ul>
                                            <li>Order Page</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="cartpage.html">Cart Page</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="checkout.html">Checkout</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="compare.html">Compare</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="quickview.html">QuickView</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="trackyourorder.html">Track Order</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="wishlist.html">WishList</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">pages</a>
                                    <ul>
                                        <li class="title-hover-red"><a class="animate-default" href="about.html">About Us</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="contact.html">Contact</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">Blog</a>
                                    <ul>
                                        <li class="title-hover-red"><a class="animate-default" href="blog.html">Blog Category</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="blogdetail.html">Blog Detail</a></li>
                                    </ul>
                                </li>
                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

</header>
@endsection
@section('product-menu')
    <header class="relative full-width">
        <div class="clearfix container-web relative">
            <div class=" container">
                <div class="row">
                  @include('storefront.layouts.partials.header-top')
                </div>
                <div class="row">
                    <div class="clearfix header-content full-width relative">
                        <div class="clearfix icon-menu-bar">
                            <i class="data-icon data-icon-arrows icon-arrows-hamburger-2 icon-pushmenu js-push-menu" aria-hidden="true"></i>
                        </div>
                        @include('storefront.layouts.partials.searchbox')
                        <div class="clearfix icon-search-mobile absolute">
                            <i onclick="showBoxSearchMobile()" class="data-icon data-icon-basic icon-basic-magnifier"></i>
                        </div>
                      @include('storefront.layouts.partials.cart')
                        <div class="mask-search absolute clearfix" onclick="hiddenBoxSearchMobile()"></div>
                        <div class="clearfix box-search-mobile">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <a class="menu-vertical hidden-md hidden-lg" onclick="showMenuMobie()">
          <span class="animate-default"><i class="fa fa-list" aria-hidden="true"></i> all categories</span>
        </a>
                </div>
            </div>
        </div>

        <div class="menu-header-v3 hidden-ipx">
            <div class="container">
                <div class="row">
                    <!-- Menu Page -->
                    <div class="menu-header full-width">
                        <ul class="clear-margin">
                          @include('storefront.layouts.partials.menu')
                        </ul>
                    </div>
                    <!-- End Menu Page -->
                </div>
            </div>
        </div>
        @if(!empty($categories))
        <div class="clearfix menu_more_header menu-web menu-bg-white">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{url('/category/'.$category->slug)}}"><img src="{{$category->black_iconUrl}}" alt="{{$category->title}}" /> <p>{{$category->title}}</p></a></li>

                @endforeach
            </ul>
        </div>
        @endif
        <div class="header-ontop">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="clearfix logo">
                            <a href="#"><img alt="Logo" src="{{$logo}}" /></a>
                        </div>
                    </div>
                    <div class="col-md-9">

                        <div class="menu-header">
                            <div class="clearfix search-box2 relative float-left">
                                <form method="GET" action="{{url('search')}}" class="">
                                    <div class="clearfix category-box relative">
                                        <select name="filterIn">
                                            <option value="all">All Category</option>
                                            @foreach($categories as $category)
                                                <option @if(isset($filterIn))@if($filterIn == $category->slug) selected @endif @endif value="{{$category->slug}}">{{$category->title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <input class="search" type="text" name="term"  placeholder="Enter keyword here . . ." autocomplete="off" @if(isset($term)) value="{{$term}}" @endif>
                                    <button type="submit" class="animate-default button-hover-red">Search</button>
                                </form>
                            </div>
                            {{--<ul class="main__menu clear-margin">
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">home</a>
                                    <ul class="sub-menu mega-menu">
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v1.html"><img src="img/home_1_menu-min.png" alt=""></a>
                                            <p><a href="home_v1.html">Home 1</a></p>
                                        </li>
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v2.html"><img src="img/home_2_menu-min.png" alt=""></a>
                                            <p><a href="home_v2.html">Home 2</a></p>
                                        </li>
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v3.html"><img src="img/home_3_menu-min.png" alt=""></a>
                                            <p><a href="home_v3.html">Home 3</a></p>
                                        </li>
                                    </ul>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">shop</a>
                                    <div class="sub-menu mega-menu-v2">
                                        <ul>
                                            <li>Catgory Type</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1.html">Category v1</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1_2.html">Category v1.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2.html">Category v2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2_2.html">Category v2.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3.html">Category v3</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3_2.html">Category v3.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4.html">Category v4</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4_2.html">Category v4.2</a></li>
                                        </ul>
                                        <ul>
                                            <li>Single Product Type</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v1.html">Product Single 1</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v2.html">Product Single 2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v3.html">Product Single 3</a></li>
                                        </ul>
                                        <ul>
                                            <li>Order Page</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="cartpage.html">Cart Page</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="checkout.html">Checkout</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="compare.html">Compare</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="quickview.html">QuickView</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="trackyourorder.html">Track Order</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="wishlist.html">WishList</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">pages</a>
                                    <ul>
                                        <li class="title-hover-red"><a class="animate-default" href="about.html">About Us</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="contact.html">Contact</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">Blog</a>
                                    <ul>
                                        <li class="title-hover-red"><a class="animate-default" href="blog.html">Blog Category</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="blogdetail.html">Blog Detail</a></li>
                                    </ul>
                                </li>
                            </ul>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- End Header Box -->
@endsection
