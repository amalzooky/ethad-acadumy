<?php 

namespace App\Exports;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class RolesExport implements FromCollection,WithHeadings,WithMapping
{
    public function collection()
    {

        return Role::all();
    }

 

    public function map($role): array
    {
        return [
            $role->id,
            \Lang::has("dashboard.roles.".$role->name) ? __("dashboard.roles.".$role->name) : $role->name,
            formatDT($role->created_at),
            formatDT($role->updated_at)
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            __("dashboard.roles.name"),
            __("global.created_at"),
            __("global.updated_at")
        ];
    }
}