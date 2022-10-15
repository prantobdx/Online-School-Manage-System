@extends('frontEnd.master')

@section('content')
    <!-- section -->

    <section class="inner_banner">
        <div class="container pt-5">
            <div class="row">
                <div class="col-12">
                    <div class="full">
                        <h3>Registration Form </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section -->

    <!-- section -->
    <div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="full float-right_img">
                        <img src="{{asset('frontEndAssets')}}/images/student/Student Registration.jpg" alt="#">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact_form">
                        <form action="{{route('student-register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="full field">
                                    <input type="text" placeholder="Your Name" name="student_name" />
                                </div>
                                <div class="full field">
                                    <input type="email" placeholder="Email Address" name="student_email" />
                                </div>
                                <div class="full field">
                                    <input type="text" placeholder="Phone Number" name="student_phone" />
                                </div>
                                <div class="full field">
                                    <input type="password" placeholder="Password" name="password" />
                                </div>
                                <div class="full field">
                                    <input type="file"  name="image" />
                                </div>
                                <div class="full field">
                                    <textarea placeholder="Address" name="address"></textarea>
                                </div>
                                <div class="full field">
                                    <div class="center"><button type="submit">Send</button></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
