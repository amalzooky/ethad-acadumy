<?php 

namespace App\Exports;

use App\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class SubjectsExport implements FromCollection,WithHeadings,WithMapping
{
    public function collection()
    {

        return Subject::all();
    }

 

    public function map($subject): array
    {
        return [
            $subject->id,
            $subject->name,
            $subject->major->name,
            $subject->is_active ? __("global.active") : __("global.inactive") ,
            formatDT($subject->created_at),
            formatDT($subject->updated_at)
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __("dashboard.subject.name"),
            __("dashboard.major.name"),
            __("global.status"),
            __("global.created_at"),
            __("global.updated_at")
        ];
    }
}