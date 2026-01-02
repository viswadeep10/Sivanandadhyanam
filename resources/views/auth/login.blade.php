<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon.png')}}">

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="{{asset('assets/backend/plugins/%40mdi/font/css/materialdesignicons.min.css')}}">
  <link media="all" type="text/css" rel="stylesheet" href="{{asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
  <!-- end plugin css -->

  <!-- plugin css -->
    <!-- end plugin css -->

  <!-- common css -->
  <link media="all" type="text/css" rel="stylesheet" href="{{asset('assets/backend/css/app.css')}}">
  <!-- end common css -->

  </head>
<body>

  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      
<div class="content-wrapper auth p-0 theme-two">
  <div class="row d-flex align-items-stretch">
    <div class="col-md-5 banner-section d-none d-md-flex align-items-stretch justify-content-center">
      <div class="slide-content" style="background-image: url({{asset('assets/backend/images/login_2.jpg')}}); background-size: cover; background-position:center center"> </div>
    </div>
    <div class="col-12 col-md-7 h-100 bg-white">
      <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
          <img src="{{asset('assets/backend/images/logo.png')}}" class="w-25">
        <form action="{{ route('login') }}"  method="POST">
            @csrf
          <h3 class="mr-auto">Hello! let's get started</h3>
          <p class="mb-5 mr-auto">Enter your details below.</p>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="mdi mdi-account-outline"></i>
                </span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="Username">
            </div>
             @error('email')
                                    <span class="text-danger" role="alert">{{ $message }}
                                    </span>
                                @enderror
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="mdi mdi-lock-outline"></i>
                </span>
              </div>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
             @error('password')
                                    <span class="text-danger" role="alert">{{ $message }}
                                    </span>
                                @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary submit-btn">SIGN IN</button>
          </div>
         
        </form>
      </div>
    </div>
  </div>
</div>

    </div>
  </div>

    <!-- base js -->
    <script src="{{asset('assets/backend/js/app.js')}}"></script>
    <!-- end base js -->

    <!-- plugin js -->
        <!-- end plugin js -->
<script>
document.addEventListener("contextmenu", function (e){
    e.preventDefault();
},false);

</script>
    </body>

</html>