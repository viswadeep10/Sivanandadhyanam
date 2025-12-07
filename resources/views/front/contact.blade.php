@extends('front.layouts.front-layout')
@section('title', 'Contact us')

@section('content')
    <!-- Page Content -->
  <section class="hero common-page contact-banner">
    <div class="container">
      <div class="hero-content">
        <h1>Contact Us</h1>
        <p class="breadcrumbs"><span><a href="{{url('/')}}">Home <i class="fa-solid fa-chevron-right"></i></i></a></span>
          <span>Contact us</span>
        </p>
      </div>
    </div>
  </section>

  <section class="ignou-contact-page">
    <div class="container">
      <div class="contact-container">
        <div class="contact-image">
          <img src="{{asset('assets/front/images/customer-support-img.webp')}}" alt="contact-img">
        </div>
        <div class="contact-form">
          <h2>Contact Form</h2>
          <form action="{{route('enquiry')}}" method="post" class="enquiry">
            @csrf
            <label for="name">Name <span class="required">*</span></label>
            <input type="text" id="name" name="name" placeholder="Your Name">

            <label for="email">Email <span class="required">*</span></label>
            <input type="email" id="email" name="email" placeholder="Your Email">

            <label for="phone">Phone <span class="required">*</span></label>
            <input type="tel" id="phone" name="phone" placeholder="Your Phone no.">

            <label for="message">Message <span class="required">*</span></label>
            <textarea id="message" rows="5" name="message" placeholder="Your Message"></textarea>
            <p id="commentCount" class="wordscount-num">0 / 100 words</p>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
      <div class="contact-info">
        <div class="info-box">
          <i class="fas fa-phone"></i>
          <h4>CALL US</h4>
          <p><a href="tel:9784428286">9784428286</a><br>
            <a href="mailto:help@ignoubook.net">help@ignoubook.net</a>
          </p>
        </div>
        <!-- <div class="info-box">
          <i class="fas fa-map-marker-alt"></i>
          <h4>LOCATION</h4>
          <p> 540, ignou eduction, Road no 5 ,<br>India 302554</p>
        </div> -->
        <div class="info-box">
          <i class="fas fa-clock"></i>
          <h4>HOURS</h4>
          <p>Every Day: 7AM – 8PM (Lunch 1:00 PM - 2:00 PM)</p>
        </div>
      </div>
    </div>
  </section>

  <!-- for contact page form word count limitation -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
  const commentBox = document.getElementById('message');
  const commentCountDisplay = document.getElementById('commentCount');

  commentBox.addEventListener('input', () => {
    let commentWords = commentBox.value.trim().split(/\s+/);
    let commentCount = commentBox.value.trim() === '' ? 0 : commentWords.length;

    if (commentCount > 100) {
      commentBox.value = commentWords.slice(0, 100).join(" ");
      commentCount = 100;
    }

    commentCountDisplay.textContent = `${commentCount} / 100 words`;
  });
});
  </script>
  <!-- <section class="contact-map">
    <div class="container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.2156898989538!2d77.1961571102269!3d28.50315768984434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce1de5ee6fbed%3A0x17e4392a594a1e19!2sIndira%20Gandhi%20National%20Open%20University!5e0!3m2!1sen!2sin!4v1747071203029!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section> -->
  <!-- Page Content End Here -->

@endsection
 