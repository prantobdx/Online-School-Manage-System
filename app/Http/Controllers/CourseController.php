<?php

namespace App\Http\Controllers;

use App\Models\Course;

use Illuminate\Http\Request;
use DB;

class CourseController extends Controller
{
    public $image,$imageName,$directory,$imageUrl, $course;

   public function addCourse()
   {
       return view('admin.course.add-course');
   }
   public function manageCourse()
   {
       $courses =DB::table('courses')
           ->join('teachers','courses.teacher_id','teachers.id')
           ->select('courses.*','teachers.name','teachers.email')
           ->get();
       return view('admin.course.manage-course',[
           'courses'=>$courses
       ]);
   }

   public function createCourse(Request $request)
   {
       $this->validate($request,[
            'course_name'=>'required|unique:courses,course_name|string|min:4|max:50',
            'course_code'=>'required|integer|min:3'
       ]);
       $course = new Course();
       $course->teacher_id = $request->teacher_id;
       $course->course_name =$request->course_name;
       $course->slug = $this->makeSlug($request);
       $course->course_code = $request->course_code;
       $course->course_description = $request->course_description;
       $course->course_fee = $request->course_fee;
       $course->image = $this->saveImage($request);
       $course->save();
       return back()->with('message','Course Created Successfully');
   }

   private function makeSlug($request)
   {
       if ($request->slug)
       {
           $str = $request->slug;
           return preg_replace('/\s+/u','-',trim($str));
       }
       $str = $request->course_name;
       return preg_replace('/\s+/u','-',trim($str));
   }

   private function saveImage($request)
   {
       $this->image = $request->file('image');
       $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
       $this->directory = 'adminAssets/course/';
       $this->ImageUrl  = $this->directory.$this->imageName;
       $this->image->move($this->directory,$this->imageName);
       return $this->ImageUrl;
   }

    public function deleteCourse(Request $request)
    {
        $this->course = Course::find($request->course_id);
        if(is_file($this->course->image))
        {
            unlink($this->course->image);
        }
        $this->course->delete();
        return back()->with('message', 'Teacher Information Deleted Successfully!');
    }

    public function editCourse($id)
    {
        return view('admin.course.edit-course',[
            'course'=>Course::find($id)
        ]);
    }

    public function updateCourse(Request $request)
    {
        $course = Course::find($request->course_id);
        $course->teacher_id = $request->teacher_id;
        $course->course_name =$request->course_name;
        $course->slug = $this->makeSlug($request);
        $course->course_code = $request->course_code;
        $course->course_description = $request->course_description;
        $course->course_fee = $request->course_fee;
        if($request->file('image'))
        {
            if ($course->image)
            {
                unlink($course->image);
            }
            $course->image = $this->saveImage($request);
        }
        $course->save();
        return redirect('/manage-course')->with('message','Course-Info Updated Successfully');
    }

    public function manageApplicants()
    {
        $applicants=DB::table('admissions')
            ->join('students','admissions.student_id','students.id')
            ->join('courses','admissions.course_id','courses.id')
            ->select('students.student_name','students.student_email','students.student_phone',
                'courses.course_name','courses.teacher_id','courses.course_code','courses.course_fee','admissions.confirmation','admissions.id')
            ->get();

        return view('admin.teacher.manage-applicants',[
            'applicants' => $applicants
        ]);
    }

}



