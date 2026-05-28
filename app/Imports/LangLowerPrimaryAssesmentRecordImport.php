<?php

namespace App\Imports;

use App\Models\PrimaryAssesmentRecordDetails;
use App\Models\PrimaryAssesmentRecord;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class LangLowerPrimaryAssesmentRecordImport implements ToModel, WithHeadingRow, WithStartRow, WithEvents
{
    protected $class;
    protected $subject;
    protected $id_assesment;

    public function __construct($id_assesment)
    {
        $this->class = null;
        $this->subject = null;
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
                $subjectRow = $worksheet->getCell('A3')->getValue(); // "Subject: English"
                // Ambil hanya nama kelas (setelah "Class: ")
                $this->class = trim(str_replace('Class:', '', $classRow));
            },
        ];
    }

    public function model(array $row)
    {
        $subject = PrimaryAssesmentRecord::where('id', $this->id_assesment)->first();

        if ($subject->subject == 'ENGLISH') {
            $custome = $row['expresses_ideas_clearly_in_writing'];
        }else{
            $custome = $row['demonstrates_neatness_in_writing'];
        }
        return new PrimaryAssesmentRecordDetails([
            'id_assesment' => $this->id_assesment,
            'name'    => $row['name'],
            'concept'    => $row['understranding_concept'],
            'lang_neatness_in_writing' => $custome,
            'lang_writes_with_fluency'   => $row['writes_with_fluency'],
            'lang_reads_fluency'   => $row['reads_with_fluency'],
            'lang_reads_accurately'   => $row['reads_accurately_with_understanding'],
            'lang_listen_with_understanding'   => $row['listens_with_understanding'],
            'lang_expresses_ideas'   => $row['expresses_ideas_when_speaking'],
        ]);
    }

    // Mapping heading row (row ke-3)
    public function headingRow(): int
    {
        return 4;
    }
}
