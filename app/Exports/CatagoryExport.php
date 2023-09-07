<?php

namespace App\Exports;

use App\Models\Catagory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CatagoryExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Catagory::all(['id', 'catagory_name', 'description']);
    }

    public function headings(): array
    {
        return [
            'ID',
            'CATEGORY NAME',
            'DESCRIPTION',
        ];
    }
}
