@extends('front.layouts.front-layout')
@section('title', 'Home')

@section('content')
  <style>
    .profile-card{position: relative;}
    .profile-card #social-links{position: absolute; top: 12%; right: 10%; z-index: 2; width: max-content;}
    .profile-card #social-links li a{    
      background: #e91e63;
      color: white;
      border-radius: 50%;
      display: inline-block;
      width: 25px;
      height: 25px;
      text-align: center;
      align-content: center;
      margin-bottom: 20px;
    }
    .share-sec .share-buttons {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 2;
    width: max-content;
}
    .share-buttons li a svg{width: 15px; height:15px;}
    .share-buttons li a:hover{background: #000000}
     .share-buttons li a{    
      background: #e91e63;
      color: white;
      border-radius: 50%;
      display: inline-block;
      width: 25px;
      height: 25px;
      text-align: center;
      align-content: center;
      margin-bottom: 20px;
    }
    .share-buttons li a svg{width: 15px; height:15px;}
    .share-buttons li a:hover{background: #000000}
  </style>
   <section class="form-program-sec">
    <div class="container">
      <div class="row">
        <div class="degree-form-wrap">
        <div class="degree-form">
          <h3>Online Form Fill-up Services</h3>
          <div class="text-size-16">फॉर्म के आधार पर फीस मात्र ₹ 45 से शुरू</div>
          <a href="#form-fillup-service" class="form-fillup-btn">Book Form Service</a>
          <h1>“सवाल आपके - जवाब हमारे”</h1>
          <form action="{{route('degree')}}">
            <label>Salect A Question</label>
            <div class="select-field">
              <select name="category" onchange="this.form.submit()" class="form-control select2" required>
                <option value="">Salect A Question</option>
                @foreach($categories as $key=>$cat)
                <option value="{{encrypt($cat->id)}}">{{($key+1).'.'.$cat->name}}</option>
                @endforeach
              </select>
            </div>
          </form>
          <!-- <div class="ig-tagline">At <span class="ig-domain">ignoubook.net</span>, we don’t just provide solutions — we build understanding.</div> -->
        </div>
        </div>
        
        <div class="program">
          <h2 class="blinking-text">Solved Assignments & <span class="ib-text-pink">Projects</span> / असाइनमेंट & <span class="ib-text-pink">प्रोजेक्ट</span></h2>
          <div class="col-box">
            @foreach($programes as $program)

            <div class="profile-card">
          <a href="{{url('assignment/'.$program->slug)}}">
        <div class="feature-box fw-box">
          <div class="assignment-img"> <img src="{{$program->image ? asset('storage/uploads/'.$program->image) : asset('assets/front/images/assignmnet-img1.jpg')}} " alt="check.png"> </div>
          <h4>{{$program->name}}</h4>
          <!-- <p>Explores how digital tools transform learning environments, improve access, and enhance student engagement
            worldwide.</p> -->
        </div> 
</a>
            {!! Share::page(url('assignment/'.$program->slug))->facebook()->twitter()->whatsapp() !!}
</div>
        @endforeach
      </div>
        </div>
      </div>
    </div>
   </section>

<section class="services-form form-program-sec" id="form-fillup-service">
  <div class="container">
    <div class="row">
      <div class="left">
    <div class="section-header">
      <h2 class="blinking-text">Online Form Fill-up Services</h2>
      <h3 class="">फॉर्म के आधार पर फीस मात्र ₹ 45 से शुरू</h3>
    </div>
    <form action="{{route('service')}}" class="degree-form service" method="post">
  @php
  $formUrl = 'https://ignoubook.net/?form=open';

$share1 = Share::page(urlencode($formUrl), 'Share this page');

$link = $share1->getRawLinks();

@endphp
<div class="share-sec">
<div class="share-buttons">
  <ul>
    <li>
    <a href="https://www.facebook.com/sharer/sharer.php?u=https://ignoubook.net?form=service" target="_blank">
      <svg class="svg-inline--fa fa-square-facebook" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="square-facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path></svg>

    </a>
  </li>
  <li>
    <a href="https://twitter.com/intent/tweet?text=Default+share+text&amp;url=https://ignoubook.net?form=service" target="_blank">
      <svg class="svg-inline--fa fa-twitter" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
    </a>
  </li>
  <li>
    <a href="https://wa.me/?text=https://ignoubook.net?form=service" target="_blank">
      <svg class="svg-inline--fa fa-whatsapp" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path></svg>
    </a>
  </li>
  </ul>
</div>
</div>


      @csrf
      <div class="inputs-wrapper">
      <div class="form-group">
        <label for="srvc-name">Name  / नाम <span class="required">*</span></label>
        <input type="text" id="srvc-name" name="name" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="srvc-mobile">Mobile no. / मोबाईल  न. <span class="required">*</span></label>
        <input type="tel" id="srvc-mobile" name="mobile" placeholder="Mobile no.">
      </div>
      <div class="form-group">
        <label for="srvc-email">Email id  / ई-मेल  <span class="required">*</span></label>
        <input type="email" id="srvc-email" name="email" placeholder="Email id">
      </div>
      <div class="form-group">
        <label for="srvc-program">Programme  / प्रोग्राम <span class="required">*</span></label>
        <input type="text" id="srvc-program" name="programme" placeholder="Programme">
      </div>
      <div class="form-group">
        <label for="srvc-enroll">Enrolment no./Control No.  / नामांकन संख्या या कंट्रोल न. <span class="required">*</span></label>
        <input type="text" id="srvc-enroll" name="enrolment_no" placeholder="Enrolment no./Control No.">
      </div>
      <div class="form-group">
        <label for="srvc-fillup">Select Online Form Fillup Service  / ऑनलाइन फॉर्म भरवाने की सेवा का चयन करें <span class="required">*</span></label>
        <div class="select-field">
          <select name="service" class="form-control select2" onchange='getFess(this,"{{route("getFess")}}")'>
            <option value="">Salect A Question</option>
            @foreach($services as $service)
            <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
          </select>
        </div>     

      </div>
      </div>
      <div class="form-group">
        <label for="srvc-details">Any Other Details / अन्य विवरण</label>
        <textarea name="other" id="srvc-details" placeholder="Any Other Details" maxlength="600"></textarea>
        <p id="wordCount" class="wordscount-num">0 / 100 words</p>
      </div>
      <div class="terms">
        <input type="checkbox" id="srvc-check">
        <span class="required">*</span>
        <label for="srvc-check">I accept all <a href="{{url('/term-conditions')}}" target="_blank">Terms & Conditions</a>.</label>
      </div>
      <div class="service-form-content">
        <ol>
          <li>आपका फॉर्म भुगतान के 24 घंटे के भीतर "इग्नू ऑनलाइन फॉर्म फिलअप सेवाएं" पर भरा जाएगा।</li>
          <li>फॉर्म सबमिट करते समय शिक्षार्थी को मूल दस्तावेज़ हमारी टीम को उपलब्ध कराना अनिवार्य है।</li>
          <li>यह शुल्क केवल हमारे ऑनलाइन फॉर्म भरने की सेवा के लिए लिया जाता है।</li>
          <li>आपका छात्र फॉर्म पूरा करेंगे और भुगतान रसीद तैयार करेंगे। आप इसे बिना किसी देरी के सीधे संबंधित इग्नू क्षेत्रीय केंद्र कार्यालय में जमा कर सकते हैं।</li>
          <li>इग्नू का कोर्स शुल्क या कोई अन्य आवश्यक शुल्क छात्र को इग्नू की आधिकारिक वेबसाइट पर लॉगिन करके स्वयं ही सीधे भुगतान करना होगा। फॉर्म भरते समय हम इग्नू के आधिकारिक प्लेटफ़ॉर्म का क्यूआर कोड प्रदान करेंगे, और फॉर्म भरने के बाद वह आपके व्हाट्सएप पर साझा कर दिया जाएगा।</li>
          <li>अंतिम भुगतान से पहले हम फॉर्म का पूरा प्रीव्यू शिक्षार्थी को दिखाएंगे। सभी विवरणों को ध्यानपूर्वक जांचना आवश्यक है।</li>
          <li>यदि भुगतान के बाद फॉर्म में कोई त्रुटि होती है, तो उसकी पूरी जिम्मेदारी केवल शिक्षार्थी की होगी।</li>
          <li>यदि हम किसी कारणवश आपका फॉर्म नहीं भर पाते हैं, तो आपकी फॉर्म भरने की शुल्क राशि 48 घंटे के भीतर वापस कर दी जाएगी।</li>
          <li>यदि कोई छात्र हमारी टीम या विशेषज्ञों के साथ अभद्र भाषा का प्रयोग करता है, तो हमें कॉल काटने का पूरा अधिकार है। इस स्थिति में, सेवा शुल्क भुगतान वापस नहीं किया जाएगा।</li>
        </ol>

        <ol>
          <li>Your form will be filled within 24 hours after payment through the "IGNOU Online Form Fill-up Services".</li>
          <li>Learners must submit original documents to our team at the time of form submission.</li>
          <li>The fee charged is only for our online form fill-up service.</li>
          <li>We will complete your student form and prepare the payment receipt for you. You can then submit it directly to the concerned IGNOU Regional Centre office without delay.</li>
          <li>The IGNOU course fee or any other required charges must be paid directly by the student by logging in to IGNOU's official website. During the form-filling process, we will provide the official IGNOU platform’s QR code, and after the form is filled, it will be shared on your WhatsApp.</li>
          <li>We will show a full preview of the form before final submission. Learners must check all details carefully.</li>
          <li>If there are any mistakes in the form after payment, the learner will be fully responsible.</li>
          <li>If we are unable to fill your form, your form fill-up fee will be refunded within 48 hours.</li>
          <li>If a student uses abusive language, we reserve the right to disconnect the call immediately. In this situation, services charge payment will not refund.</li>
        </ol>
      </div>
        <button type="submit" value="Submit">BOOK Form Service</button>
    </form>
    </div>
    <div class="right">
      <!-- <ul>
        <li><a href="#">IGNOU Important Old question papers…..</a></li>
        <li><a href="#">Current Assignment question papers..</a></li>
      </ul> -->
      <h4>Current IGNOU Updates</h4>
      <ol>
        <li><a href="#">IGNOU Important Old question papers…..</a></li>
        <li><a href="#">Current Assignment question papers..</a></li>
        <li><a href="#">Result link.</a></li>
        <li><a href="#">Re-registration last date update</a></li>
        <li><a href="#">Admission last date update</a></li>
        <li><a href="#">Degree update</a></li>
        <li><a href="#">Entrance Update & others……</a></li>
      </ol>
    </div>
    </div>
  </div>
</section>
  <section class="ignou-about">
    <div class="container">
      <div class="col-box">
        <div class="about-left">
          <img src="{{asset('assets/front/images/about-img.webp')}}" alt="about-img">
          <div class="ig-tagline">At <span class="ig-domain">ignoubook.net</span>, we don’t just provide solutions — we build understanding.</div>
          <h2><span class="ig-domain">IGNOUBook.net</span> – Your Trusted Study Partner</h2>
          <p>We make IGNOU learning easier by providing expertly crafted solved assignments in both English and Hindi. Our solutions follow official IGNOU guidelines, helping you save time and study smarter. Whether you're facing tight deadlines or need reliable academic support, we’re here to help—instantly and stress-free. Join thousands of students succeeding with <span class="ig-domain">IGNOUBook.net</span>.</p>
            <h4>Expert Opinion & Student Support (Talking Time) on Call Facility– Only at <span class="ig-domain">IGNOUBook.net</span></h4>
            <p>At <span class="ig-domain">IGNOUBook.net</span>, we offer unmatched expert guidance through our exclusive "Talking Time" service. Get reliable updates on exams, results, admissions, projects, hall tickets, degrees, mark sheets, and official documents like transcripts or migration certificates.</p>
            <h4>Why Choose Our Expert Opinion Service?</h4>
            <ul>
              <li>•	Available only on <span class="ig-domain">IGNOUBook.net</span></li>
              <li>•	Submit doubts or queries directly through our website</li>
              <li>•	Responses by qualified subject experts</li>
              <li>•	Clear guidance on concepts, formats, and topics</li>
            </ul>
            <p>Experience personalized, accurate academic support—trusted by IGNOU students across India.</p>
          <a href="{{url('/about')}}" class="custom-btn">Learn More </a>
        </div>
        <div class="about-right">
          <div class="contact-form">
            <h3>Complaint Form</h3>
          <form action="{{route('save-complain')}}" method="post" class="save-complaint">
            @csrf
            <label for="name">Full Name <span class="required">*</span></label>
            <input type="text" name="name" id="name" placeholder="Full Name" >

            <label for="email">Email Id <span class="required">*</span></label>
            <input type="email" name="email" id="email" placeholder="Your Email" >

            <label for="phone">Mobile No <span class="required">*</span></label>
            <input type="number" name="phone" id="phone" placeholder="Mobile No">

            <label for="order_id">Order ID (if applicable)</label>
            <input type="text" name="order_id" id="order_id" placeholder="Order ID" >

            <label for="complain_type">Complaint type <span class="required">*</span></label>
            <select name="complain_type" id="complain_type" >
              <option value="">Select Complaint</option>
              <option value="Assignment Solution Related query">Assignment Solution Related query</option>
              <option value="Incomplete Or Not Available Application Form Related query">Incomplete Or Not Available Application Form Related query</option>
              <option value=" सवालआपके - जवाबहमारे  (Provide Serial No.) Related query">“ सवालआपके - जवाबहमारे ” (Provide Serial No.) Related query</option>
              <option value="Talking Time”Related query">“Talking Time”Related query</option>
              <option value="Login Related query">Login Related query</option>
              <option value="Payment Related query">Payment Related query</option>
              <option value="Referral Related query">Referral Related query</option>
              <option value="Any Other query">Any Other query</option>
            </select>

            <label for="complain">Complaint Detail</label>
            <!-- <input type="text" id="complain" name="complain" placeholder="Complaint Detail"> -->
            <textarea id="complain" name="complain" placeholder="Complaint Detail"></textarea>
            <p id="feedbackCount" class="wordscount-num">0 / 100 words</p>
            <button type="submit" value="Submit">Submit</button>
          </form>
        </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ignou-testimonials">
    <div class="container">
      <h2>What Our Clients Say</h2>
      <div class="assign-items testimonial-items swiper assignment_slider">
        <div class="swiper-wrapper">
          <div class="item swiper-slide">
            <p>"Your fast replies make IGNOU BOOK channel feels like a real community. It’s amazing how involved you are—keep it up!" "Thanks for responding to my comment so quickly! It means a lot when creators actually listen and connect."</p>
            <div class="client-info-wrap">
              <div class="client-img"><img src="{{asset('assets/front/images/Deepti-Sharma.jpg')}}"></div>
              <div class="client-info">
                <span class="name">Deepti Sharma</span>
                <span class="designation">(Master Degree Programme) Manali, Himachal Pradesh</span>
              </div>
            </div>
          </div>
          <div class="item swiper-slide">
            <p>"ऐसा लगता है जैसे हर वीडियो सिर्फ मेरी समस्या के लिए ही बनाया गया हो। "आपके वीडियो किसी किताब से नहीं, बल्कि छात्रों की ज़रूरतों से बने लगते हैं। बहुत उपयोगी चैनल हैं !" "आप छात्रों की समस्याओं को बिल्कुल सही समझते हैं और उसके लिए अलग वीडियो बनाना वाकई काबिले तारीफ है।"<br> आपका बहुत-बहुत धन्यवाद!"</p>
            <div class="client-info-wrap">
              <div class="client-img"><img src="{{asset('assets/front/images/gita-kumari.jpg')}}"></div>
              <div class="client-info">
                <span class="name">Gita Kumari</span>
                <span class="designation">(PG Diploma Programme) Rajasthan</span>
              </div>
            </div>
          </div>
          <div class="item swiper-slide">
            <p>"मैंने जब भी IGNOU की किताबें या असाइनमेंट को लेकर कोई समस्या महसूस की, इस चैनल ने हर बार मेरी मदद की। कंटेंट इतना स्पष्ट और सटीक है कि और कहीं जाने की ज़रूरत नहीं पड़ती।"<br> "IGNOU के छात्रों की असली जरूरतों को यह चैनल बखूबी समझता है। हर विषय पर अलग-अलग वीडियो बनाकर जो मार्गदर्शन दिया गया है, वह वाकई काबिले तारीफ है।"<br> "IGNOU की दुनिया में अगर कोई चैनल Perfect है, तो यही है! हर टॉपिक, हर डाउट का हल, वह भी आसान भाषा में। धन्यवाद इस अद्भुत प्रयास के लिए।"</p>
            <div class="client-info-wrap">
              <div class="client-img"><img src="{{asset('assets/front/images/bornali.jpg')}}"></div>
              <div class="client-info">
                <span class="name">BORNALI BORGOHAIN</span>
                <span class="designation">(Master Degree Programme) Assam</span>
              </div>
            </div>
          </div>
          <div class="item swiper-slide">
            <p>"IGNOU से जुड़ी हर समस्या का समाधान इस चैनल पर मिलता है। यह सच में हर IGNOU छात्र के लिए एक perfect match है!"<br> "IGNOU की किताबें, असाइनमेंट या डाउट्स—सबका हल यहाँ मिलता है। बहुत उपयोगी और विश्वसनीय चैनल।"<br> "जो भी IGNOU से पढ़ रहे हैं, उनके लिए यह चैनल वरदान है। यहाँ हर समस्या का सरल समाधान है।"</p>
            <div class="client-info-wrap">
              <div class="client-img"><img src="{{asset('assets/front/images/Deepak-naugai.jpg')}}"></div>
              <div class="client-info">
                <span class="name">Mr. Deepak Naugai</span>
                <span class="designation">(MBA) (Uttarakhand)</span>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>


  
  <!-- Page Content End Here -->
@endsection
 