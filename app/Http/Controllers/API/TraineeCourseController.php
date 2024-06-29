<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course;
use Validator;
use App\Http\Resources\Course as CourseResource; 
class CoursesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	$courses = Course::all();
        return $this->sendResponse(CourseResource::collection($courses), 'Coursess retrieved successfully.');
    }

    public function getAll(Request $request)
    {
	 $cat_id  = $request->get('cat_id');
        $courses = Course::where('cat_id', '=', $cat_id)->whereNotNull('cat_id')->get();
        return $this->sendResponse(new CourseResource($courses), 'Courses retrieved successfully.');
  /* Execute the console command.
  *
  * @return mixed
  */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $course = Course::create($input);
        return $this->sendResponse(new CourseResource($course), 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cat_id)
    {
        $course = Course::find($cat_id);
  
        if (is_null($course)) {
            return $this->sendError('Course not found.');
        }
   
        return $this->sendResponse(new CourseResource($course), 'Course retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $course->name = $input['name'];
        $course->detail = $input['detail'];
        $course->save();
   
        return $this->sendResponse(new CategoryResource($course), 'Category updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $category)
    {
        $category->delete();
   
        return $this->sendResponse([], 'Course deleted successfully.');
    }
}
