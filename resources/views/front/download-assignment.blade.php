@extends('front.layouts.front-layout')
@section('title', 'Download Assignment')

<style>
  .table-sec .services-form .degree-form{max-width:100%; height:max-content; border-radius: 0px; flex-direction: row}
  .table-sec .services-form .inputs-wrapper{margin-bottom: 0px; width: 80%}
  .alert-success {
    color: #3c763d;
}
.alert-danger {
    color: #a94442;
}
.alert{
  text-align: center;
  font-size: 25px;
}
</style>
@section('content')

<section class="table-sec">
  <div class="container">
    <div class="row">
      @if(isset($success))
    <div class="alert alert-success">
        {{$success}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
      <div class="col-md-6 services-form">
          <h3>Please verify your email or mobile to download pdf</h3>
         <form class="" method="post" action="{{route('download-assignment',$id)}}">
          @csrf
          <div class="inputs-wrapper">
            <div class="form-group">
            <label for="srvc-mobile">Mobile no. / मोबाईल  न. OR Email id  / ई-मेल </label>
            <input type="text" name="verify" required>
          </div>
         
          </div>
          <button type="submit" value="Submit">Validate</button>
        </form>
      </div>
    </div>
      @if(isset($success))
    <div class="table-row">
<table>
  <thead>
    <tr>
      <th><img src="https://img.icons8.com/ios-filled/24/ffffff/document.png" class="header-icon" alt=""> PDF Title</th>
      <th><img src="https://img.icons8.com/ios-filled/24/ffffff/download.png" class="header-icon" alt="">Price</th>
      <th><img src="https://img.icons8.com/ios-filled/24/ffffff/download.png" class="header-icon" alt=""> Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>
      <td>{{$item['name']}}</td>
      <td>₹{{$item['price']}}</td>
      <td>
        <a href="{{asset('storage/uploads/'.$item['pdf'])}}" class="download" download><img src="https://img.icons8.com/emoji/20/ffffff/orange-circle.png" class="icon" alt=""> Download</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endif
</div>
</section>
@endsection
