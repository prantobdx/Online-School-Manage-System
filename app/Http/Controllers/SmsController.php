<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use DB;

class SmsController extends Controller
{
    public function index()
    {
        $course = Course::orderBy('id','desc')->take(3)->get();
//        return $course;
        return view('frontEnd.home.home',[
            'courses'=> $course
        ]);
    }
    public function about()
    {
        return view('frontEnd.about.about');
    }
    public function course()
    {
        return view('frontEnd.course.course',[
            'courses' => Course::orderBy('id','desc')->take(3)->get()
        ]);
    }
    public function contact()
    {
        return view('frontEnd.contact.contact');
    }

    public function courseDetails($slug)
    {
       $course = DB::table('courses')
        ->join('teachers','courses.teacher_id','teachers.id')
            ->select('courses.*','teachers.name','teachers.email')
            ->where('slug',$slug)
            ->first();

        return view('frontEnd.course.course-details',[
            'course'=>$course
        ]);
    }
}
