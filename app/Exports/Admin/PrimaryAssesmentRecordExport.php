<?php

namespace App\Exports\Admin;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PrimaryAssesmentRecordExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    WithEvents,
    ShouldAutoSize
{
    protected $id_ass;
    protected $assesment;

    public function __construct($id_ass)
    {
        $this->id = $id_ass;

        $this->assesment = DB::table('primary_assesment_records')
            ->where('id', $id_ass)
            ->first();
            
        dd($this->assesment);
    }

    public function collection()
    {
        $students = DB::table('primary_assesment_record_details')
            ->where('id_assesment', $this->id)
            ->select(
                'name',
                'concept',
                'demonstrate'
            )
            ->orderBy('name', 'ASC')
            ->get();

        return $students->values()->map(function ($item, $index) {
            return [
                'No' => $index + 1,
                'Name' => $item->name,
                'Understanding Concept' => $item->concept,
                'Demonstrate Knowledge' => $item->demonstrate,
            ];
        });
    }

    public function headings(): array
    {
        return [
            ['ASSESMENT RECORD'],
            ['Class', ": {$this->assesment->class}"],
            ['Subject', ": {$this->assesment->subject}"],
            ['Academic Year/Term', ": {$this->assesment->academic_year}"],
            ['No', 'Name', 'Understanding Concept', 'Demonstrate Knowledge'],
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 14
                ]
            ],

            2 => [
                'font' => [
                    'bold' => true
                ]
            ],

            3 => [
                'font' => [
                    'bold' => true
                ]
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $event->sheet->mergeCells('A1:D1');

                $event->sheet->getStyle('A6:D6')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => [
                            'rgb' => 'FFFFFF'
                        ],
                    ],

                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'rgb' => '38ACEC'
                        ],
                    ],

                    'alignment' => [
                        'horizontal' =>
                        \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}