@extends('front.layouts.front-layout')
@section('title', 'About')

@section('content')
    <!-- Page Content -->
  <section class="hero common-page about-page">
    <div class="container">
      <div class="hero-content">
        <h1>About Us</h1>
        <p class="breadcrumbs"><span><a href="{{url('/')}}">Home <i class="fa-solid fa-chevron-right"></i></i></a></span>
          <span>About</span>
        </p>
      </div>
    </div>
  </section>

  <section class="ignou-about">
    <div class="container">
      <div class="col-box">
        <div class="about-left">
          <img src="{{asset('assets/front/images/about-img.jpg')}}" alt="about-img">
        </div>
        <div class="about-right">
          <!-- <h2>Empowering Learning Beyond the Classroom</h2> -->
          <h2>Study Smarter with Reliable <span class="ig-domain">IGNOUBook</span> Assignment Help</h2>
          <p><strong class="ig-domain">ignoubook.net</strong> is a rapidly growing online platform designed to support IGNOU students with high-quality assignment solution guides and personalized academic assistance.</p>
          <p>Our platform was created with a clear mission: to help IGNOU learners better understand their coursework, prepare more effectively for assignments, and receive reliable guidance throughout their academic journey.</p>
          <p>All solutions offered on our platform are strictly for educational reference purposes. Students are advised to use them as a learning tool and create their own original assignments in line with IGNOU’s academic integrity guidelines.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="ig-tagline-sec">
    <div class="container">
      <h2>At <span class="ig-domain">ignoubook.net</span>, we don’t just provide solutions — we build understanding.</h2>
    </div>
  </section>

  <section class="ig-feature-sec">
    <div class="container">
      <h2 class="title">What Makes <span class="ig-domain">ignoubook.net</span> Different?</h2>

      <div class="feature-card">
        <h3>Exclusive Expert Opinion Customer Care Service</h3>
        <ul>
          <li>Our <strong>Expert Opinion Service</strong> is available <strong>only on <span class="ig-domain">ignoubook.net</span></strong>—you won’t find this level of personalized support anywhere else.</li>
          <li>Students can submit their academic doubts or assignment-related queries directly through our website.</li>
          <li>Each query is carefully reviewed and answered by a <strong>qualified subject expert</strong>, ensuring <strong>accurate, thoughtful, and helpful responses</strong>.</li>
          <li>Whether you’re confused about a concept, assignment format, or topic relevance, our experts provide <strong>the best possible solutions</strong>.</li>
        </ul>
      </div>

      <div class="feature-card">
        <h3>Daily Availability – 7 Days a Week</h3>
        <ul>
          <li>Our expert panel is <strong>available every single day</strong>, including weekends, to support students in real time.</li>
          <li>We believe academic help shouldn't be limited to working hours, so we strive to offer support <strong>whenever you need it most</strong>.</li>
        </ul>
      </div>

      <div class="feature-card">
        <h3>Affordable, Paid Support Service</h3>
        <ul>
          <li>This premium service is available at a <strong>very nominal fee</strong>, making it accessible to all students while ensuring high-quality expert attention.</li>
          <li>The small fee allows us to maintain a team of dedicated experts and provide <strong>fast, reliable, and personalized service</strong>.</li>
        </ul>
      </div>

      <div class="feature-card">
        <h3>Accurate and Reliable Responses</h3>
        <ul>
          <li>Our experts do not offer generic answers—they provide <strong>context-specific replies tailored to each student's query</strong>.</li>
          <li>We focus on helping students <strong>understand concepts clearly</strong>, rather than simply giving away ready-made answers.</li>
        </ul>
      </div>

      <div class="feature-card">
        <h3>Trust and Satisfaction</h3>
        <ul>
          <li>Thousands of students have already benefited from our expert guidance and support services.</li>
          <li>We take pride in building <strong>long-term trust</strong> with students by consistently delivering quality, value, and academic clarity.</li>
        </ul>
      </div>

      <div class="feature-card">
        <h3>Student-First Approach</h3>
        <ul>
          <li>Every feature on <span class="ig-domain">ignoubook.net</span>, especially our Expert Opinion service, is designed with the student's success in mind.</li>
          <li>We are committed to <strong>uplifting the academic journey</strong> of IGNOU learners through honest support and expert-led assistance.</li>
        </ul>
      </div>
    </div>
  </section>
  <!-- <section class="about-counter">
    <div class="container">
      <div class="counter-outer">
        <div class="counter-box">
          <div class="counter" data-target="800">0</div>
          <div class="label">Happy Clients</div>
        </div>
        <div class="counter-box">
          <div class="counter" data-target="100">0</div>
          <div class="label">Cups of Coffee</div>
        </div>
        <div class="counter-box">
          <div class="counter" data-target="150">0</div>
          <div class="label">Projects</div>
        </div>
        <div class="counter-box">
          <div class="counter" data-target="300">0</div>
          <div class="label">Workking Days</div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- <section class="about-team">
    <div class="container">
       <h2>Meet the team</h2>
      <div class="team-outer">
        <div class="team-card">
          <img src="{{asset('assets/front/images/teamimg1.jpg')}}" alt="teamimg1">
          <div class="team-info">
            <h3>Nat Reynolds</h3>
            <p>Worldwide Partner</p>
            <div class="team-social">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>

        <div class="team-card">
          <img src="{{asset('assets/front/images/teamimg2.jpg')}}" alt="teamimg2">
          <div class="team-info">
            <h3>Jennie Roberts</h3>
            <p>Partner</p>
            <div class="team-social">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>

        <div class="team-card">
          <img src="{{asset('assets/front/images/teamimg3.jpg')}}" alt="teamimg3">
          <div class="team-info">
            <h3>Mila Parker</h3>
            <p>Partner</p>
            <div class="team-social">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>

        <div class="team-card">
          <img src="{{asset('assets/front/images/teamimg4.jpg')}}" alt="teamimg4">
          <div class="team-info">
            <h3>Peter Howard</h3>
            <p>Partner</p>
            <div class="team-social">
              <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section> -->
  <!-- Page Content End Here -->

@endsection
 