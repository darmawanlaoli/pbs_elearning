<?php

namespace App\Exports;

use App\Models\PrimaryStudent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LangUpperPrimaryAssesmentRecordExport implements FromCollection, WithHeadings, WithStyles, WithEvents, ShouldAutoSize
{
    protected $class;
    protected $subject;

    public function __construct($class, $subject)
    {
        $this->class = $class;
        $this->subject = $subject;
    }

    public function collection()
    {
        $students = PrimaryStudent::where('class', $this->class)
            ->select('name')
            ->orderBy('name', 'ASC')
            ->get();

        // Tambahkan nomor urut manual
        $students = $students->map(function($item, $index) {
            return [
                'nomor'   => $index + 1,
                'name'    => $item->name
            ];
        });

        return $students;

    }

    public function headings(): array
    {
        return [
            ['ASSESMENT RECORD'],               // Judul
            ['Class', ": {$this->class} - UPPER"],      // Nama kelas
            ['Subject', ": {$this->subject}"],
            ['No', 'Name', 'Understranding Concept', 'Demonstrates neatness in writing', 'Writes with fluency', 'Reads accurately with understanding', 'Listens with understanding', 'Expresses ideas when speaking'],      // Header tabel
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]], // Judul tebal & besar
            2 => ['font' => ['bold' => true]],              // Baris class bold
            3 => ['font' => ['bold' => true]],              // Header tabel bold
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Merge cell untuk judul
                $event->sheet->mergeCells('A1:C1');

                // Style untuk header tabel (baris ke-3)
                $event->sheet->getStyle('A4:H4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'], // font putih
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '38ACEC'], // hijau (bisa diganti hex lain)
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}
