<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<marquee>This is the commercial message of the home page that can be customized... This is the commercial message of the home page that can be customized... This is the commercial message of the home page that can be customized...</marquee>
<!-- HERO SECTION -->
<div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
    <section class="home_banner">
        <div class="hero_wrapper">
            <div class="hero_section">
<!--                 <img src="<?php echo e(asset('assets/front/img/hero.jpg')); ?>" alt="Meditation Image">
                <a class="popup-youtube" href="https://www.youtube.com/watch?v=pBFQdxA-apI"><img src="<?php echo e(asset('assets/front/img/play.png')); ?>" class="play_btn"></a> 
 -->            
<video width="100%" controls id="videoId">
  <source src="<?php echo e(asset('assets/front/Dhyanam_one.mp4')); ?>" type="video/mp4">
</video>

</div>
            <div class="chat_box">
                <div class="chat_head">
                    <p>Powered by <strong>Sathguru Sivananda Murthy Garu</strong></p>
                </div>
                <div class="msg_container">
                    <div class="msg">
                        <p>Hello there, this is just an example, <b>it’s not a real chat</b></p>
                    </div>
                    <div class="msg">
                        <p>This is the commercial message of the home page that can be customized...</p>
                    </div>
                    <div class="msg">
                        <p>This is the commercial message of the home page that can be customized...</p>
                    </div>
                    <div class="input-group type_msg">
                        <input class="form-control" placeholder="Type message...">
                        <button class="btn-primary text-white"><img src="<?php echo e(asset('assets/front/img/send.png')); ?>"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instructors">
        <div class="instructors_wrapper">
            <?php $__currentLoopData = $meditaions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$meditaion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="instructors_bx">
                <div class="instructor_img_bx">
                    <img src="<?php echo e(asset('uploads/'.$meditaion->image)); ?>" class="instructors_img" alt="">
                    <?php if($meditaion->audio): ?>
                    <div class="track">
                        <audio class="audio-player">
                            <source src="<?php echo e(asset('uploads/'.$meditaion->audio)); ?>" type="audio/mpeg">
                        </audio>
                        <a onclick="playAudio(this.previousElementSibling, this)"><img src="<?php echo e(asset('assets/front/img/audio.png')); ?>"></a>
                        

                        <!-- <a><img src="<?php echo e(asset('assets/front/img/video-play.png')); ?>"></a> -->
                    </div>
                    <?php endif; ?>
                </div>
                <h6><?php echo e($meditaion->name); ?></h6>
                <?php echo substr($meditaion->desc,0,100); ?>   <a data-bs-toggle="modal" href="#about<?php echo e($meditaion->id); ?>" role="button">Read More...</a>
                <div class="modal fade about_model" id="about<?php echo e($meditaion->id); ?>" aria-hidden="true" aria-labelledby="about1Label" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="about1Label">About <?php echo e($meditaion->name); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $meditaion->desc; ?>

            </div>
        </div>
    </div>
</div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <!-- <section class="mid_img">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <img src="<?php echo e(asset('assets/front/img/meditation.jpeg')); ?>">
                </div>
            </div>
        </div>
    </section> -->

    <section class="schedule" id="scrollspyHeading2">
        <div class="container">
            <div class="row align-items-center">
                <img src="<?php echo e(asset('assets/front/img/yoga1.png')); ?>" class="yoga_img">
                <div class="col-sm-12 col-md-8 col-lg-5">
                    <div class="schedule_box">
                        <h2>Schedule</h2>
                        <div class="schedule_time">
                            <p><strong>7AM:</strong> <span>Pranayama <a class="audio_play"><img src="<?php echo e(asset('assets/front/img/audio.png')); ?>"></a></span></p>
                            <p><strong>2AM:</strong> <span>Pranayama <a class="audio_play"><img src="<?php echo e(asset('assets/front/img/audio.png')); ?>"></a></span></p>
                            <p><strong>7AM:</strong> <span>Dhyanam <a class="audio_play"><img src="<?php echo e(asset('assets/front/img/audio.png')); ?>"></a></span></p>
                            <p><strong>8AM:</strong> <span>Pranayama <a class="audio_play"><img src="<?php echo e(asset('assets/front/img/audio.png')); ?>"></a></span></p>
                            <p><strong>10AM:</strong> <span>Discourse <a class="audio_play"><img src="<?php echo e(asset('assets/front/img/audio.png')); ?>"></a></span></p>
                        </div>
                        
                        <a class="btn-primary text-white mt-2" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Register Now</a>
                        <!-- <a class="btn-primary text-white mt-2" data-toggle="modal" data-target="#exampleModal">Register Now</a> -->
                        
                        
                    </div>
                </div>
                <img src="<?php echo e(asset('assets/front/img/yoga2.png')); ?>" class="yoga_img">
            </div>
        </div>
    </section>

    
</div>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('front.layouts.front-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u691775676/domains/sivanandadhyanam.in/public_html/resources/views/front/index.blade.php ENDPATH**/ ?>