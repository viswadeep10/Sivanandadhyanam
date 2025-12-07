@extends('front.layouts.front-layout')
@section('title', 'Free Download')

@section('content')

<section class="hero common-page about-page">
    <div class="container">
      <div class="hero-content">
        <h1>Free Download</h1>
        <p class="breadcrumbs"><span><a href="{{url('/')}}">Home <i class="fa-solid fa-chevron-right"></i></i></a></span>
          <span>Free Download</span>
        </p>
      </div>
    </div>
  </section>

  <section class="free-download-list-sec">
    <div class="container">
      <ul>
        @foreach($faqs as $faq)
        @if($faq->pdf)
        @php 
        $pdf = preg_replace('/[0-9]+_/', '', $faq->pdf);
        @endphp
        <li><img src="{{asset('assets/front/images/pdf-icon.svg')}}" alt="download pdf">{{$pdf}}<a href="{{asset('storage/uploads/'.$faq->pdf)}}">Free Download</a></li>
        @endif
        @endforeach
      </ul>
    </div>
  </section>
  
@endsection