@extends('front.layouts.front-layout')
@section('title', $faq->category->name)

@section('content')
  <!-- Page Content -->
   <section class="single-faq-sec form-program-sec">
    <div class="container">
      <div class="degree-form-wrap">
        <div class="degree-form">
          <h3>“सवाल आपके - जवाब हमारे”</h3>
          <form action="{{route('degree')}}">
            <label for="">Salect A Question*</label>
            <div class="select-field">
              <select name="category" onchange="this.form.submit()" class="form-control select2">
                <option value="">Salect A Question</option>
                @foreach($categories as $key=>$cat)
                <option value="{{encrypt($cat->id)}}" {{$faq->category->id==$cat->id ? 'selected' : ''}}>{{($key+1).'.'.$cat->name}}</option>
                @endforeach
              </select>
            </div>
          </form>
          <div class="language-switcher-wrap">
          <p>Change language</p>
          <div class="language-switcher" id="languageSwitcher">
            <div class="selected-language" id="selectedLanguage">
              <img src="https://flagcdn.com/in.svg" class="flag-icon" alt="Hindi">
              हिंदी
            </div>
            <div class="dropdown" id="languageDropdown">
              <!-- Will be filled by JS -->
            </div>
          </div>
          </div>
        </div>

        
        
        </div>
        <div class="main-content">
        <h1>{{$faq->brif_info_hindi}}</h1>
        @if($faq->programe)
        <div class="wrapper">
        {!!$faq->programe!!}
        </div>
        @endif
        <div class="content">
          {!!$faq->solution_hindi!!}
          <br>
          
          <div class="content-wrapper">
            <p>यदि समस्या का समाधान नहीं हुआ है! हमारे विशेषज्ञों से संपर्क करें!</p>
            <p>विशेषज्ञ से बातचीत के समय, सभी आवश्यक दस्तावेज़ जैसे कि आवेदन पत्र, जमा रसीद आदि तैयार रखें और “Talking Time” का पूरा लाभ उठाएं।
          समय-आधारित शुल्क: ₹59 प्रत्येक 5 मिनट के स्लॉट के लिए।
          </p>
          </div>

        </div>
      </div>
      <section class="services-form form-program-sec single">
            <div class="container">
              <h2 class="blinking-text">Select a Guidance Slot</h2>
              <h2 class="blinking-text">सलाह हेतु स्लॉट चुनें</h2>
              <form action="{{route('help')}}" class="degree-form help-form" method="post">
                @csrf
                <div class="inputs-wrapper">
                <div class="form-group">
                  <label for="help-name">Name / नाम <span class="required">*</span></label>
                  <input type="text" id="help-name" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="help-mobile">Mobile no. / मोबाईल  न. <span class="required">*</span></label>
                  <input type="tel" id="help-mobile" name="mobile" placeholder="Mobile no.">
                </div>
                <div class="form-group">
                  <label for="help-program">Programme / प्रोग्राम <span class="required">*</span></label>
                  <input type="text" id="help-program" name="programme" placeholder="Programme">
                </div>
                <div class="form-group">
                  <label for="help-enroll">Enrolment no./Control No. / नामांकन संख्या या कंट्रोल न. <span class="required">*</span></label>
                  <input type="text" id="help-enroll" name="enrolment_no" placeholder="Enrolment no./Control No.">
                </div>
                </div>
                <div class="form-group">
                  <label for="help-details">Query Details / "प्रश्न विवरण" या "सवाल का विवरण"।</label>
                  <textarea name="detail" id="help-details" placeholder="Query Details" maxlength="600"></textarea>
                  <p id="msgCount" class="wordscount-num">0 / 100 words</p>
                </div>
                <div class="terms">
                  <input type="checkbox" id="help-check">
                  <span class="required">*</span>
                  <label for="help-check">I accept all <a href="{{url('/term-conditions')}}" target="_blank">Terms & Conditions</a>.</label>
                </div>
                <div class="service-form-content">
                  <h4>नियम एवं शर्तें :-</h4>
                  <ol>
                    <li>कृपया तेज़ सेवा के लिए आवश्यक जानकारी अवश्य दें।</li>
                    <li>वर्तमान में हम केवल हिंदी भाषा में मार्गदर्शन प्रदान कर रहे हैं।</li>
                    <li>यदि छात्र हमारे उत्तर से संतुष्ट नहीं होता है, तो अगला समय स्लॉट (नि:शुल्क) जारी रखा जाएगा।</li>
                    <li>यदि “छात्र विशेषज्ञों के साथ अपशब्दों का प्रयोग करता है,” तो हमें कॉल समाप्त करने का अधिकार सुरक्षित है।</li>
                  </ol>
                  <h4>Term & Conditions :-</h4>
                  <ol>
                    <li>"Please provide required information for faster service."</li>
                    <li>"We will provide Guidance only in Hindi language at this moment."</li>
                    <li>"If student is not satisfied with our answer, we will continue call with next time slot (Free).”</li>
                    <li>"We reserve the rights to disconnect call if “student uses abuse languages with Experts”."</li>
                  </ol>
                </div>
                  <button type="submit" value="Submit">Book a Slot</button>
              </form>
            </div>
          </section>
      <div class="degree-form-wrap">
        <div class="degree-form">
          <h3>“सवाल आपके - जवाब हमारे”</h3>
          <form action="{{route('degree')}}">
            <label for="">Salect A Question*</label>
            <div class="select-field">
              <select name="category" onchange="this.form.submit()" class="form-control select2">
                <option value="">Salect A Question</option>
                @foreach($categories as $key=>$cat)
                <option value="{{encrypt($cat->id)}}" {{$faq->category->id==$cat->id ? 'selected' : ''}}>{{($key+1).'.'.$cat->name}}</option>
                @endforeach
              </select>
            </div>
          </form>
        </div>
        </div>
    </div>
   </section>

   <!-- language option show which select JS  -->
<script>
  const selectedLanguage = document.getElementById("selectedLanguage");
  const dropdown = document.getElementById("languageDropdown");

  let currentLang = 'hi'; // 'hi' for Hindi, 'en' for English

  function updateDropdown() {
    dropdown.innerHTML = '';

    const langOptions = {
      'hi': {
        label: 'English',
        code: 'en',
        flag: 'https://flagcdn.com/gb.svg'
      },
      'en': {
        label: 'हिंदी',
        code: 'hi',
        flag: 'https://flagcdn.com/in.svg'
      }
    };

    const option = langOptions[currentLang];

    const optionDiv = document.createElement("div");
    optionDiv.className = 'dropdown-option';
    optionDiv.innerHTML = `
      <img src="${option.flag}" class="flag-icon" alt="${option.label}">
      ${option.label}
    `;

    optionDiv.onclick = () => {
      currentLang = option.code;
      renderSelected();
      updateDropdown();
      dropdown.style.display = 'none';
      getContent(currentLang);
    };

    dropdown.appendChild(optionDiv);
  }

  function renderSelected() {
    const langInfo = {
      'hi': {
        label: 'हिंदी',
        flag: 'https://flagcdn.com/in.svg'
      },
      'en': {
        label: 'English',
        flag: 'https://flagcdn.com/gb.svg'
      }
    };

    selectedLanguage.innerHTML = `
      <img src="${langInfo[currentLang].flag}" class="flag-icon" alt="${langInfo[currentLang].label}">
      ${langInfo[currentLang].label}
    `;
  }

  selectedLanguage.addEventListener("click", () => {
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
  });

  // Initial setup
  renderSelected();
  updateDropdown();
</script>



   <script>
    function getContent(lang)
    {
                    var id = "{{$faq->id}}";
                      $.ajax({

                    url: "{{route('get-content')}}",

                    type: "POST",

                    data: {

                        id: id,
                        lang: lang,
                        _token: '{{csrf_token()}}'

                    },

                    dataType: 'json',
                        beforeSend: function() 
                          {
                            $('.rolling-loader').show();
                          },
                    success: function (result) 
                    {
                        $('.main-content h1').html(result.title);
                        $('.main-content .content').html(result.content);
                        var text = (lang == 'hi') ? 'Change language' : 'भाषा बदलें';
                        $('.language-switcher-wrap p').html(text);
                    },
                     complete: function() 
                              {
                                $('.rolling-loader').hide();
                              }

                });


    }
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
  const messageBox = document.getElementById('help-details');
  const msgCountDisplay = document.getElementById('msgCount');

  messageBox.addEventListener('input', () => {
    let msgWords = messageBox.value.trim().split(/\s+/);
    let msgCount = messageBox.value.trim() === '' ? 0 : msgWords.length;

    if (msgCount > 100) {
      messageBox.value = msgWords.slice(0, 100).join(" ");
      msgCount = 100;
    }

    msgCountDisplay.textContent = `${msgCount} / 100 words`;
  });
});
  </script>


     <!-- Page Content End Here -->
@endsection