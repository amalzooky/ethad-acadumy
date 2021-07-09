<?php 

namespace App\Exports;

use App\Lecture;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class LecturesExport implements FromCollection,WithHeadings,WithMapping
{
    public function collection()
    {

        return Lecture::latest()->get();
    }

 

    public function map($lecture): array
    {
        return [
            $lecture->id,
            $lecture->name,
            $lecture->subject->name,
            $lecture->teacher->user->full_name,
            $lecture->is_active ? __("global.active") : __("global.inactive") ,
            formatDT($lecture->created_at),
            formatDT($lecture->updated_at)
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __('dashboard.lecture.name'),
            __('dashboard.subject.name'),
            __('dashboard.lecture.teacher_name'),
            __('global.status'),
            __("global.created_at"),
            __("global.updated_at"),
           
        ];
    }
}