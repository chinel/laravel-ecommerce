<div class=" header-top">
    <p class="contact_us_header col-md-4 col-xs-12 col-sm-3 clear-margin">
        <img src="../storefront/img/icon_phone_top.png" alt="Icon Phone Top Header" /> Call us <span class="text-red bold">070-7782-7137</span>
    </p>
    <div class="clear-padding menu-header-top text-right col-md-8 col-xs-12 col-sm-6">
        <ul class="clear-margin">
            @if(Auth::check() and Auth::user()->role_id == 4)

                <li class="relative">
                    <a href="#">Your Account</a>
                    <ul>
                        <li class="relative"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                        <li class="relative"><a href="{{url('/logout')}}">Logout</a></li>
                    </ul>
                </li>
            @else
            <li class="relative"><a href="{{url('/register')}}">Register</a></li>
            <li class="relative"><a href="{{url('/login')}}">Login</a></li>
            @endif

        </ul>
    </div>
</div>
