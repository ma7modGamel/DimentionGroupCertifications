<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;    
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use PDF;
use File;
use Excel;
use Image;
use QrCode;
use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Support\Facades\URL;
use Johntaa\Arabic\I18N_Arabic;
use App\Mail\PublicEmail;
use App\Models\Course;

class CertificatesController  extends Controller
{
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('/');
        }  
        
    }

    public function index(){
    
        $themes = Theme::all();
      
        return view('admin/pages/certificates')->with([
            'themes' => $themes
        ]);
    }

    public function new(){

      return view('admin/pages/certificate-new')->with([]);
    }

    public function edit(Request $request,$id){
	    $theme = Theme::find($id);
	    
	    $new_bg =  $request->get('$new_bg');

	    if(!$new_bg){
	        $img = Image::make(public_path("images/" . $theme->back_imge));
            $img->save(public_path("images/new-bg.jpg"));  
	    }


        return view('admin/pages/certificate-edit')->with([
            'theme' => $theme,
        ]);
    }
    public function sendEmailAll(Request $request){
              $course_id = $request->course_id ??  null;
              
               $Course = Course::find($course_id);
        
        if(!$Course){
        abort(401);
      }
      
      
      $student = Student::with('course')->where([ "course_id" => $course_id])->chunk(100, function ($students) {
            foreach ($students as $student) {
               try {
           $link = \URL::signedRoute('certificates-download', ['certificate_num' => $student->certificate_num]);
      $details = [];
      $details['link'] = '<a class="" target="_blank"  href="'.  $link.'"> '. $link .' </a>';
      $details['name'] = $student->name;
      $course_name = $student->course? $student->course->cname : '';
      $details['course_name'] = $course_name;
                        \Mail::to($student->email)->send(new PublicEmail( $details, "شهادة $course_name | مجموعة أبعاد المعرفة", 'publicEmail', $student->email));

                } catch (\Throwable $th) {
                    // dd($th);
                    //throw $th;
                }
              
            }
        });
      
        
        return  redirect()->back()->with('status', 'Email send!');
    }
    

    public function sendEmail(Request $request){
          $certificate_num = $request->certificate_num ??  null;
        $student = Student::with('course')->where([ "certificate_num" => $certificate_num])->first();
        if(!$student){
        abort(401);
      }
      
      try {
      $link = \URL::signedRoute('certificates-download', ['certificate_num' => $certificate_num]);
      $details = [];
      $details['link'] = '<a class="" target="_blank"  href="'.  $link.'"> '. $link .' </a>';
      $details['name'] = $student->name;
      $course_name = $student->course? $student->course->cname : '';
      $details['course_name'] = $course_name;
                \Mail::to($student->email)->send(new PublicEmail( $details, "شهادة $course_name | مجموعة أبعاد المعرفة", 'publicEmail', $student->email));
        } catch (\Throwable $th) {
            // dd($th);
            //throw $th;
        }
              
        
        return  redirect()->back()->with('status', 'Email send!');

    }
    public function viewer(Request $request) {

 
        // create Image from file
        $img = Image::make(public_path('images/new-bg.jpg'));

        $Arabic = new I18N_Arabic('Glyphs'); 
        
        $student_name = $request->get('student_name')?  $Arabic->utf8Glyphs($request->get('student_name')) : null;

        $student_name_x =  $request->get('student_name_x') ??  220;
        $student_name_y =  $request->get('student_name_y') ??  220;
        $student_name_font_size =  $request->get('student_name_font_size') && $request->get('student_name_font_size') > 0 ?   $request->get('student_name_font_size') : 30;
        $student_name_font_color =  $request->get('student_name_font_color') ??  '000';
        $student_name_align =  $request->get('student_name_align') ??  'right';
        if($student_name){
            $img->text($student_name, $student_name_x ,$student_name_y, function ($font) use($student_name_font_color,$student_name_font_size,$student_name_align ) {
              $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
              $font->color('#' . $student_name_font_color);
              $font->align($student_name_align);
              $font->valign('middle');
              
              $font->size($student_name_font_size );
            });
        }

        $student_national_number = $request->get('student_national_number')?  $request->get('student_national_number') : null;

        $student_national_number_x =  $request->get('student_national_number_x') ??  285;
        $student_national_number_y =  $request->get('student_national_number_y') ??  295;
        $student_national_number_font_size =  $request->get('student_national_number_font_size') && $request->get('student_national_number_font_size') > 0 ?   $request->get('student_national_number_font_size') : 30;
        $student_national_number_font_color =  $request->get('student_national_number_font_color') ??  '000';
        $student_national_number_align =  $request->get('student_national_number_align') ??  'right';

        if($student_national_number){
          $img->text($student_national_number, $student_national_number_x ,$student_national_number_y, function ($font) use($student_national_number_align,$student_national_number_font_color,$student_national_number_font_size ) {
              $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
              $font->color('#' . $student_national_number_font_color);
              $font->align($student_national_number_align);
              $font->valign('middle');
              
              $font->size($student_national_number_font_size );
            });
        }

        $certificate_number = $request->get('certificate_number')?  $request->get('certificate_number') : null;
        $certificate_number_x =  $request->get('certificate_number_x') ??  285;
        $certificate_number_y =  $request->get('certificate_number_y') ??  295;
        $certificate_number_font_size =  $request->get('certificate_number_font_size') && $request->get('certificate_number_font_size') > 0 ?   $request->get('certificate_number_font_size') : 30;
        $certificate_number_font_color =  $request->get('certificate_number_font_color') ??  '000';
                $certificate_number_align =  $request->get('certificate_number_align') ??  'right';

        if($certificate_number){
          $img->text($certificate_number, $certificate_number_x ,$certificate_number_y, function ($font) use($certificate_number_align,$certificate_number_font_color,$certificate_number_font_size ) {
              $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
              $font->color('#' . $certificate_number_font_color);
              $font->align($certificate_number_align);
              $font->valign('middle');
              
              $font->size($certificate_number_font_size );
            });
        }

        $student_nationality = $request->get('student_nationality')?  $Arabic->utf8Glyphs($request->get('student_nationality')) : null;

        $student_nationality_x =  $request->get('student_nationality_x') ??  285;
        $student_nationality_y =  $request->get('student_nationality_y') ??  295;
        $student_nationality_font_size =  $request->get('student_nationality_font_size') && $request->get('student_nationality_font_size') > 0 ?   $request->get('student_nationality_font_size') : 30;
        $student_nationality_font_color =  $request->get('student_nationality_font_color') ??  '000';
        
        $student_nationality_align =  $request->get('student_nationality_align') ??  'right';

        if($student_nationality){
          $img->text($student_nationality, $student_nationality_x ,$student_nationality_y, function ($font) use($student_nationality_align,$student_nationality_font_color,$student_nationality_font_size ) {
              $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
              $font->color('#' . $student_nationality_font_color);
              $font->align($student_nationality_align);
              $font->valign('middle');
              
              $font->size($student_nationality_font_size );
            });
        }

        // create instance
        // $img_qr = Image::make(public_path('/QR_code_for_mobile_English_Wikipedia.svg.png'));

        $qr_x =  $request->get('qr_x') ??  40;
        $qr_y =  $request->get('qr_y') ??  45;
        $qr_size =  $request->get('qr_size') &&  $request->get('qr_size') > 0 ?  $request->get('qr_size') : 60;
        $qr_position =  $request->get('qr_position') ??  'bottom-left';
        $qr_color =  $request->get('qr_color') ??  '000000';

        // // resize image to fixed size
        // $img_qr->resize($qr_size, $qr_size);

        // $img_qr->save(public_path('images/qr-demo.png')); 

        // $img->insert(public_path('images/qr-demo.png'), $qr_position, $qr_x, $qr_y);

        $img->save(public_path('images/demo-new.jpg')); 
        $page = $request->get('page')??  'portrait';
        // $page = "portrait"; //landscape
        return view('admin/pages/viewer')->with([
            'qr_x'=> $qr_x,
            'page'=>$page,
              'qr_y'=> $qr_y,
                'qr_size'=> $qr_size,
                'qr_color'=>$qr_color
            ]);
      
        // $qr_x =  $request->get('qr_x') ??  40;
        // $qr_y =  $request->get('qr_y') ??  45;
        // $qr_size =  $request->get('qr_size') &&  $request->get('qr_size') > 0 ?  $request->get('qr_size') : 60;
        // $qr_position =  $request->get('qr_position') ??  'bottom-left';
        // // resize image to fixed size
        // $img_qr->resize($qr_size, $qr_size);

        // $img_qr->save(public_path('images/qr-demo.png')); 

        // $img->insert(public_path('images/qr-demo.png'), $qr_position, $qr_x, $qr_y);

        // $img->save(public_path('images/demo-new.jpg')); 

         return view('emails.publicEmail')->with([
        'details'=>'link'
        ]);
      
    }
  
    public function download(Request $request){

      
      if (! $request->hasValidSignature()) {
        abort(401);
      }

      $certificate_num = $request->certificate_num ??  null;

      if(!$certificate_num){
        abort(401);
      }
      $student = Student::where([ "certificate_num" => $certificate_num])->first();
      
      if(!$student){
        abort(401);
      }
      $Course = Course::find($student->course_id);
     
      if(!$Course){
        abort(401);
      }
      
       $theme = Theme::find($Course->theme_id);
      if(!$theme){
        abort(401);
      }

      $img = Image::make(public_path("images/" . $theme->back_imge));
      $Arabic = new I18N_Arabic('Glyphs'); 
        
      $student_name =  $Arabic->utf8Glyphs($student->name); 
      $student_name_x =  $theme->student_name_x ??  220;
      $student_name_y =  $theme->student_name_y ??  220;
      $student_name_font_size =  $theme->student_name_font_size && $theme->student_name_font_size > 0 ?   $theme->student_name_font_size : 30;
      $student_name_font_color =  $theme->student_name_font_color  ? $theme->student_name_font_color :  '000';
              $student_name_align = $theme->student_name_align??  'right';

      if($student_name){
          $img->text($student_name, $student_name_x ,$student_name_y, function ($font) use($student_name_align,$student_name_font_color,$student_name_font_size ) {
            $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
            $font->color('#' . $student_name_font_color);
            $font->align($student_name_align);
            $font->valign('middle');
            
            $font->size($student_name_font_size );
          });
      }

      $student_national_number =  $theme->student_national_number ? $student->national_number : null;
      $student_national_number_x =  $theme->student_national_number_x ??  285;
      $student_national_number_y =  $theme->student_national_number_y ??  295;
      $student_national_number_font_size =  $theme->student_national_number_font_size && $theme->student_national_number_font_size > 0 ?   $theme->student_national_number_font_size : 30;
      $student_national_number_font_color =  $theme->student_national_number_font_color  ? $theme->student_national_number_font_color :  '000';
              $student_national_number_align =   $theme->student_national_number_align ??  'right';


      if($student_national_number){
        $img->text($student_national_number, $student_national_number_x ,$student_national_number_y, function ($font) use($student_national_number_align,$student_national_number_font_color,$student_national_number_font_size ) {
            $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
            $font->color('#' . $student_national_number_font_color);
            $font->align($student_national_number_align);
            $font->valign('middle');
            
            $font->size($student_national_number_font_size );
          });
      }

      $student_nationality =  $theme->student_nationality ? $student->nationality : null;
      $student_nationality =  $Arabic->utf8Glyphs($student_nationality); 
      $student_nationality_x =  $theme->student_nationality_x ??  295;
      $student_nationality_y =  $theme->student_nationality_y ??  395;
      $student_nationality_font_size =  $theme->student_nationality_font_size && $theme->student_nationality_font_size > 0 ?   $theme->student_nationality_font_size : 30;
      $student_nationality_font_color =  $theme->student_nationality_font_color   ? $theme->student_nationality_font_color :  '000';
      
                    $student_nationality_align =   $theme->student_nationality_align   ??  'right';

      if($student_nationality){
        $img->text($student_nationality, $student_nationality_x ,$student_nationality_y, function ($font) use($student_nationality_align,$student_nationality_font_color,$student_nationality_font_size ) {
            $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
            $font->color('#' . $student_nationality_font_color);
            $font->align($student_nationality_align);
            $font->valign('middle');
            
            $font->size($student_nationality_font_size );
          });
      }
      
        $certificate_number =  $theme->certificate_number ? $student->certificate_num : null;
        $certificate_number_x =  $theme->certificate_number_x ??  295;
        $certificate_number_y =  $theme->certificate_number_y ??  395;
        $certificate_number_font_size =  $theme->certificate_number_font_size && $theme->certificate_number_font_size > 0 ?   $theme->certificate_number_font_size : 30;
        $certificate_number_font_color =  $theme->certificate_number_font_color   ? $theme->certificate_number_font_color :  '000';
                        $certificate_number_align =  $theme->certificate_number_align ??  'right';

        if($certificate_number){
          $img->text($certificate_number, $certificate_number_x ,$certificate_number_y, function ($font) use($certificate_number_align,$certificate_number_font_color,$certificate_number_font_size ) {
              $font->file(app()->publicPath() . '/ArbFONTS-Janna-LT-Regular.ttf');
              $font->color('#' . $certificate_number_font_color);
              $font->align($certificate_number_align);
              $font->valign('middle');
              
              $font->size($certificate_number_font_size );
            });
        }

      // create instance
      $img_qr = Image::make(public_path('/QR_code_for_mobile_English_Wikipedia.svg.png'));


      $qr_x =  $theme->qr_x ??  40;
      $qr_y =  $theme->qr_y ??  45;
      $qr_size =  $theme->qr_size &&  $theme->qr_size > 0 ?  $theme->qr_size : 60;
      $qr_position =  $theme->qr_position ??  'bottom-left';
    $qr_color =  $theme->qr_color ??  '000000';

      // resize image to fixed size
    //   $img_qr->resize($qr_size, $qr_size);

    //   $img_qr->save(public_path('images/qr-demo.png')); 

    //   $img->insert(public_path('images/qr-demo.png'), $qr_position, $qr_x, $qr_y);
      $course_id = $Course->cnum;
      $student_id = $student->id;
      $path = public_path("images/{$course_id}");
      File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
      $img->save(public_path("images/{$course_id}/{$student_id}.png")); 

        $fullPath = public_path("images/{$course_id}/{$student_id}.png");
       $page =  $theme->page ??  'portrait';
     
      
    //   return view('admin/pages/download')->with([
    //      "fullPath" => "/public/images/{$course_id}/{$student_id}.png",
    //      "page" => $page,
    //       'qr_x'=> $qr_x,
    //           'qr_y'=> $qr_y,
    //             'qr_size'=> $qr_size,
    //       ]);
    
    //   $pdf = PDF::loadHTML( QrCode::size($qr_size)->generate('https://certificate.dimensionsgroup.sa') );
      $pdf = PDF::loadView('admin/pages/download', [
         "fullPath" => "/public/images/{$course_id}/{$student_id}.png",
         "page" => $page,
          'qr_x'=> $qr_x,
              'qr_y'=> $qr_y,
                'qr_size'=> $qr_size,
                   'qr_color'=> $qr_color,
          ]);
    return $pdf->setPaper('a4', $page)->stream();
      return view('admin/pages/download')->with([
         "fullPath" => "/public/images/{$course_id}/{$student_id}.png"
          ]);;


    
    }
  

    public function QrCode(Request $request){

        $student_name = $request->get('student_name') ??  "Student Name";

        return view('admin/pages/QrCode')->with([
            'student_name' => $student_name,
        ]);
    }


    public function importStudents(Request $request){

    

      $array = Excel::import(new StudentsImport($request->course_id),$request->file);

      return  redirect()->back()->with('status', 'Student updated!');

    
    }

    public function importBgCertificate(Request $request){

      $img = Image::make($request->file);
      
    
    if(File::exists(public_path("images/new-bg.jpg'"))) {
            File::delete(public_path("images/new-bg.jpg'"));
        }
              $img->save(public_path('images/new-bg.jpg'));


        # Clear previous url from query string
        $previousUrl = strtok(url()->previous(), '?');
        
        return redirect()->to(
            $previousUrl . '?' . http_build_query(['$new_bg' => '$new_bg'])
        );


    
    }


        
}
