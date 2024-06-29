<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Student extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'national_number','mobile_number','course_id','nationality','certificate_num'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
