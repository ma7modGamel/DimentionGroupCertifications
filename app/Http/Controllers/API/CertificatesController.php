<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Course;
use App\Models\Theme;
use App\Models\User;
use Validator;
use App\Http\Resources\TraineeCourse as TraineeCourseResource;
use App\Http\Resources\Course as CourseResource; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;    
use Image;
use File;

class CertificatesController extends BaseController
{
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('/');
        }  
        
    }
  
    public function store(Request $request)
    {

        $validator = Validator::make( $request->all(), [
            'theme_title' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $theme_title =  $request->get('theme_title');


        $student_national_number =  $request->get('student_national_number');
        $student_national_number_x =  $request->get('student_national_number_x') ??  285;
        $student_national_number_y =  $request->get('student_national_number_y') ??  295;
        $student_national_number_font_size =  $request->get('student_national_number_font_size') && $request->get('student_national_number_font_size') > 0 ?   $request->get('student_national_number_font_size') : 30;
        $student_national_number_font_color =  $request->get('student_national_number_font_color') ??  '000';

        $student_name =  $request->get('student_name');
        $student_name_x =  $request->get('student_name_x') ??  220;
        $student_name_y =  $request->get('student_name_y') ??  220;
        $student_name_font_size =  $request->get('student_name_font_size') && $request->get('student_name_font_size') > 0 ?   $request->get('student_name_font_size') : 30;
        $student_name_font_color =  $request->get('student_name_font_color') ??  '000';


        $student_nationality =  $request->get('student_nationality');
        $student_nationality_x =  $request->get('student_nationality_x') ??  295;
        $student_nationality_y =  $request->get('student_nationality_y') ??  395;
        $student_nationality_font_size =  $request->get('student_nationality_font_size') && $request->get('student_nationality_font_size') > 0 ?   $request->get('student_nationality_font_size') : 30;
        $student_nationality_font_color =  $request->get('student_nationality_font_color') ??  '000';
        
        
        $certificate_number =  $request->get('certificate_number');
        $certificate_number_x =  $request->get('certificate_number_x') ??  295;
        $certificate_number_y =  $request->get('certificate_number_y') ??  395;
        $certificate_number_font_size =  $request->get('certificate_number_font_size') && $request->get('certificate_number_font_size') > 0 ?   $request->get('certificate_number_font_size') : 30;
        $certificate_number_font_color =  $request->get('certificate_number_font_color') ??  '000';
        $img = Image::make(public_path('images/new-bg.jpg'));
        $name = round(microtime(true) * 1000);
        $img->save(public_path("images/{$name}.jpg")); 


        $student_name_align = $request->get('student_name_align') ?? 'right';
        $student_national_number_align = $request->get('student_national_number_align') ?? 'right';
        $student_nationality_align = $request->get('student_nationality_align') ?? 'right';
        $certificate_number_align = $request->get('certificate_number_align') ?? 'right';


        $qr_x =  $request->get('qr_x') ??  40;
        $qr_y =  $request->get('qr_y') ??  45;
        $qr_size =  $request->get('qr_size') &&  $request->get('qr_size') > 0 ?  $request->get('qr_size') : 60;
        $qr_position =  $request->get('qr_position') ??  'bottom-left';
                $qr_color =  $request->get('qr_color') ??  '000';

        $page =  $request->get('page') ??  'portrait';

        $theme = Theme::create([
			'theme_title' => $theme_title,
			'back_imge' => "{$name}.jpg",

            'student_name' => $student_name,
			'student_name_x' => $student_name_x,
			'student_name_y' => $student_name_y,
			'student_name_font_size' => $student_name_font_size,
			'student_name_font_color' => $student_name_font_color,

			'student_national_number' => $student_national_number,
			'student_national_number_x' => $student_national_number_x,
			'student_national_number_y' => $student_national_number_y,
			'student_national_number_font_size' => $student_national_number_font_size,
			'student_national_number_font_color' => $student_national_number_font_color,

            'student_nationality' => $student_nationality,
			'student_nationality_x' => $student_nationality_x,
			'student_nationality_y' => $student_nationality_y,
			'student_nationality_font_size' => $student_nationality_font_size,
			'student_nationality_font_color' => $student_nationality_font_color,
			
            'certificate_number' => $certificate_number,
			'certificate_number_x' => $certificate_number_x,
			'certificate_number_y' => $certificate_number_y,
			'certificate_number_font_size' => $certificate_number_font_size,
			'certificate_number_font_color' => $certificate_number_font_color,
			
			
			
			'student_name_align'=> $student_name_align,
            'student_national_number_align'=> $student_national_number_align,
            'student_nationality_align'=> $student_nationality_align,
            'certificate_number_align'=> $certificate_number_align,
			'page' => $page,
            'qr_x' => $qr_x,
			'qr_y' => $qr_y,
			'qr_size' => $qr_size,
			'qr_position' => $qr_position,
			 'qr_color' => $qr_color,
		]);
        return $this->sendResponse( $theme , 'theme created!');

    }


    public function update(Request $request,$id){
        $img = Image::make(public_path('images/new-bg.jpg'));
        $name = round(microtime(true) * 1000);
        $img->save(public_path("images/{$name}.jpg")); 

	    $theme = Theme::find($id);
        
        if(File::exists(public_path("images/" . $theme->back_imge))) {
            File::delete(public_path("images/" . $theme->back_imge));
        }
        
        $theme->back_imge =  "{$name}.jpg";
        $theme->theme_title =  $request->get('theme_title') ??  $theme->theme_title;
        
        $theme->student_name =  $request->get('student_name') ??  $theme->student_name;
        $theme->student_name_x =  $request->get('student_name_x') ??  $theme->student_name_x;
        $theme->student_name_y =  $request->get('student_name_y') ??  $theme->student_name_y;
        $theme->student_name_font_size =  $request->get('student_name_font_size') ??  $theme->student_name_font_size;
        $theme->student_name_font_color =  $request->get('student_name_font_color') ??  $theme->student_name_font_color;

        $theme->student_national_number =  $request->get('student_national_number') ??  $theme->student_national_number;
        $theme->student_national_number_x =  $request->get('student_national_number_x') ??  $theme->student_national_number_x;
        $theme->student_national_number_y =  $request->get('student_national_number_y') ??  $theme->student_national_number_y;
        $theme->student_national_number_font_size =  $request->get('student_national_number_font_size') ??  $theme->student_national_number_font_size;
        $theme->student_national_number_font_color =  $request->get('student_national_number_font_color') ??  $theme->student_national_number_font_color;
        
        $theme->student_nationality =  $request->get('student_nationality') ??  $theme->student_nationality;
        $theme->student_nationality_x =  $request->get('student_nationality_x') ??  $theme->student_nationality_x;
        $theme->student_nationality_y =  $request->get('student_nationality_y') ??  $theme->student_nationality_y;
        $theme->student_nationality_font_size =  $request->get('student_nationality_font_size') ??  $theme->student_nationality_font_size;
        $theme->student_nationality_font_color =  $request->get('student_nationality_font_color') ??  $theme->student_nationality_font_color;
        
        $theme->certificate_number =  $request->get('certificate_number') ??  $theme->certificate_number;
        $theme->certificate_number_x =  $request->get('certificate_number_x') ??  $theme->certificate_number_x;
        $theme->certificate_number_y =  $request->get('certificate_number_y') ??  $theme->certificate_number_y;
        $theme->certificate_number_font_size =  $request->get('certificate_number_font_size') ??  $theme->certificate_number_font_size;
        $theme->certificate_number_font_color =  $request->get('certificate_number_font_color') ??  $theme->certificate_number_font_color;
        
        
        
        $theme->student_name_align =  $request->get('student_name_align') ??  $theme->student_name_align;
        $theme->student_national_number_align =  $request->get('student_national_number_align') ??  $theme->student_national_number_align;
        $theme->student_nationality_align =  $request->get('student_nationality_align') ??  $theme->student_nationality_align;
        $theme->certificate_number_align =  $request->get('certificate_number_align') ??  $theme->certificate_number_align;
        
        
        $theme->qr_x =  $request->get('qr_x') ??  $theme->qr_x;
        $theme->qr_y =  $request->get('qr_y') ??  $theme->qr_y;
        $theme->qr_size =  $request->get('qr_size') ??  $theme->qr_size;
        $theme->qr_position =  $request->get('qr_position') ??  $theme->qr_position;
        $theme->page =  $request->get('page') ??  $theme->page;
        $theme->qr_color =  $request->get('qr_color') ??  $theme->qr_color;
	

        $theme->save();
    

        return $this->sendResponse( $theme , 'theme update!');

    }

    public function destroy(Request $request, $id)
    {
        $Theme = Theme::find( $id );
        $Theme->delete();
        return  redirect()->back()->with('status', 'Theme deleted!');
    }
	
}
