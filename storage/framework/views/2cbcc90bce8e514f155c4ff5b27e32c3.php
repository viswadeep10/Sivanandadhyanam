<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" href="<?php echo e(asset('assets/front/img/favicon.ico')); ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('assets/front/css/bootstrap.min.css')); ?>?ver=<?php echo time()?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/front/css/magnific-popup.css')); ?>?ver=<?php echo time()?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/front/css/style.css')); ?>?ver=<?php echo time()?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.10/dist/sweetalert2.min.css" rel="stylesheet">

    <script>
        var loggedIn = <?php echo e(auth()->check() ? 'true' : 'false'); ?>;
    </script>
    
</head>

<body>
<?php echo $__env->make('front.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<div class="modal fade auth" id="SignUp" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalToggleLabel">Sign Up</h5>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo e(route('custom_register.post')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label class="form_img"><img src="<?php echo e(asset('assets/front/img/user.png')); ?>"></label>
                        <input type="text" class="form-control" name="name" id="fullname" aria-describedby="emailHelp" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label class="form_img"><img src="<?php echo e(asset('assets/front/img/email.png')); ?>"></label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label class="form_img"><img src="<?php echo e(asset('assets/front/img/phone.png')); ?>"></label>
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
                <form method="post" action="<?php echo e(route('custom_login.post')); ?>">
                    <?php echo csrf_field(); ?>
                <div class="form-group">
                        <label class="form_img"><img src="<?php echo e(asset('assets/front/img/phone.png')); ?>"></label>
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




<?php echo $__env->make('front.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
 <!-- Footer End Here -->
 <!-- Bootstrap Script -->
<script type="text/javascript" src="<?php echo e(asset('assets/front/js/jquery-3.7.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.26.10/dist/sweetalert2.all.min.js"></script>
      <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>

<script>
$(function() {
    // $('.popup-youtube, .popup-vimeo').magnificPopup({
    //     disableOn: 700,
    //     type: 'iframe',
    //     mainClass: 'mfp-fade',
    //     removalDelay: 160,
    //     preloader: false,
    //     fixedContentPos: false
    // });

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
// document.addEventListener("contextmenu", function (e){
//     e.preventDefault();
// },false);


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
        audio.nextElementSibling.querySelector('.play').classList.add("d-none");
        audio.nextElementSibling.querySelector('.pause').classList.remove("d-none");
    } else {
        audio.pause();
         audio.nextElementSibling.querySelector('.pause').classList.add("d-none");
        audio.nextElementSibling.querySelector('.play').classList.remove("d-none");
    }


    }
}

//chat 
if(loggedIn) {
 // CSRF
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    Pusher.logToConsole = true;

    // Init Pusher
    var pusher = new Pusher("<?php echo e(config('broadcasting.connections.pusher.key')); ?>", {
        cluster: "<?php echo e(config('broadcasting.connections.pusher.options.cluster')); ?>",
        authEndpoint: "<?php echo e(url('/broadcasting/auth')); ?>",
           auth: {
        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content')
        }
    }
    });

    let chatId = "<?php echo e($chat->id ?? 0); ?>";
    let userId = "<?php echo e(auth()->id()); ?>";

    let channel = pusher.subscribe("private-chat." + chatId);
        console.log(pusher);

    channel.bind("message.sent", function(data) {

        let type = data.message.sender_id == userId ? 'sender' : 'receiver';

        $('.messages').append(`
            <div class="msg ${type}">
                ${data.message.message}
            </div>
        `);

    });
}
function sendMessage(chat_id)
{
  if(!loggedIn)
    {
var SignIn = new bootstrap.Modal(document.getElementById('SignIn'))
SignIn.show()
    } 
    
     let msg = $('#msg').val().trim();
        if(!msg) return;

        $.ajax({
        url : "<?php echo e(route('message')); ?>",
        data : {
            "_token": "<?php echo e(csrf_token()); ?>",
            chat_id: chat_id,
            message: msg
        },
        type : 'POST',
        dataType : 'json',
        success : function(result)
        {
        $('.messages').append(`
            <div class="msg sender">${msg}</div>
        `);
        $('#msg').val('');

        }
    });
}
</script>
</body>
</html>
<?php /**PATH /home/u691775676/domains/sivanandadhyanam.in/public_html/resources/views/front/layouts/front-layout.blade.php ENDPATH**/ ?>