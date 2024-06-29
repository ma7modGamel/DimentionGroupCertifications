<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class StudentsImport implements ToCollection, WithHeadingRow, WithBatchInserts
{
    public $course_id;
    public function __construct($course_id)
    {
        
        $this->course_id =$course_id;
        
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $row['course_id'] = $this->course_id;


            $s = new Student();
            $s->course_id = $this->course_id;
            $s->name =  $row['name'];
            $s->email = $row['email'];
            $s->national_number = $row['national_number'];
            $s->mobile_number = $row['mobile_number'];
            $s->nationality = $row['nationality'];
            $s->certificate_num = "c" . $this->course_id . rand(100000,9999999) . rand(100,999);
            $s->save();
        
            
        }
    }
 

  
    public function batchSize(): int
    {
        return 1000;
    }
    
    public function headingRow(): int
    {
        return 1;
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
