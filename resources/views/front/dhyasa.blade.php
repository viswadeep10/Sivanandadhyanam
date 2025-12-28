@extends('front.layouts.front-layout')
@section('title', 'Dhyasa')


@section('content')
<section class="instructors instructors_detail">
    <div class="instructors_wrapper">
        <div class="instructors_bx" style="width:100%">
            <div class="instructor_img_bx" >
                <img src="{{asset('assets/front/img/meditation.jpeg')}}" class="instructors_img" alt="">
                <div class="track">
                    <audio class="audio-player">
                            <source src="{{asset('assets/front/dhyasa.mp3')}}" type="audio/mpeg">
                        </audio>
                    <a onclick="playAudio(this.previousElementSibling, this)" href="javascript:">  
                         <img src="{{asset('assets/front/img/audio.png')}}" class="play">
                        <img src="{{asset('assets/front/img/pause.png')}}" class="pause d-none">
                    </a>
                    <!-- <a ><img src="{{asset('assets/front/img/video-play.png')}}"></a> -->
                </div>
            </div>
            <h6>Dhyasa</h6>
            <p>Guruvugaru guided that Dhyasa or attention is necessary to achieve the ultimate. The Dhyasa has to be non-stop all the time and everywhere about the god or seeking moksham.</p>
            <p>A day to day example of Dhyasa is if a person is planning to buy a home or any other valuable thing he is completely occupied in those thoughts until the desire is realised.</p>
            <p>Dhyasa is an attitude which every seeker has to imbibe and thrive for ultimate merger.</p>
            <p>The Dhyasa is superior to meditation as it is done only for some time and later on the mind gets occupied with worldly matters. When the mind sets in Dhyasa there is nothing other than the ultimate.</p>
        </div>
    </div>
</section>

<!-- <section class="schedule" id="scrollspyHeading2">
    <div class="container">
        <div class="row justify-content-center">
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
                    <a class="btn-primary text-white mt-2">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section> -->

@endsection
 