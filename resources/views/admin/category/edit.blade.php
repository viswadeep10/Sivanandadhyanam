@extends('admin.layouts.admin-layout')
@section('title','Question Edit')
@section('content')
<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Question</h4>
                <form class="forms-sample" action="{{route('category.update',$category->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group"><label for="exampleInputName1">Name</label>
                    <input type="text" id="exampleInputName1" placeholder="Name" name="name" class="form-control" value="{{$category->name}}">
                @if($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                     @endif
                </div>
                <div class="form-group"><label for="order_no">Order No</label>
                    <input type="number" id="order_no" placeholder="Order No" name="order_no" class="form-control" value="{{$category->order_no}}">
                       
                </div>
                <div class="form-check"><label class="form-check-label"><input type="checkbox" name="status" class="form-check-input" {{$category->status==1 ? 'checked' : ''}}> Status <i class="input-helper"></i></label></div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
