@extends('admin.layouts.admin-layout')
@section('title','Schedule Edit')
@section('content')
<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Schedule</h4>
                <form class="forms-sample" action="{{route('schedule.update',$schedule->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group"><label for="exampleInputName1">Name</label>
                    <input type="text" id="exampleInputName1" placeholder="Name" name="name" class="form-control" value="{{ $schedule->name }}">
                       @if($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                     @endif
                </div>
                
                <div class="form-group"><label for="image">Image</label>
                <input type="file" name="poster_image" class="image">

                    <input type="hidden" name="image_base64">

                    <img src="{{asset('uploads/'.$schedule->image)}}" style="width: 200px;" class="show-image"> 


                </div>
                    
                      <div class="form-group">
                        <label for="description">Type</label>
                        <select name="type" class="form-control">
                            <option value="">Select</option>
                            <option value="audio">Audio</option>
                            <option value="video">Video</option>
                        </select>
                       
                        @if($errors->has('type'))
                                        <div class="text-danger">{{ $errors->first('type') }}</div>
                                     @endif
                    </div>

                    <div class="form-group">
                    <label for="media">Video/Audio</label>
                    <input type="file" id="media" name="media" class="form-control">
                       @if($errors->has('media'))
                                        <div class="text-danger">{{ $errors->first('media') }}</div>
                                     @endif
                </div>
                <div class="form-group"><label for="start_time">Start time</label>
                    <input type="time" id="start_time" placeholder="Start time" name="start_time" class="form-control" value="{{$schedule->start_time}}" >
                       @if($errors->has('start_time'))
                                        <div class="text-danger">{{ $errors->first('start_time') }}</div>
                                     @endif
                </div>
                <div class="form-group"><label for="position">Position</label>
                    <input type="number" id="position" placeholder="Position" name="position" class="form-control" value="{{$schedule->position}}" min="0">
                       
                </div>
                <div class="form-check"><label class="form-check-label"><input type="checkbox" name="status" checked="{{ $schedule->status==1  ? 'checked' : ''}}" class="form-check-input"> Status <i class="input-helper"></i></label></div>
                    
                    <button type="submit" class="btn btn-success mr-2">Submit</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
