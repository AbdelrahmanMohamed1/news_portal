<!-- Top Bar Start -->
    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="tb-contact">
              <p><i class="fas fa-envelope"></i>{{ $get_settings->contact_email }}</p>
              <p><i class="fas fa-phone-alt"></i>{{ $get_settings->phone_number }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tb-menu">
              @guest
              <a href="{{ route('register') }}">Register</a>
              <a href="{{ route('login') }}">LogIn</a>
              @endguest
              @auth
              <a href="javascript:void(0)" onclick="document.getElementById('formlogout').submit();">LogOut </a>
              @endauth
              <form id='formlogout' action="{{ route('logout') }}" method="post">
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Top Bar Start -->

    <!-- Brand Start -->
    <div class="brand">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-4">
            <div class="b-logo">
              <a href="index.html">
                <img src="{{ asset("assets/img") }}/logo.png" alt="Logo" />
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-4">
            <div class="b-ads">
              
            </div>
          </div>
          <div class="col-lg-3 col-md-4">
            <form action="{{ route('frontend.search') }}" method="post">
              @csrf
              <div class="b-search">
              <input name="search" type="text" placeholder="Search" />
              <button type="submit"><i class="fa fa-search"></i></button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Brand End -->

    <!-- Nav Bar Start -->
    <div class="nav-bar">
      <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
          <a href="#" class="navbar-brand">MENU</a>
          <button
            type="button"
            class="navbar-toggler"
            data-toggle="collapse"
            data-target="#navbarCollapse"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div
            class="collapse navbar-collapse justify-content-between"
            id="navbarCollapse"
          >
            <div class="navbar-nav mr-auto">
              <a href="index.html" class="nav-item nav-link {{ request()->routeIs('frontend.index') ? 'active' : '' }} ">Home</a>
              <div class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-link dropdown-toggle {{ request()->routeIs('frontend.category') ? 'active' : '' }}"
                  data-toggle="dropdown"
                  >Categories</a
                >
                <div class="dropdown-menu">
                  @foreach ($categories as $category)
                  <a href="{{ route('frontend.category',['slug'=>$category->slug]) }}" title="{{ $category->name }}" class="dropdown-item">{{ $category->name }}</a>
                  @endforeach
                 
                </div>
              </div>
              <a href="single-page.html" class="nav-item nav-link {{ request()->routeIs('frontend.show') ? 'active' : '' }}"
                >Single Page</a
              >
              <a href="dashboard.html" class="nav-item nav-link">Dashboard</a>
              <a href="{{ route('frontend.contact') }}" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="social ml-auto">
              <a href="{{ $get_settings->twitter_url }}" title="twitter"><i class="fab fa-twitter"></i></a>
              <a href="{{ $get_settings->facebook_url }}" title="facebook"><i class="fab fa-facebook-f"></i></a>
              <a href="{{ $get_settings->instagram_url }}" title="instgram"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Nav Bar End -->