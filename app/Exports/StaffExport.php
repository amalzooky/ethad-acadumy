<?php 

namespace App\Exports;

use App\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class StaffExport implements FromCollection,WithHeadings,WithMapping
{
    public function collection()
    {

        return Staff::latest()->get();
    }

 

    public function map($staff): array
    {
        return [
            $staff->id,
            $staff->user->full_name,
            $staff->user->mobile_number,
            $staff->user->email,
            $staff->user->getRoleNames()[0],
            $staff->user->is_active ? __("global.active") : __("global.inactive") ,
            formatDT($staff->created_at),
            formatDT($staff->updated_at)
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __("global.full_name"),
            __("global.mobile_number"),
            __("global.email"),
            __("dashboard.roles.role"),
            __("global.status"),
            __("global.created_at"),
            __("global.updated_at")
        ];
    }
}