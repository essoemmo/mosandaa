<?php

namespace App\Exports;

use App\Models\Kid;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KidsExport implements FromCollection, WithHeadings ,WithMapping , WithStyles ,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kid::with('user')->ForAuthDayCare()->get();
    }

    public function headings(): array {
        return [
            'name',
            'stage_id',
            'phone',
            'sex',
            'class_room_id',
            'id_number',
            'birth_date',
            "blood_type_id",
            'height',
            'weight',
            'user_name',
            'user_email',
            'user_phone',
        ];
    }

    public function map($kid): array
    {
        return [
            $kid->name,
            $kid->stage_id,
            $kid->phone,
            $kid->sex,
            $kid->class_room_id,
            $kid->id_number,
            $kid->birth_date,
            $kid->blood_type_id,
            $kid->height,
            $kid->weight,
            $kid->user->name,
            $kid->user->email,
            $kid->user->phone,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true ] ],
        ];
    }
}
