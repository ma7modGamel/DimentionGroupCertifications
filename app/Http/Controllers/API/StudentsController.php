<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course;
use App\Models\Student;
use App\Models\TraineeCourse;
use App\Models\User;
use Validator;
use App\Http\Resources\TraineeCourse as TraineeCourseResource;
use App\Http\Resources\Course as CourseResource; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;    

class StudentsController extends BaseController
{
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('/');
        }  
        
    }
 


    public function store(Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input['certificate_num'] = "c" . $input['course_id'] . rand(100000,9999999) . rand(100,999);
        Student::create($input);
        return  redirect()->back()->with('status', 'Student created!');
    }

	
   

    public function update(Request $request, Student $student)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $student->update($input);
        return  redirect()->back()->with('status', 'Student updated!');
    }

    public function destroy(Course $Course)
    {
        $Course->delete();
        return  redirect()->back()->with('status', 'Course deleted!');
    }


    public function deleteStudent(Request $request, $id)
    {
        $Student = Student::find( $id );
        $Student->delete();
        return  redirect()->back()->with('status', 'Student deleted!');
    }

    
}
