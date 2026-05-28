<?php

namespace App\Imports;

use App\Models\PrimaryAssesmentRecordDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class PePrimaryAssesmentRecordImport implements ToModel, WithHeadingRow, WithStartRow, WithEvents
{
    protected $class;

    protected $id_assesment;

    public function __construct($id_assesment)
    {
        $this->class = null;
        $this->id_assesment = $id_assesment;
    }

    // Tentukan data mulai dari row ke-4
    public function startRow(): int
    {
        return 5;
    }

    // Tangkap class dari row ke-2
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
                $worksheet = $event->getSheet()->getDelegate();
                $classRow = $worksheet->getCell('A2')->getValue(); // "Class: XII IPA 1"

                // Ambil hanya nama kelas (setelah "Class: ")
                $this->class = trim(str_replace('Class:', '', $classRow));
            },
        ];
    }

    // Simpan data siswa
    public function model(array $row)
    {
        return new PrimaryAssesmentRecordDetails([
            'id_assesment' => $this->id_assesment,
            'name'    => $row['name'],
            'concept' => $row['understranding_concept'],
            'pe_understand_rules'   => $row['understands_rules'],
            'pe_locomotors_movement'   => $row['use_variety_of_locomotors_movement'],
        ]);
    }

    // Mapping heading row (row ke-3)
    public function headingRow(): int
    {
        return 4;
    }
}
