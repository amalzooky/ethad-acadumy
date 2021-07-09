<?php 

namespace App\Exports;

use App\Major;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class MajorsExport implements FromCollection,WithHeadings,WithMapping
{
    public function collection()
    {

        return Major::all();
    }

 

    public function map($major): array
    {
        return [
            $major->id,
            $major->name,
            $major->is_active ? __("global.active") : __("global.inactive") ,
            formatDT($major->created_at),
            formatDT($major->updated_at)
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __("dashboard.major.name"),
            __("global.status"),
            __("global.created_at"),
            __("global.updated_at")
        ];
    }
}