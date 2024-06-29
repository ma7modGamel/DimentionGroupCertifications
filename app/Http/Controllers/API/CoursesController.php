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

class CoursesController extends BaseController
{
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('/');
        }  
        
    }
    public function index(Request $request)
    {
	    $courses = Course::all();
        return $this->sendResponse(CourseResource::collection($courses), 'Coursess retrieved successfully.');
    }
     public function getTraineeCourse(Request $request)
    	{
         $course_id  = $request->get('course_id');
        $traineecourses = User::join('courses_trainee', 'users.id', '=', 'courses_trainee.trainee_id')->where('courses_trainee.course_id', '=', $course_id)->whereNotNull('courses_trainee.course_id')->get();
        return $this->sendResponse(new TraineeCourseResource($traineecourses), 'Trainee of the Course retrieved successfully.');
	}

    public function getAll(Request $request)
    	{
	$cat_id  = $request->get('cat_id');
        $courses = Course::where('cat_id', '=', $cat_id)->whereNotNull('cat_id')->get();
        return $this->sendResponse(new CourseResource($courses), 'Courses retrieved successfully.');
	}

 public function store(Request $request)
    {
        $input = $request->all();
        $input['Status'] = $input['Status'] == 'on' ? 1 : 0;
        $validator = Validator::make($input, [
            'cname' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $course = Course::create($input);
        return  redirect()->back()->with('status', 'Course created!');
    }

	public function storeTraineeCourse(Request $request)
	 {
		$course_id  = $request->get('course_id');
		$data[] = json_decode($request->get('users'),true);
 		if(is_array($data)){
                // return $this->sendResponse(new CourseResource($data), 'Course created successfully.');
		foreach ($data as $user) {
                // return $this->sendResponse(new CourseResource($data[0]), 'Course created successfully.');
			$password = bcrypt('123456');
			$email = $user[0]['email'];
                        $full_name = $user[0]['full_name'];
                        $national_id = $user[0]['national_id'];
                        $mobile = $user[0]['mobile'];
			$userResult = User::where('national_id', '=', $national_id)->get();
			if (empty($userResult)) {
			$userinsert = User::create([
			'full_name' => $full_name,
			'email' => $email,
			'mobile' => $mobile,
			'password' => $password
		]);
		$lastInsertedID =  $userinsert->Id();
		if(!empty($lastInsertedID)){
		$randomString = Str::random(30);
		$order = TraineeCourse::create([
                 'course_id' => $course_id,
                 'trainee_id' => $lastInsertedID,
                 'cert_code' => $randomString,
                   ]);
 		$randomString = Str::random(30);
		$course = Course::create($order);
		 return $this->sendResponse(new CourseResource($course), 'Course created successfully.');
		}else{
 		$randomString = Str::random(30);
		$order = TraineeCourse::create([
                 'course_id' => $course_id,
                 'trainee_id' => $lastInsertedID,
		 'cert_code' => $randomString,
                   ]);
                $course = Course::create($order);
		 return $this->sendResponse(new CourseResource($course), 'Course created successfully.');
		}
                 return $this->sendResponse(new CourseResource($data), 'Course created successfully.');
                 }
 		}
    }
}
    public function show($cat_id)
    {
        $course = Course::find($cat_id);
        if (is_null($course)) {
            return $this->sendError('Course not found.');
        }
        return $this->sendResponse(new CourseResource($course), 'Course retrieved successfully.');
    }

    public function update(Request $request, Course $course)
    {
        $input = $request->all();
        $input['Status'] =  (isset($input['Status']) && $input['Status'] == 'on') ? 1 : 0;
        $validator = Validator::make($input, [
            'cname' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $course->update($input);
        return  redirect()->back()->with('status', 'Course updated!');
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
