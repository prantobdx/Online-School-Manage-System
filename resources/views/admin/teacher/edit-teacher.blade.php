@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Update Teacher information</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    <h2>{{session('message')}}</h2>
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <h5 class="mb-0">Edit Teacher Registration Info</h5>
                        </div>
                        <hr/>
                        <form action="{{route('update-teacher')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $teacher->id }}" name="teacher_id">
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Enter Your Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="inputEnterYourName" placeholder="Enter Your Name" value="{{ $teacher->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" id="inputPhoneNo2" placeholder="Phone No" value="{{ $teacher->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="inputEmailAddress2" placeholder="Email Address" value="{{ $teacher->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputAddress4" class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address" id="inputAddress4" rows="3" placeholder="Address">{{ $teacher->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputConfirmPassword2" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" id="" class="form-control">
                                    <img src="{{asset($teacher->image)}}" alt="" width="100px" height="100px" class="mt-2">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Register</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
