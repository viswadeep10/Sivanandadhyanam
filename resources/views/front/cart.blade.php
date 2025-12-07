@extends('front.layouts.front-layout')
@section('title', 'Cart')

@section('content')
<section class="cart-checkout-sec">
  <div class="container">
  <h1>Cart</h1>
@if(session('cart'))
  <div class="row">
        <div class="product-details">
            <div class="product-details-table">
            <table>
                <tr>
                    <th></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
                @php 
                $total=0;
                @endphp
    @foreach(session('cart') as $id => $details)
    @php $total += $details['price']  @endphp


                <tr id="_item{{$id}}">
                    <td><img src="{{asset('assets/front/images/trash-icon.svg')}}" alt="remove" onclick="RemoveItem({{$id}})"></td>
                    <td>
                        <div class="product-info">
                            <div>
                                <strong>{{$details['name']}} x{{$details['quantity']}}</strong><br>
                                
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="price">₹{{$details['price']}}</span><br>
                    </td>
                    <td class="price">₹{{$details['price']}}</td>
                </tr>
@endforeach
            </table>
            </div>
        </div>

        <div class="cart-totals">
            <h3>Cart Totals</h3>
            <div class="totals">
                <div id="Subtotal">Subtotal: <span class="price">₹{{$total}}</span></div>
                <div class="total-price">Total: <span class="price">₹{{$total}}</span>
                </div>
            </div>

            <div class="user-details">
                <h3>Customer Details</h3>
                <div class="form-group">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" placeholder="Enter your name" style="width:100%; padding:8px; margin-top:5px;">
                </div>
                <div class="form-group">
                    <label for="email">Email: <span class="email-download-link">(Download Link share on E-mail)</span></label><br>
                    <input type="email" id="email" name="email" placeholder="Enter your email" style="width:100%; padding:8px; margin-top:5px;">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label><br>
                    <input type="number" id="phone" name="phone" placeholder="Phone" style="width:100%; padding:8px; margin-top:5px;" >
                </div>
                
                <div class="terms">
                    <input type="checkbox">
                    <label for="terms">I accept all <a href="{{url('term-conditions')}}" target="_blank">Terms & Conditions</a>.</label>
                </div>
            </div>
                  <div class="form-group">
                    <label for="coupan">Coupan:</label><br>
                    <input type="text" id="coupan" name="coupan" placeholder="Coupan" style="width:70%; padding:5px; margin-top:5px;" >
                    <a href="javascript:" style="width:25%; padding:5px; margin-top:5px;" onclick="ApplyCoupan(this)" id="apply">Apply</a>
                </div>
            <button type="button" class="checkout-btn" id="payBtn">PROCEED TO CHECKOUT</button>
            <p class="support-text"> If you are facing any issue, please contact us at <a href="tel:9784428286">9784428286</a></p>
        </div>
        </div>
    </div>
@else
<h3>Cart is empty</h3> 
@endif
    </section>
    @if(session('cart'))

<script>
    let amount = {{$total}};
    let coupan_id = 0;
    function ApplyCoupan(element)
    {
    const coupan = element.previousElementSibling.value;
    $(".msg").remove();
    if(coupan)
    {
        $.ajax({

                url: "{{ route('ApplyCoupan') }}",
                method: "POST",
                dataType:"json",
                data: {
                    _token: '{{ csrf_token() }}', 
                    coupan: coupan
                },
                success: function (response) {
                           if(response.success)
                            {
                                $("#Subtotal").next().remove();
                                var dis = calculateDiscount(response.data.discount,amount) 
                                coupan_id = response.data.id;
                                var Total = (amount-dis);
                                amount = Total.toFixed(0);
                                setTimeout(() => {
                                $("#Subtotal").after(`<div class="total-price">Discount:(`+response.data.discount+`) %<span class="price">-₹`+dis.toFixed(0)+`</span></div><div class="total-price">Total: <span class="price">₹ `+amount+`</span></div>`)
                                    },100);

                            }
                     $("#apply").after(`<br><span class="msg">`+response.message+`</span>`);

                }

            });
    }
    else
    {
        $("#apply").after(`<br><span class="msg">Enter valid Coupan</span>`);
    }


}
     $('#payBtn').click(function () {
        if(!checkValidation())
        {
             
            $.post("{{ route('checkout') }}", {amount: amount, _token: $('meta[name="csrf_token"]').attr('content')}, function (data) {
                
                var options = {
                    "key": data.key,
                    "amount": data.amount * 100,
                    "currency": "INR",
                            "name": "Ignoubook",
                            "description": "Razorpay payment",
                            "image": "https://ignoubook.net/public/assets/front/images/logo.png",
                            "prefill": {
                                "name": document.getElementById('name').value,
                                "email": document.getElementById('email').value,
                                "contact": document.getElementById('phone').value
                            },
                    "order_id": data.order_id,
                    "handler": function (response) {
                        $.post("{{ route('verify') }}", {
                            _token: $('meta[name="csrf_token"]').attr('content'),
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature,
                            name:document.getElementById('name').value,
                            email:document.getElementById('email').value,
                            contact:document.getElementById('phone').value,
                            amount: data.amount,
                            coupan_id: coupan_id,
                        }, function (verifyResponse) {
                            if(verifyResponse.success)
                            {
                            window.location.href = "{{route('thank-you')}}"
                            }
                        });
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.open();
            });
        }
        });

function checkValidation()
{
    var error = false;
    removeError();
        const myDiv = document.querySelector('.user-details');
    const inputElements = myDiv.querySelectorAll('input');

    inputElements.forEach(input => {
        // Create the new element
const newElement = document.createElement('span');
newElement.classList.add("text-danger");
newElement.textContent = input.name+ ' is required.';

        if(input.type != 'checkbox' && input.value=='')
        {
          input.after(newElement);
          error = true;
        }
        else if(input.type=='checkbox' && !input.checked)
        {
           input.after(newElement);
          error = true; 
        }
    });
return error;
}
function removeError()
{
    const elementsToRemove = document.querySelectorAll('.text-danger');
// Iterate over the NodeList and remove each element
elementsToRemove.forEach(element => {
  element.remove();
});

}

function RemoveItem(item)
{
        if(confirm("Are you sure want to remove?")) {

            $.ajax({

                url: "{{ route('removeCart') }}",
                method: "POST",
                dataType:"json",
                data: {
                    _token: '{{ csrf_token() }}', 
                    item: item
                },
                success: function (response) {

                           if(response.success)
                            {
                              //$('.cart-count').html(`<span class='cart-count'>`+response.count+`</span>`);
                                location.reload();
                            }

                }

            });

        }


}



function calculateDiscount(discount,total)
{
  return (total * discount) / 100;

}
</script>
@endif
@endsection
