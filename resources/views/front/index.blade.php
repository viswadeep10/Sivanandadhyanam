@extends('front.layouts.front-layout')
@section('title', 'Home')

@section('content')
<!-- HERO SECTION -->
<section class="home_banner">
    <div class="hero_wrapper">
        <div class="hero_section">
            <img src="img/hero.jpg" alt="Meditation Image">
            <a class="popup-youtube" href="https://www.youtube.com/watch?v=pBFQdxA-apI"><img src="{{asset('assets/front/img/play.png')}}" class="play_btn"></a> 
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
                    <button class="btn-primary text-white"><img src="{{asset('assets/front/img/send.png')}}"></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="instructors">
    <div class="instructors_wrapper">
        <div class="instructors_bx">
            <img src="{{asset('assets/front/img/img1.png')}}" class="instructors_img" alt="">
            <h5 class="instructors_rating">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
            </h5>
            <h6>Instructors</h6>
            <p>It is a long-established fact that a reader will be distracted by the readable content...</p>
        </div>
        <div class="instructors_bx">
            <img src="{{asset('assets/front/img/img2.png')}}" class="instructors_img" alt="">
            <h5 class="instructors_rating">
               <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
            </h5>
            <h6>Instructors</h6>
            <p>It is a long-established fact that a reader will be distracted by the readable content...</p>
        </div>
    </div>
    <div class="instructors_wrapper">
        <div class="instructors_bx">
            <img src="{{asset('assets/front/img/img3.png')}}" class="instructors_img" alt="">
            <h5 class="instructors_rating">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
            </h5>
            <h6>Instructors</h6>
            <p>It is a long-established fact that a reader will be distracted by the readable content...</p>
        </div>
        <div class="instructors_bx">
            <img src="{{asset('assets/front/img/img4.png')}}" class="instructors_img" alt="">
            <h5 class="instructors_rating">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
                <img src="{{asset('assets/front/img/star.png')}}">
            </h5>
            <h6>Instructors</h6>
            <p>It is a long-established fact that a reader will be distracted by the readable content...</p>
        </div>
    </div>
</section>

<section class="schedule">
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{asset('assets/front/img/yoga1.png')}}" class="yoga_img">
            <div class="col-sm-12 col-md-8 col-lg-5">
                <div class="schedule_box">
                    <h2>Schedule</h2>
                    <div class="schedule_time">
                        <p><strong>7AM:</strong> Pranayama</p>
                        <p><strong>2AM:</strong> Pranayama</p>
                        <p><strong>7AM:</strong> Dhyanam</p>
                        <p><strong>8AM:</strong> Pranayama</p>
                        <p><strong>10AM:</strong> Discourse</p>
                    </div>
                    
                    <a class="btn-primary text-white mt-2" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Register Now</a>
                    <!-- <a class="btn-primary text-white mt-2" data-toggle="modal" data-target="#exampleModal">Register Now</a> -->
                    
                    
                </div>
            </div>
            <img src="img/yoga2.png" class="yoga_img">
        </div>
    </div>
</section>
@endsection
 