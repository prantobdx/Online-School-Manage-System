@extends('admin.master')

@section('content')
    <h6 class="mb-0 text-uppercase">DataTable Example</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">{{session('message')}}</h1>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl no</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->phone}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->address}}</td>
                        <td>
                            <img src="{{asset($teacher->image)}}" alt="" style="width: 100px;height: 100px">
                        </td>
                        <td>
                            <div class="row p-4">

                                <div class="col-sm-6">
                                    <a href="{{ route('edit-teacher',['id'=>$teacher->id]) }}" class="btn btn-primary">Edit</a>
                                    {{-- <a href="#" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete').submit();">Delete</a>--}}
                                </div>

                                <div class="col-sm-6 ">
                                    <form action="{{route('delete-teacher')}}" method="post" id="delete">
                                        @csrf
                                        <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                        <input type="submit" name="" value="Delete" class="btn btn-danger" onclick="return confirm('are you sure to delete')">
                                    </form>
                                </div>

                            </div>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
