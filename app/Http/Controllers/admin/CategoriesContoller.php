<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class CategoriesContoller extends Controller
{
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('/');
        }  
        
    }

    public function index(){
    
        $categories = Category::all();
      
        return view('admin/pages/categories')->with([
            'categories' => $categories,
        ]);
    }
}
