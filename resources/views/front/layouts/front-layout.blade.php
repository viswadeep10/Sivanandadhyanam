<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('assets/front/img/favicon.ico')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{asset('assets/front/css/bootstrap.min.css')}}?ver=<?php echo time()?>" rel="stylesheet">
    <link href="{{asset('assets/front/css/magnific-popup.css')}}?ver=<?php echo time()?>" rel="stylesheet">
    <link href="{{asset('assets/front/css/style.css')}}?ver=<?php echo time()?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.10/dist/sweetalert2.min.css" rel="stylesheet">
    <script>
        var loggedIn = {{ auth()->check() ? 'true' : 'false' }};
    </script>
    
</head>

<body>
@include('front.layouts.header')
@yield('content')
<div class="modal fade auth" id="SignUp" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalToggleLabel">Sign Up</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('custom_register.post')}}">
                    @csrf

                    <div class="form-group">
                        <label class="form_img"><img src="{{asset('assets/front/img/user.png')}}"></label>
                        <input type="text" class="form-control" name="name" id="fullname" aria-describedby="emailHelp" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label class="form_img"><img src="{{asset('assets/front/img/email.png')}}"></label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form_img"><img src="{{asset('assets/front/img/phone.png')}}"></label>
                        <input type="number" class="form-control" name="mobile" id="exampleInputMobile1" aria-describedby="emailHelp" placeholder="Mobile Number" min="1">
                    </div>
                    <button class="btn-primary" type="button" id="Register">Sign Up</button>
                    <div class="foot_txt">
                        <p>Already have an account? <a href="#" data-bs-target="#SignIn" data-bs-toggle="modal">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade auth" id="SignIn" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalToggleLabel2">Sign In</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('custom_login.post')}}">
                    @csrf
                <div class="form-group">
                        <label class="form_img"><img src="{{asset('assets/front/img/phone.png')}}"></label>
                        <input type="number" class="form-control" name="mobile" id="exampleInputMobile2" aria-describedby="emailHelp" placeholder="Mobile Number">
                    </div>
                    <button class="btn-primary" type="button" id="Login">Sign In</button>
                    <div class="foot_txt">
                        <p>Don't have an account? <a href="#" data-bs-target="#SignUp" data-bs-toggle="modal">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@include('front.layouts.footer')
 <!-- Footer End Here -->
 <!-- Bootstrap Script -->
<script type="text/javascript" src="{{asset('assets/front/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.10/dist/sweetalert2.all.min.js"></script>
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

//Register
    $(document).on("click","#Register",function() {

   if(!validateForm($(this).closest('form')))
    {
                  $.ajax({

              url: $(this).closest('form').attr('action'),

              data: $(this).closest('form').serialize(),

              type: "POST",

              dataType: 'json',

              success: function (data) {

                if(!data.status)
                {
                $(this).closest('form').find('.error').remove();
                $.each(data.errors, function (key, val) {

                $(`input[name="`+key+`"]`).after(`<span class="error text-danger">`+val[0]+`</span>`);    

                });


                }
                else
                    {
                    Swal.fire({
                    title: "Success!",
                    text: data.message,
                    icon: "success"
                    })

                    }           

              }

          });


    }

    });
    
    //Login
    $(document).on("click","#Login",function() {

   if(!validateForm($(this).closest('form')))
    {
                  $.ajax({

              url: $(this).closest('form').attr('action'),

              data: $(this).closest('form').serialize(),

              type: "POST",

              dataType: 'json',

              success: function (data) {

                if(!data.status)
                {
                $(this).closest('form').find('.error').remove();
                $.each(data.errors, function (key, val) {

                 $(`input[name="`+key+`"]`).after(`<span class="error text-danger">`+val[0]+`</span>`);    

                });


                }
                else
                    {
Swal.fire({
  title: 'Success!',
  text: 'Login successfully.',
  icon: 'success',
  confirmButtonText: 'OK'
}).then((result) => {
  if (result.isConfirmed) {
    location.reload();
  }
});

                   }         

              }

          });


    }

    });

});
document.addEventListener("contextmenu", function (e){
    e.preventDefault();
},false);


function validateForm(form)
{
    $(form).find('.error').remove();
    var error = false;
    $(form).find('input').each(function(index) {

        var inputValue = $(this).val();
        var placeholder = $(this).attr('placeholder');
        if(inputValue=='')
        {
            $(this).after(`<span class="error text-danger">`+placeholder+` is required</span>`);
            error = true;
        }
});
   return error;

}

function playAudio(audio,btn)
{
    if(!loggedIn)
    {
var SignIn = new bootstrap.Modal(document.getElementById('SignIn'))
SignIn.show()

    }
    else{
    document.querySelectorAll('.audio-player').forEach(a => {
        if (a !== audio) {
            a.pause();
            a.currentTime = 0;
        }
    });

    if (audio.paused) {
        audio.play();
    } else {
        audio.pause();
    }


    }
}
</script>
</body>
</html>
