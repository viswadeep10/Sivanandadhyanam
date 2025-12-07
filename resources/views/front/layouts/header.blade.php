<!-- Header -->
  <header class="main-header" id="site-header">
    <div class="container">
      <div class="top-header">
        <div class="top-logo-left"><a href="{{url('/')}}"><img src="{{asset('assets/front/images/logo.png')}}" alt="logo"></a> </div>
        <nav class="navigation">
          <ul id="myTopnav">
            <li><a href="{{url('/')}}" class="active">Home</a></li>
            <li><a href="{{url('/about')}}">About</a></li>
            <li><a href="{{url('/free-download')}}">Free Download</a></li>
            <li><a href="{{url('/contact')}}">Contact</a></li>
          </ul>
        </nav>
        <div class="mobile-navbar">
          <div id="mySidenav" class="sidenav"> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">❌</a>
            <ul>
            <li><a href="{{url('/')}}" class="active">Home</a></li>
            <li><a href="{{url('/about')}}">About</a></li>
            <li><a href="{{url('/free-download')}}">Free Download</a></li>
            <li><a href="{{url('/contact')}}">Contact</a></li>
            </ul>
          </div>
          <span class="mobile-menu-bar" style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="{{asset('assets/front/images/burger-menu.svg')}}" alt="cart"></span>
        </div>
        <div class="cart-icon"><a href="{{route('cart')}}"> <img src="{{asset('assets/front/images/cart.svg')}}" alt="cart"><span class="cart-count">{{session('cart') ? count(session('cart')) : 0}}</span></a> </div>
      </div>
    </div>
    <!-- Page Content -->
   <div class="ticker-wrapper">
    <div class="ticker">
      {!!$setting->marquee!!}
      <!-- <span>Tech Fest 2025 registrations are now open!</span> -->
    </div>
  </div>
  </header>
  <!-- Header End Here-->