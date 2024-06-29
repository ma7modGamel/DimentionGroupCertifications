<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;    
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Student;
use App\Models\Theme;

class DashboardContoller extends Controller
{

    public function __construct()
    {
        if(!Auth::check()){
            return redirect('/');
        }  
        
    }
    public function index(){
	    $courses_count = Course::count();
	    $courses = Course::orderBy('cnum','desc')->limit(5)->get();
        $students_count = Student::count();
        $theme_count = Theme::count();
        $themes = Theme::orderBy('id','desc')->limit(5)->get();
        $students = Student::with('course')->get();
        return view('admin/pages/dashboard')->with([
            'courses' => $courses,
            'themes' => $themes,
             'students' => $students,
            'courses_count' => $courses_count,
            'students_count' => $students_count,
            'theme_count' => $theme_count,
        ]); 
    }
}
