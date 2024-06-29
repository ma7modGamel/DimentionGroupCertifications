<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Theme;
use App\Models\Student;

class CoursesContoller extends Controller
{


    public function index(){
    
        if(!Auth::check()){
            return redirect('/admin-login');

        }  
	    $courses = Course::all();
        $categories = Category::all();
        $themes = Theme::all();
      
        return view('admin/pages/courses')->with([
            'courses' => $courses,
            'categories' => $categories,
            'themes' => $themes,
        ]);
    }

    public function students($id){
        if(!Auth::check()){
            return redirect('/admin-login');

        }  

	    $course = Course::find($id);
	    $students = Student::where('course_id',$id)->get();
      
        return view('admin/pages/students')->with([
            'course' => $course,
            'students' => $students,
        ]);
    }


    
}
