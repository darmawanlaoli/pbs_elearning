<?php

namespace App\Imports;

use App\Models\PrimaryAssesmentRecordDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class MandarinPrimaryAssesmentRecordImport implements ToModel, WithHeadingRow, WithStartRow, WithEvents
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
            'mandarin_understands_vocabulary' => $row['understands_vocabulary_and_grammar'],
            'mandarin_writes_characters'   => $row['writes_characters_with_correct_stroke'],
            'mandarin_neatness'   => $row['neatness_and_cleanliness'],
            'mandarin_correct_intonation'   => $row['correct_intonation_and_pronunciation'],
            'mandarin_reads_fluently'   => $row['reads_fluently'],
            'mandarin_able_to_pronounce'   => $row['is_able_to_pronounce_word_properly'],
            'mandarin_able_to_transfer_the_words'   => $row['is_able_to_transfer_the_words_listened_into_written_form'],
        ]);
    }

    // Mapping heading row (row ke-3)
    public function headingRow(): int
    {
        return 4;
    }
}
