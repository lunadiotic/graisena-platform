<?php

namespace App\Exports;

use App\Volunteer;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VolunteerExport implements FromArray, WithHeadings
{
    use Exportable;

    protected $volunteer;

    public function __construct(array $volunteer)
    {
        $this->volunteer = $volunteer;
    }

    public function array(): array
    {
        return $this->volunteer;
    }

    public function headings(): array
    {
        return [
            'No ID',
            'Nama',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Provinsi',
            'Kota / Kab',
            'Alamat',
            'Satus Perkawinan',
            'Pekerjaan',
            'Telepon',
            'Email',
            'Sosial Media',
            'Status',
        ];
    }
}
