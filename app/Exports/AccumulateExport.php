<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AccumulateExport implements FromView
{
    protected $students;
    protected $subjects;
    protected $semester;
    protected $class;

    public function __construct(
        $students,
        $subjects,
        $semester,
        $class
    ) {

        $this->students = $students;
        $this->subjects = $subjects;
        $this->semester = $semester;
        $this->class = $class;
    }

    public function view(): View
    {
        return view(
            'adminprimary.accumulate.excel',
            [
                'students' => $this->students,
                'subjects' => $this->subjects,
                'semester' => $this->semester,
                'class' => $this->class,
            ]
        );
    }
}
