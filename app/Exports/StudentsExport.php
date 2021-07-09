<?php 

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class StudentsExport implements FromCollection,WithHeadings,WithMapping
{
    public function collection()
    {
        return Student::latest()->get();
    }

 

    public function map($student): array
    {   
        $subjects =[]; 
        foreach($student->subjects as $subject){
            $subjects[] = $subject->name;
        }  
        return [
            $student->id,
            $student->user->full_name,
            implode(",",$subjects),
            $student->user->mobile_number,
            $student->user->email,
            $student->user->is_active ? __("global.active") : __("global.inactive") ,
            formatDT($student->created_at),
            formatDT($student->updated_at)
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __("global.full_name"),
            __("dashboard.students.subjects"),
            __("global.mobile_number"),
            __("global.email"),
            __("global.status"),
            __("global.created_at"),
            __("global.updated_at")
        ];
    }
}