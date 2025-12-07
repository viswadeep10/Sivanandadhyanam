<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" href="<?php echo e(asset('assets/backend/images/favicon.png')); ?>">

  <!-- plugin css -->
  <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/%40mdi/font/css/materialdesignicons.min.css')); ?>">
  <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.css')); ?>">

  <!-- end plugin css -->
  <!-- common css -->
    <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/backend/css/app.css')); ?>">
    <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/select2/css/select2.min.css')); ?>">
    <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/summernote/summernote-bs4.css')); ?>">

  <!-- end common css -->
  <script src="<?php echo e(asset('assets/backend/js/app.js')); ?>"></script>

  </head>
<body>

  <div class="container-scroller" id="app">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="#">
      <img src="<?php echo e(asset('assets/backend/images/logo.png')); ?>" alt="logo" /> </a>
    <a class="navbar-brand brand-logo-mini" href="#">
      <img src="<?php echo e(asset('assets/backend/images/logo.png')); ?>" alt="logo" /> </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
     
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex"><?php echo e(Auth::user()->name); ?></span>
          <img class="img-xs rounded-circle" src="<?php echo e(asset('assets/backend/images/profile.png')); ?>" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <a class="dropdown-item p-0">
            <div class="d-flex border-bottom w-100 justify-content-center">
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
              </div>
            </div>
          </a>
          <a class="dropdown-item mt-2"> Manage Accounts </a>
          <a class="dropdown-item"> Change Password </a>
          <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">
    Sign Out
</a>    
<form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
    <?php echo e(csrf_field()); ?>

</form>

        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu icon-menu"></span>
    </button>
  </div>
</nav>    <div class="container-fluid page-body-wrapper">
    
<div class="theme-setting-wrapper">
  <div id="color-settings" class="settings-panel">
    <i class="settings-close mdi mdi-close"></i>
    <div class="d-flex align-items-center justify-content-between border-bottom">
      <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Skins</p>
    </div>
    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
      <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
    </div>
    <div class="sidebar-bg-options" id="sidebar-dark-theme">
      <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
    </div>
    <p class="settings-heading font-weight-bold mt-2">Header Skins</p>
    <div class="color-tiles mx-0 px-2">
      <div class="tiles primary"></div>
      <div class="tiles success"></div>
      <div class="tiles warning"></div>
      <div class="tiles danger"></div>
      <div class="tiles pink"></div>
      <div class="tiles info"></div>
      <div class="tiles dark"></div>
      <div class="tiles default"></div>
    </div>
  </div>
</div>
<div id="right-sidebar" class="settings-panel">
  <i class="settings-close mdi mdi-close"></i>
  <div class="d-flex align-items-center justify-content-between border-bottom">
    <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
  </div>
  <ul class="chat-list">
    <li class="list active">
      <div class="profile">
        <img src="<?php echo e(asset('assets/backend/images/faces/face3.jpg')); ?>" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Thomas Douglas</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">19 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="<?php echo e(asset('assets/backend/images/faces/face2.jpg')); ?>" alt="image">
        <span class="offline"></span>
      </div>
      <div class="info">
        <div class="wrapper d-flex">
          <p>Catherine</p>
        </div>
        <p>Away</p>
      </div>
      <div class="badge badge-success badge-pill my-auto mx-2">4</div>
      <small class="text-muted my-auto">23 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="<?php echo e(asset('assets/backend/images/faces/face3.jpg')); ?>" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Daniel Russell</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">14 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="<?php echo e(asset('assets/backend/images/faces/face4.jpg')); ?>" alt="image">
        <span class="offline"></span>
      </div>
      <div class="info">
        <p>James Richardson</p>
        <p>Away</p>
      </div>
      <small class="text-muted my-auto">2 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="<?php echo e(asset('assets/backend/images/faces/face5.jpg')); ?>" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Madeline Kennedy</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">5 min</small>
    </li>
    <li class="list">
      <div class="profile">
        <img src="<?php echo e(asset('assets/backend/images/faces/face6.jpg')); ?>" alt="image">
        <span class="online"></span>
      </div>
      <div class="info">
        <p>Sarah Graves</p>
        <p>Available</p>
      </div>
      <small class="text-muted my-auto">47 min</small>
    </li>
  </ul>
</div>  

<?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   
<div class="main-panel">
        <div class="content-wrapper">
          <?php if(Session::has('success')): ?>
          <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

          </div>
          <?php endif; ?>
          <?php if(Session::has('error')): ?>
          <div class="alert alert-danger"></div>
            <?php echo e(Session::get('error')); ?>

          <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
        </div>
           </div>
    </div>
  </div>

  <!-- base js -->
    <script src="<?php echo e(asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
      <script src="<?php echo e(asset('assets/backend/js/off-canvas.js')); ?>"></script>
  <!-- end base js -->


    <script src="<?php echo e(asset('assets/backend/js/dashboard.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert.min.js')); ?>" type="text/javascript"></script>

    <script>
           function deleteRecord(id) {

      event.preventDefault(); // prevent form submit

      var form = $('#delete-'+id); // storing the form

      swal({

             title: "Are you sure?",

             text: "Once deleted, you will not be able to recover this imaginary file!",

             icon: "warning",

             buttons: true,

             dangerMode: true,

           })

          .then((willDelete) => {

               if (willDelete) {

                     form.submit();

               } else {

                      swal("Your imaginary file is safe!");

           }

        });

}
  if ($(".js-example-basic-single").length) {
    $(".js-example-basic-single").select2();
  }

  /*Summernote editor*/
  if ($(".summernote").length) {
    $('.summernote').summernote({
      height: 300,
      tabsize: 2
    });
  }
    </script>
</body>

</html><?php /**PATH /home/u691775676/domains/sivanandadhyanam.in/public_html/resources/views/admin/layouts/admin-layout.blade.php ENDPATH**/ ?>