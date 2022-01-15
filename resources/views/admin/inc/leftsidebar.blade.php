
  <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
  <div class="sl-sideleft">

    <div class="sl-sideleft-menu">

        <a href="{{ url('/') }}" class="sl-menu-link" target="_blank">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Visit Site</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('admin.dashboard') }}" class="sl-menu-link @yield('dashboard')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="{{ route('brands') }}" class="sl-menu-link @yield('brands')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Brand</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      {{-- <a href="{{ route('categories') }}" class="sl-menu-link @yield('categories')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Categories</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link --> --}}

      <a href="#" class="sl-menu-link @yield('category')">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Categories</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link @yield('add-category')">Add Category</a></li>
        <li class="nav-item"><a href="{{ route('sub-category') }}" class="nav-link @yield('sub-category')">Sub Category</a></li>
        <li class="nav-item"><a href="{{ route('sub-sub-category') }}" class="nav-link @yield('sub-sub-category')">Sub-> Sub Category</a></li>
      </ul>

      <a href="#" class="sl-menu-link @yield('products')">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Products</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ route('add-product') }}" class="nav-link @yield('add-product')">Add Product</a></li>
        <li class="nav-item"><a href="{{ route('manage-product') }}" class="nav-link @yield('all-product')">Manage Product</a></li>
      </ul>


      <a href="{{ route('sliders') }}" class="sl-menu-link @yield('sliders')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Slider</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

    </div><!-- sl-sideleft-menu -->

    <br>
  </div><!-- sl-sideleft -->
