<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Category;
use Validator;
use App\Http\Resources\Category as CategoryResource; 
class CategoryContoller extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->sendResponse(CategoryResource::collection($categories), 'Categories retrieved successfully.');
    }

    public function getAll(Request $request)
    {
        $perent_id  = $request->get('perent_id');
        $categories = Category::where('perent_id', '=', $perent_id)->whereNotNull('perent_id')->get();
        return $this->sendResponse(new CategoryResource($categories), 'Category retrieved successfully.');
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
        $input['perent_id'] = 0;
        $validator = Validator::make($input, [
            'cat_title' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $category = Category::create($input);
        return  redirect()->back()->with('status', 'Category created!');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($perent_id)
    {
        $category = Category::find($perent_id);
  
        if (is_null($category)) {
            return $this->sendError('Category not found.');
        }
   
        return $this->sendResponse(new CategoryResource($category), 'Category retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'cat_title' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $category->cat_title = $input['cat_title'];
        $category->save();
   
        return  redirect()->back()->with('status', 'Category updated!');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
   
        return  redirect()->back()->with('status', 'Category deleted!');
    }
}
