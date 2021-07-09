<?php 

namespace App\Exports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class TeacherExport implements FromCollection,WithHeadings,WithMapping
{
    public function collection()
    {

        return Teacher::latest()->get();
    }

 

    public function map($teacher): array
    {
        return [
            $teacher->id,
            $teacher->user->full_name,
            $teacher->user->mobile_number,
            $teacher->user->email,
            $teacher->user->is_active ? __("global.active") : __("global.inactive") ,
            formatDT($teacher->created_at),
            formatDT($teacher->updated_at)
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __("global.full_name"),
            __("global.mobile_number"),
            __("global.email"),
            __("global.status"),
            __("global.created_at"),
            __("global.updated_at")
        ];
    }
}