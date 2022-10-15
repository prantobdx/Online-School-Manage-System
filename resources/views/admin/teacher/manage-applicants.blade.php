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
                        <th>course-name</th>
                        <th>course-code</th>
                        <th>course-fee</th>
                        <th>confirmation</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($applicants as $applicant)
                        @if($applicant->teacher_id == Session::get('teacherId'))
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$applicant->student_name}}</td>
                            <td>{{$applicant->student_phone}}</td>
                            <td>{{$applicant->student_email}}</td>
                            <td>{{$applicant->course_name}}</td>
                            <td>{{$applicant->course_code}}</td>
                            <td>{{$applicant->course_fee}}</td>
                            <td>{{$applicant->confirmation}}</td>

                            <td>
                                <div class="row p-4">

{{--                                    <div class="col-sm-6">--}}
{{--                                        <a href="" class="btn btn-primary">Edit</a>--}}
{{--                                    </div>--}}

                                    <div class="col-sm-6">
                                        <form action="" method="post" id="delete">
                                            @csrf
                                            <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                                            <input type="submit" name="" value="Delete" class="btn btn-danger" onclick="return confirm('are you sure to delete')">
                                        </form>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
