@extends('admin.layouts.admin-layout')
@section('title','Meditation Add')
@section('content')
<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Meditation</h4>
                <form class="forms-sample" action="{{route('meditation.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group"><label for="exampleInputName1">Name</label>
                    <input type="text" id="exampleInputName1" placeholder="Name" name="name" class="form-control" value="{{ old('name') }}">
                       @if($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                     @endif
                </div>
                
                <div class="form-group"><label for="image">Image</label>
                <input type="file" name="image" class="image">

                    <input type="hidden" name="image_base64">

                    <img src="" style="width: 200px;display: none;" class="show-image"> 


                </div>
                    @if($errors->has('image_base64'))
                                        <div class="text-danger">{{ $errors->first('image_base64') }}</div>
                                     @endif
                                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            id="description"
                            name="desc"
                            rows="6"
                            class="form-control summernote"
                        >{{ old('desc') }}</textarea>
                       
                        @if($errors->has('desc'))
                                        <div class="text-danger">{{ $errors->first('desc') }}</div>
                                     @endif
                    </div>

                  <div class="form-group"><label for="audio">Audio</label>
                    <input type="file" id="audio" placeholder="Name" name="audio" class="form-control">
                       @if($errors->has('audio'))
                                        <div class="text-danger">{{ $errors->first('audio') }}</div>
                                     @endif
                </div>
                <div class="form-group"><label for="position">Position</label>
                    <input type="number" id="position" placeholder="Position" name="position" class="form-control" value="{{ old('position') }}" min="0">
                       
                </div>
                <div class="form-check"><label class="form-check-label"><input type="checkbox" name="status" checked="{{ old('status')  ? 'checked' : ''}}" class="form-check-input"> Status <i class="input-helper"></i></label></div>
                    <button type="submit" class="btn btn-success mr-2">Submit</button> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
