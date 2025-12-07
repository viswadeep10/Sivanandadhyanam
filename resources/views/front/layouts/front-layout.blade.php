<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{asset('assets/front/css/bootstrap.min.css')}}?ver=<?php echo time()?>" rel="stylesheet">
    <link href="{{asset('assets/front/css/magnific-popup.css')}}?ver=<?php echo time()?>" rel="stylesheet">
    <link href="{{asset('assets/front/css/style.css')}}?ver=<?php echo time()?>" rel="stylesheet">
</head>

<body>
@include('front.layouts.header')
@yield('content')
<div class="modal fade auth" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalToggleLabel">Sign Up</h5>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label class="form_img"><img src="{{asset('assets/front/img/user.png')}}"></label>
                                            <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form_img"><img src="{{asset('assets/front/img/email.png')}}"></label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="form_img"><img src="{{asset('assets/front/img/password.png')}}"></label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1">I agree to the <a href="#">Terms ans Conditions</a></label>
                                        </div>
                                        <button class="btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Sign Up</button>
                                        <div class="saperator">
                                            <span></span>
                                            <p>or continue with</p>
                                            <span></span>
                                        </div>
                                        <div class="social_link">
                                            <a href="#"><img src="{{asset('assets/front/img/google.png')}}"></a>
                                            <a href="#"><img src="{{asset('assets/front/img/facebook.png')}}"></a>
                                        </div>
                                        <div class="foot_txt">
                                            <p>Already have an account? <a href="#">Sign In</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<div class="modal fade auth" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center" id="exampleModalToggleLabel2">Sign In</h5>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                </div>
                                <div class="modal-body">
                                    <form>
                                         <div class="form-group">
                                            <label class="form_img"><img src="{{asset('assets/front/img/email.png')}}"></label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="form_img"><img src="{{asset('assets/front/img/password.png')}}"></label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <button class="btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Sign In</button>
                                        <div class="foot_txt">
                                            <p>Don't have an account? <a href="#">Sign Up</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@include('front.layouts.footer')
 <!-- Footer End Here -->
 <!-- Bootstrap Script -->
<script type="text/javascript" src="{{asset('assets/front/js/jquery-1.12.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.bundle.min.js')}}"></script>
<script>
$(function() {
    $('.popup-youtube, .popup-vimeo').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});
</script>
</body>
</html>
