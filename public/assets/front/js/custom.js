// header-sticky
$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('header').addClass('sticky');
    } else {
        $('header').removeClass('sticky');
    }
});

// mobile-navbar
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


// function toggleNav() {
//     const sidenav = document.getElementById("mySidenav");
//     const isOpen = sidenav.style.width === "250px";
    
//     sidenav.style.width = isOpen ? "0" : "250px";
// }

// assignment-cards-loader
$(document).ready(function () {
    const items = $(".edu-outer .edu-items");
    let visibleCount = 8;

    // Show the first 8 items initially
    items.slice(0, visibleCount).show();

    $(".custom-button").click(function (e) {
        e.preventDefault();

        if (visibleCount < items.length) {
            items.eq(visibleCount).fadeIn(); // Show one item
            visibleCount++;

            // Hide button if all items are shown
            if (visibleCount === items.length) {
                $(this).hide();
            }
        }
    });
});

//   counter-js
const counters = document.querySelectorAll('.counter');
counters.forEach(counter => {
    counter.innerText = '0';
    const updateCounter = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / 100;

        if (count < target) {
            counter.innerText = `${Math.ceil(count + increment)}`;
            setTimeout(updateCounter, 30);
        } else {
            counter.innerText = target;
        }
    };
    updateCounter();
});

// home-assignment-slider
var swiper = new Swiper(".assignment_slider", {
    slidesPerView: 3,
    spaceBetween: 20,
    autoplay: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 0,
      },
      600: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      1000: {
        slidesPerView: 4,
         spaceBetween: 15,
      },
      1200: {
        slidesPerView: 4,
         spaceBetween: 20,
      }
    }
  });


    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select an option",
            allowClear: true
        });
    });



    function checkValidation(cls)
  {
    var err = false;
  $("form." + cls + " :is(input:not([type=hidden]), select, textarea)").each(function(){
 var input = $(this); 
 var required = input.closest('form').find('.required').length;
 if(required && input.val()=='')
 {
  err= true
  input.after('<span class="text-danger">Feild is required</span>')
 }
});
return err;
  }
  jQuery(document).on("submit", ".save-complaint", function (e) {
    jQuery(this).find('.text-danger').remove();
    e.preventDefault();
    if(!checkValidation("save-complaint"))
      {
    var data = jQuery(this).serialize();
    jQuery.ajax({
        type: "post",
        url: jQuery(this).attr('action'),
        data: data,
        dataType: "json",
        beforeSend: function() 
        {
          jQuery('.rolling-loader').show();
        },
        success: function(data) 
        {
            if(data.success)
                {
            jQuery('.save-complaint')[0].reset();
            jQuery('.save-complaint').before('<p class="success-message">Complain submit successfully!</p>')
            }
        },
        complete: function() 
        {
        jQuery('.rolling-loader').hide();
        },
        error: function(error) {
            console.log('error');
        }
    });
  }
}); 

  var fees = 0;

function getFess(element,action)
  {
       jQuery('.service').find("#fessContent").remove();
    jQuery.ajax({
        type: "post",
        url: action,
        data: {id:element.value},
        dataType: "json",
        "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        beforeSend: function() 
        {
          jQuery('.rolling-loader').show();
        },
        success: function(data) 
        {
        var htmlToInsert = `<div id="fessContent">
                <div class="fessName"><strong>Name:</strong>`+data.service.name+`</div>
                <div class="fessDoc"><strong>Documents Required:</strong>`+data.service.description+`</div>
                <div class="fessAmount"><strong>Fees:</strong> ₹`+data.service.price+`</div>
              </div>`;
       jQuery('.service .select-field').after(htmlToInsert);
       fees = data.service.price;
        },
        complete: function() 
        {
        jQuery('.rolling-loader').hide();
        },
        error: function(error) {
            console.log('error');
        }
    });
  }

jQuery(document).on("submit", ".service", function (e) {
    jQuery(this).find('.text-danger').remove();
    e.preventDefault();
    var d = jQuery(this).serialize();
        var action = jQuery(this).attr('action');
    if(!checkValidation('service'))
        {
        $.post(checkout, {amount: fees, _token: $('meta[name="csrf_token"]').attr('content')}, function (data) {
      
       var options = {
                    "key": data.key,
                    "amount": data.amount * 100,
                    "currency": "INR",
                            "name": "Ignoubook",
                            "description": "Razorpay payment",
                            "image": "https://ignoubook.net/public/assets/front/images/logo.png",
                            "prefill": {
                            "name": document.getElementById('srvc-name').value,
                            "email": document.getElementById('srvc-email').value,
                            "contact": document.getElementById('srvc-mobile').value,
                            },
                    "order_id": data.order_id,
                    "handler": function (response) {
                       $.ajax({
                url: action,
                type: 'POST',
                dataType: 'json',
                data: d + "&razorpay_payment_id=" + response.razorpay_payment_id + "&razorpay_order_id=" + response.razorpay_order_id+ "&razorpay_signature=" + response.razorpay_signature+ "&amount=" + data.amount,
                success: function(msg) {
                    if(msg.success)
                {
            jQuery('.service')[0].reset();
            jQuery('.service').before('<p class="success-message">'+msg.message+'</p>')
            }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error sending payment failure information:', textStatus, errorThrown);
                }
            });
                    } 
                };
    var rzp = new Razorpay(options);
        rzp.open();
        });
  }
})


jQuery(document).on("submit", ".help-form", function (e) {
    jQuery(this).find('.text-danger').remove();
    e.preventDefault();
    category = document.getElementsByName("category")[0].value;
            var d = jQuery(this).serialize();
        var action = jQuery(this).attr('action');
    if(!checkValidation('help-form'))
        {
            $.post(checkout, {amount: 59, _token: $('meta[name="csrf_token"]').attr('content')}, function (data) {

       var options = {
                    "key": data.key,
                    "amount": data.amount * 100,
                    "currency": "INR",
                            "name": "Ignoubook",
                            "description": "Razorpay payment",
                            "image": "https://ignoubook.net/public/assets/front/images/logo.png",
                            "prefill": {
                            "name": document.getElementById('help-name').value,
                            "contact": document.getElementById('help-mobile').value
                            },
                    "order_id": data.order_id,
                    "handler": function (response) {
                       $.ajax({
                url: action,
                type: 'POST',
                dataType: 'json',
                data: d + "&razorpay_payment_id=" + response.razorpay_payment_id + "&razorpay_order_id=" + response.razorpay_order_id+ "&razorpay_signature=" + response.razorpay_signature+ "&category=" + category+ "&amount=" + data.amount,
                success: function(msg) {
                    if(msg.success)
                {
            jQuery('.help-form')[0].reset();
            jQuery('.help-form').before('<p class="success-message">'+msg.message+'</p>')
            }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('Error sending payment failure information:', textStatus, errorThrown);
                }
            });
                    }
                };
    var rzp = new Razorpay(options);
        rzp.open();
        });
  }
});


 jQuery(document).on("submit", ".enquiry", function (e) {
    jQuery(this).find('.text-danger').remove();
    e.preventDefault();
    if(!checkValidation("enquiry"))
      {
    var data = jQuery(this).serialize();
    jQuery.ajax({
        type: "post",
        url: jQuery(this).attr('action'),
        data: data,
        dataType: "json",
        beforeSend: function() 
        {
          jQuery('.rolling-loader').show();
        },
        success: function(data) 
        {
            if(data.success)
                {
            jQuery('.enquiry')[0].reset();
            jQuery('.enquiry').before('<p class="success-message">Complain submit successfully!</p>')
            }
        },
        complete: function() 
        {
        jQuery('.rolling-loader').hide();
        },
        error: function(error) {
            console.log('error');
        }
    });
  }
}); 



// for services form on home-page word count limitation

  const textarea = document.getElementById('srvc-details');
  const wordCountDisplay = document.getElementById('wordCount');
if(textarea) {
  textarea.addEventListener('input', () => {
    let words = textarea.value.trim().split(/\s+/);
    let wordCount = textarea.value.trim() === '' ? 0 : words.length;

    if (wordCount > 100) {
      textarea.value = words.slice(0, 100).join(" ");
      wordCount = 100;
    }

    wordCountDisplay.textContent = `${wordCount} / 100 words`;
  });
}

// for complaint form on home-page word count limitation

document.addEventListener("DOMContentLoaded", () => {
  const feedbackArea = document.getElementById('complain');
  const feedbackCountDisplay = document.getElementById('feedbackCount');
if(feedbackArea) {

  feedbackArea.addEventListener('input', () => {
    let feedbackWords = feedbackArea.value.trim().split(/\s+/);
    let feedbackCount = feedbackArea.value.trim() === '' ? 0 : feedbackWords.length;

    if (feedbackCount > 100) {
      feedbackArea.value = feedbackWords.slice(0, 100).join(" ");
      feedbackCount = 100;
    }

    feedbackCountDisplay.textContent = `${feedbackCount} / 100 words`;
  });
}
});







