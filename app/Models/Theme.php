<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Theme extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    public $table = 'theme';

    protected $fillable = [
        'theme_title', 'back_imge', 

        'student_national_number',
        'student_national_number_x',
        'student_national_number_y',
        'student_national_number_font_size',
        'student_national_number_font_color',

        'student_name',
        'student_name_x',
        'student_name_y',
        'student_name_font_size',
        'student_name_font_color',
    
		 'student_nationality',
        'student_nationality_x',
        'student_nationality_y',
        'student_nationality_font_size',
        'student_nationality_font_color',
        
        'certificate_number',
        'certificate_number_x',
        'certificate_number_y',
        'certificate_number_font_size',
        'certificate_number_font_color',
        
        
        'student_name_align',
        'student_national_number_align',
        'student_nationality_align',
        'student_nationality_align',
        'certificate_number_align',
        
        
        'page',
        'qr_x',
        'qr_y',
        'qr_size',
         'qr_color',
        'qr_position',
    ];
}
