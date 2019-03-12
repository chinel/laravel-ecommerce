
  <!-- Brand Logo -->
  <a href="{{url('/backstore')}}" class="brand-link">
    <img src="{{url('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">BackStore</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="#">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{\Auth::user()->firstname}} {{\Auth::user()->lastname}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

          <li class="nav-item">
              <a href="{{url('backstore')}}" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                      Dashboard

                  </p>
              </a>
          </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-shopping-basket"></i>
            <p>
              Products
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/backstore/products" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>All Products</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/backstore/categories" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Categories</p>
              </a>
            </li>
              <li class="nav-item">
                  <a href="/backstore/subcategories" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Sub Categories</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="/backstore/brands" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Brands</p>
                  </a>
              </li>
            <li class="nav-item">
              <a href="/backstore/deliverytypes" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Shipping / Delivery Types</p>
              </a>
            </li>
              <li class="nav-item">
                  <a href="/backstore/serviceFee" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Service Fee</p>
                  </a>
              </li>
          </ul>
        </li>

          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-columns"></i>
                  <p>
                      Page Layout
                      <i class="right fa fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{url('/backstore/logo')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Logo</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/backstore/sliders')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Slider</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/backstore/section1')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Home Section 1</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/backstore/section2')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Home Section 2</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/backstore/section3')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Home Section 3</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/backstore/section4')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Home Section 4</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/backstore/section5')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Home Section 5</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('/backstore/section6')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Home Section 6</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{url('/backstore/section8')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Home Section 8</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{url('/backstore/sidebarBanner')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Sidebar Banner</p>
                      </a>
                  </li>

              </ul>
          </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-shopping-cart"></i>
            <p>
              Orders
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href={{url('/backstore/orders')}} class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>All Orders</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Users
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              @if(\Auth::user()->role_id == 1)
            <li class="nav-item">
              <a href="{{url('/backstore/adminUsers')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Admin Users</p>
              </a>
            </li>
              @endif
            <li class="nav-item">
              <a href="{{url('/backstore/customers')}}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Customers</p>
              </a>
            </li>

          </ul>
        </li>
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-gears"></i>
                  <p>
                      Settings
                      <i class="fa fa-angle-left right"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{url('/backstore/changePassword')}}" class="nav-link">
                          <i class="fa fa-circle-o nav-icon"></i>
                          <p>Change Password</p>
                      </a>
                  </li>

              </ul>
          </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
