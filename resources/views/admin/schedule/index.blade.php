@extends('admin.layouts.admin-layout')
@section('title','Schedule')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Schedule</h4>
                <a href="{{route('schedule.create')}}" class="btn btn-icons btn-success float-right"><i
                        class="mdi mdi-plus"></i></a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $k=>$val)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$val->name}}</td>
                                <td>{{date('Y-m-d',strtotime($val->created_at))}}</td>
                                <td>{!! $val->status==1 ? '<label class="badge badge-success">Active</label>' : '<label
                                        class="badge badge-danger">Deactive</label>' !!}
                                </td>
                                <td>
                                    <a href="{{route('schedule.edit',$val->id)}}" class="btn btn-icons btn-primary"><i
                                            class="mdi mdi-pencil"></i></a>

                                    <form action="{{ route('schedule.destroy', $val->id) }}" method="POST"
                                        id="delete-{{$val->id}}" class="d-none">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                    <a href="#" class="btn btn-icons btn-danger" onclick="deleteRecord({{$val->id}})"><i
                                            class="mdi mdi-delete"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $data->links() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection