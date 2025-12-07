<!DOCTYPE html>
<html>

<head>
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="icon" href="{{asset('assets/front/images/logo-favicon.png')}}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('assets/front/css/swiper-bundle.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}?ver=<?php echo time()?>" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
      var rz = "{{ env('RAZORPAY_API_KEY') }}";
      var checkout = "{{ route('checkout') }}";
      
    </script>
<meta name="csrf_token" content="{{ csrf_token() }}" />
  <script src="{{asset('assets/front/js/jquery.min.js')}}"></script>
<script>
  
  document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    const formId = params.get("form");

    if (formId) {
        const form = document.getElementById('form-fillup-service');
        if (form) {
            form.scrollIntoView({ behavior: "smooth" });
        }
    }
});

</script>
</head>

<body>
@include('front.layouts.header')
@yield('content')
<div class="rolling-loader" id="" style="display: none;">
    <div class="ig-loader"><img src="{{asset('assets/front/images/rolling-loader.gif')}}"></div>
  </div>
@include('front.layouts.footer')
 <!-- Footer End Here -->
  <!-----------------------JS----------------------->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
  <script src="{{asset('assets/front/js/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/front/js/custom.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
