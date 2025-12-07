@extends('front.layouts.front-layout')
@section('title', 'Assignments')

@section('content')
<style>
  .cart-btn.loading {
      background-color: #1e7e34;
    }

    .spinner {
      width: 18px;
      height: 18px;
      border: 2.5px solid rgba(255, 255, 255, 0.6);
      border-top: 2.5px solid #fff;
      border-radius: 50%;
      animation: smooth-spin 0.9s ease-in-out infinite;
      display: none;
    }

    @keyframes smooth-spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .cart-btn.loading .spinner {
      display: inline-block;
    }

    .cart-btn.added {
      background-color: #007bff;
    }

    .checkmark {
      display: none;
      font-size: 18px;
    }

    .cart-btn.added .checkmark {
      display: inline;
    }

    .cart-btn.added .spinner,
    .cart-btn.added .text {
      display: none;
    }
</style>
   <!-- Page Content -->
  <section class="hero common-page">
    <div class="container">
      <div class="hero-content">
        <h1>Assignments</h1>
        <p class="breadcrumbs"><span><a href="{{url('/')}}">Home <i class="fa-solid fa-chevron-right"></i></i></a></span>
          <span>Assignments</span>
        </p>
      </div>
    </div>
  </section>

  <section class="assignment-select form-program-sec">
    <div class="container">
      <form action="" class="degree-form">
        <label for="" class="blinking-text">Salect an Sub Program*</label>
        <div class="select-field">
          <select name="" id="" class="form-control select2" onchange="getAssignments(this.value)">
            <option></option>
            @foreach($subprograms as $sub)
            <option value="{{$sub->id}}">{{$sub->name}}</option>
            @endforeach
          </select>
        </div>
      </form>
    </div>
  </section>

  <section class=" ignou-assignments edu-latest-assign">
    <div class="container">
      <!-- <h2>Latest IGNOU Solved Assignment</h2> -->
      <div class="edu-outer assign-items">
        
      </div>
      <!-- <div class="assign-view-more-btn"> <a href="#" class="custom-button">Load More </a> </div> -->
    </div>
  </section>

  <section class="assignment-content-sec">
    <div class="container">
      <div class="row eng">
        <h3>Welcome to IGNOU BOOK – Your Trusted Companion for Success!</h3>
        <p>We are glad to be connected with you because <strong>you represent the bright future of our country.</strong></p>

        <p><strong>IGNOU BOOK</strong> is the <strong>first and most preferred platform</strong> in the IGNOU community for achieving <strong>high marks</strong> in your exams and assignments.</p>

        <hr>

        <h3>What We Offer:</h3>
        <ul class="outer-check-list">
          <li>
            <h5>Solved Assignments in Typed PDF Format</h5>
            <p>Available in both English and Hindi for submission in the December 2025 Term-End Examination (TEE).</p>
          </li>
          <li>
            <h5>Time-Saving & Merit-Focused</h5>
            <p>Our assignments are designed to save your valuable time and help you score high marks, increasing your chances of achieving First Division.</p>
          </li>
          <li>
            <h5>High-Quality Content</h5>
            <p>Our assignments are:</p>
            <ul class="check-list">
              <li>Well-researched</li>
              <li>Point-wise and choice-based</li>
              <li>Include clear conclusions</li>
              <li>Fully aligned with IGNOU's official guidelines</li>
            </ul>
          </li>
          <li>
            <h5>Download the Assignment Cover Page</h5>
            <a href="https://ignoubook.net/storage/uploads/1751733537_Front%20Page%20of%20Assignment%20Submission(8).pdf" target="_blank">[Click here to download the front/cover page in PDF format]</a>
          </li>
        </ul>

        <div class="visit-main-sec">
          <p>At least once, visit our “सवाल आपके - जवाब हमारे” section on the Home Page. This special feature answers your most common doubts with clarity and expert advice — complete with YouTube videos explained problem-wise for better understanding!</p>
        </div>

        <h4>Our Personal Recommendation:</h4>
        <p>We strongly advise IGNOU students like you to:</p>

        <h4>Write your assignments by hand only</h4>
        <p style="margin-bottom: 10px;">Use <strong>A4 size ruled sheets</strong> with:</p>
        <ul class="check-list">
            <li><strong>Black or Green pen</strong> for writing the questions</li>
            <li><strong>Blue pen</strong> for writing the answers</li>
        </ul>
        <hr>

        <h4>Importance of Assignments:</h4>
        <ul class="check-list">
            <li>Assignments carry <strong>30% weightage</strong>, and Term-End Exams carry <strong>70% weightage</strong>.</li>
            <li>For example, if you score <strong>25 out of 30</strong> in assignments and <strong>40 out of 70</strong> in the exam, your <strong>total score becomes 65%</strong>, qualifying you for <strong>First Division</strong>.</li>
            <li>This is called a <strong>good academic performance in a degree programme</strong>.</li>
            <li>This process also helps you <strong>prepare better for exams</strong> and <strong>cover nearly 50% of the syllabus</strong>.</li>
            <li>You will also gain <strong>basic understanding of your course subjects</strong>, improving your overall knowledge.</li>
        </ul>

        <hr>

        <div class="start-journey">Start your journey with IGNOU BOOK and move one step closer to your academic success!</div> 
    </div>
    <div class="row hindi">
      <h3>IGNOU BOOK – आपकी सफलता का भरोसेमंद साथी!</h3>
        <p>हमें आपसे जुड़कर बहुत खुशी हो रही है क्योंकि <strong>आप हमारे देश का उज्ज्वल भविष्य हैं।</strong></p>

        <p><strong>IGNOU BOOK</strong> आज <strong>IGNOU विद्यार्थियों की पहली और सबसे विश्वसनीय पसंद</strong> है, जहाँ से आप अपने असाइनमेंट और परीक्षा में <strong>उच्च अंक प्राप्त कर सकते हैं।</strong></p>

        <hr>

        <h3>हम क्या सेवा प्रदान करते हैं:</h3>
        <ul class="outer-check-list">
          <li>
            <h5>टाइप किए हुए हल किए गए असाइनमेंट (PDF फॉर्मेट में)</h5>
            <p><strong>दिसंबर 2025 टर्म एंड परीक्षा (TEE)</strong> में जमा करने के लिए, ये असाइनमेंट <strong>हिंदी और अंग्रेजी</strong> दोनों भाषाओं में उपलब्ध हैं।</p>
          </li>
          <li>
            <h5>समय की बचत और मेरिट का मार्ग</h5>
            <p>हमारे असाइनमेंट <strong>आपका कीमती समय बचाते हैं</strong> और <strong>First Division</strong> पाने के लिए <strong>अधिक अंक लाने</strong> में आपकी मदद करते हैं।</p>
          </li>
          <li>
            <h5>उच्च गुणवत्ता वाली सामग्री</h5>
            <p>हमारे असाइनमेंट:</p>
            <ul class="check-list">
              <li>गहन शोध पर आधारित होते हैं</li>
              <li>पॉइंट वाइज़ और विकल्प आधारित होते हैं</li>
              <li>अंत में स्पष्ट निष्कर्ष होते हैं</li>
              <li>पूरी तरह से IGNOU के आधिकारिक दिशानिर्देशों के अनुसार होते हैं</li>
            </ul>
          </li>
          <li>
            <h5>असाइनमेंट का कवर पेज डाउनलोड करें</h5>
            <a href="https://ignoubook.net/storage/uploads/1751733537_Front%20Page%20of%20Assignment%20Submission(8).pdf" target="_blank">[यहाँ क्लिक करें और PDF फॉर्मेट में फ्रंट/कवर पेज डाउनलोड करें]</a>
          </li>
        </ul>

        <div class="visit-main-sec">
          <p>कम से कम एक बार हमारी वेबसाइट के “<strong>सवाल आपके - जवाब हमारे</strong>” सेक्शन को Home Page पर ज़रूर देखें। यह विशेष सुविधा <strong>आपके आम सवालों का जवाब</strong> स्पष्टता और विशेषज्ञ सलाह के साथ देती है — <strong>हर समस्या के लिए यूट्यूब वीडियो</strong> के माध्यम से आपकी समझ को और आसान बनाती है।</p>
        </div>

        <h4>हमारा व्यक्तिगत सुझाव:</h4>
        <p>हम IGNOU विद्यार्थियों को सलाह देते हैं कि:</p>

        <h4>अपने असाइनमेंट अपने हाथ से ही लिखें</h4>
        <p style="margin-bottom: 10px;"><strong>A4 साइज की लाइन वाले पत्रों</strong> का उपयोग करें:</p>
        <ul class="check-list">
            <li><strong>प्रश्न लिखने के लिए काले या हरे पेन</strong> का उपयोग करें</li>
            <li><strong>उत्तर लिखने के लिए नीले पेन</strong> का उपयोग करें</li>
        </ul>

        <hr>

        <h4>असाइनमेंट का महत्त्व:</h4>
        <ul class="check-list">
            <li>IGNOU में असाइनमेंट का <strong>वज़न 30%</strong> होता है, और Term-End परीक्षा का <strong>वज़न 70%</strong>।</li>
            <li>उदाहरण के लिए, अगर आप असाइनमेंट में <strong>30 में से 25 अंक</strong> और परीक्षा में <strong>70 में से 40 अंक</strong> प्राप्त करते हैं, तो आपका <strong>कुल स्कोर 65%</strong> बनता है, जो कि <strong>First Division</strong> के लिए पर्याप्त है।</li>
            <li>इसे किसी भी डिग्री प्रोग्राम में <strong>अच्छा शैक्षणिक प्रदर्शन</strong> कहा जाता है।</li>
            <li>यह प्रक्रिया आपकी <strong>परीक्षा की तैयारी को बेहतर बनाती है</strong> और लगभग <strong>50% सिलेबस कवर</strong> हो जाता है।</li>
            <li>आपको अपने विषयों की <strong>बुनियादी समझ</strong> भी मिलती है, जिससे आपका संपूर्ण ज्ञान बेहतर होता है।</li>
        </ul>

        <hr>

        <div class="start-journey">आज ही IGNOU BOOK के साथ अपनी शैक्षणिक सफलता की ओर एक कदम बढ़ाएं!</div>

    </div>
    </div>
  </section>
  <!-- Page Content End Here -->

  <script>
    var cartData ;
    function getAssignments(ele)
    {
       if(ele)
       {
          $.ajax({
                          type:'POST',
                          url:"{{route('getAssignments')}}",
                          data:{_token: "{{csrf_token()}}",id:ele},
                          dataType:"json",
                          beforeSend: function() 
                          {
                            $('.rolling-loader').show();
                          },
                          success: function( msg ) 
                          {
                            if(msg.products)
                            {
                              cartData = Object.keys(msg.cart)
                              var html = ``;
                                        $.each(msg.products.courses, function(key,val) 
                                        {  
                                          
                                          var url = viewCart(val.id) ? "{{route('cart')}}" : 'javascript:';     
                                          var text = viewCart(val.id) ? "✔ View Cart" : 'Add to cart:';     
                                          var target = viewCart(val.id) ? "self" : '_blank';     
                                           html += `<div class="edu-items item">
                                            <img src="https://ignoubook.net/public/assets/front/images/logo.png">
                                            
          <h4><a href="#">`+val.name+`</a></h4>
          <div class="at-price">₹`+msg.products.price+`</div>
          <div class="purchase-btn">
            <a href="`+url+`" class="cart-btn" onclick="addTocart(`+val.id+`,`+msg.products.price+`,this)" target="`+target+`">`+text+`</a>
              <div class="spinner"></div>
             <span class="checkmark">✔ Added</span>
          </div>
        </div>`       
                                        });   
                                        
                                        $('.assign-items').html(html)

                            }
                          },
                              complete: function() 
                              {
                                $('.rolling-loader').hide();
                              }
                      });
       }
    }

    function addTocart(id,price,current)
    {
      
      $.ajax({
                          type:'POST',
                          url:"{{route('addTocart')}}",
                          data:{_token: "{{csrf_token()}}",id:id,price:price},
                          dataType:"json",
                          beforeSend: function() 
                          {
                            current.textContent = 'Adding...'
                          },
                          success: function( msg ) 
                          {
                            if(msg.success)
                            {
                              current.textContent = '✔ View Cart';
                              current.classList.add('active'); // Add class
                              current.href="{{route('cart')}}"
                              $('.cart-count').html(msg.count);
                            }
                          }
                      });
    }

    function viewCart(id)
    {
      var is_cart = cartData.map(Number).includes(id) ? true : false;
      return is_cart;
    }
  </script>
@endsection
 