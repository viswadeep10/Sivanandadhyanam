 <style>
        
        .thank-you-sec{
          background-color: #ffffff;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          margin: 0;
        }
        .thank-you-box {
            background-color: #87ceeb;
            padding: 40px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-radius: 0;
            width: 100%;
            max-width: 450px;
        }
        .thank-you-box h1 {
            color: #000;
            margin-bottom: 20px;
            font-size: 40px;
        }
        .thank-you-box p {
            font-size: 18px;
            color: #555;
        }
        .thank-you-box a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }
        .thank-you-box a:hover {
            background-color: #000;
            color: #fff;
        }
    </style>

<section class="thank-you-sec">
  <div class="container">
    <div class="thank-you-box">
      <img src="" alt="">
      <h1>Thank You!</h1>
      <p>We have sent you a download link on your email.</p>
      <a href="{{url('/')}}">Go Back to Home</a>
    </div>
  </div>
</section>