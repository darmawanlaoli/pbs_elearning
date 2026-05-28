<?php

namespace App\Http\Controllers\PrimaryTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryAssesmentRecord;
use App\Models\AcademicYear;
use App\Models\PrimarySubject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Exports\PrimaryAssesmentRecordExport;
use App\Imports\PrimaryAssesmentRecordImport;
use App\Models\PrimaryAssesmentRecordDetails;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Controller
{
    public function index(Request $request)
    {
        $title = 'Report';
        $path = 'Report Data';
        $students = DB::table('primary_students')->where('class', session('homeroom_class'))->get();
        $student = $request->student;
        if($student){
            $assesments = DB::table('primary_assesment_records')
            ->where('teacher', session('name'))
            ->get();

            $characterBuilding = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'Character Building')
                ->first();

            $mathematic = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'Mathematic')
                ->first();

            $records = DB::table('primary_assesment_record_details as d')
                    ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                    ->where('d.name', $student)
                    ->select(
                        'r.subject',
                        'r.term',
                        'd.concept',
                        'd.demonstrate',
                        'd.understand_rules',
                        'd.locomotors_movement'
                    )
                    ->get()
                    ->groupBy('subject');


            $subjects = $records->map(function ($rows, $subject) {
                $indicators = [];

                foreach (['concept', 'demonstrate', 'understand_rules', 'locomotors_movement'] as $indicator) {
                    // ambil nilai (null kalau tidak dipakai di subject tsb)
                    $scores = $rows->pluck($indicator)->filter();
                    if ($scores->isNotEmpty()) {
                        $indicators[$indicator] = [
                            'scores' => $scores,
                            'mean' => $scores->avg()
                        ];
                    }
                }

                return $indicators;
            });

            $class = session('homeroom_class');
            $means = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_demonstrate'),
                    DB::raw('AVG(d.understand_rules) as mean_understand_rules'),
                    DB::raw('AVG(d.locomotors_movement) as mean_locomotors_movement')
                )
                ->groupBy('r.subject')
                ->get()
                ->keyBy('subject');

        }else{
            $assesments = [];
            $characterBuilding = null;
            $records = [];
            $subjects = [];
        }

        return view('primaryteacher.report.index', compact(
                    'title',
                    'path',
                    'assesments',
                    'students',
                    'characterBuilding',
                    'records',
                    'subjects',
                    'means',
                ));
    }

    public function create(){
        $title = 'New Assesment Record';
        $path = 'Assesment Record';
        $academicyears = AcademicYear::first();
        $subjects = PrimarySubject::all();

        return view('primaryteacher/assesment_record/create', compact('title', 'path', 'academicyears', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'academic_year' => 'required|string',
                'term' => 'required|string',
                'class' => 'required|string',
                'subject' => 'required|string',
            ],

        );

        PrimaryAssesmentRecord::create([
            'subject' => $request->subject,
            'status' => 0,
            'term' => $request->term,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'teacher' => session('name')
        ]);

        return redirect()->route('primary_teacher.assesment_record')->with('success', 'Data has been successfully saved');
    }

    public function export($class)
    {
        return Excel::download(new PrimaryAssesmentRecordExport($class), "assesment_record-{$class}.xlsx");
    }

    public function import(Request $request)
    {
        $title = 'Import Assesment Record';
        $path = 'Assesment Record';
        $id_assesment = $request->id_assesment;
        $class = $request->class;
        $academicyear = $request->academic_year;
        $subject = $request->subject;
        $term = $request->term;

        $assesments = DB::table('primary_assesment_records')
            ->where('teacher', session('name'))
            ->get();

        $cekAssesment = PrimaryAssesmentRecordDetails::where('id_assesment', $id_assesment)->first();

        if ($cekAssesment) {
            return redirect()->back()->with('error', 'Data assesment sudah diimport sebelumnya');
        }

        return view('primaryteacher/assesment_record/import', compact('title', 'path', 'id_assesment', 'class', 'academicyear', 'assesments', 'term', 'subject'));
    }

    public function importAction(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $id_assesment = $request->id_assesment;

        Excel::import(new PrimaryAssesmentRecordImport($id_assesment), $request->file('file'));

        return redirect()->back()->with('success', 'Data siswa berhasil diimport');
    }

    public function destroy($id)
    {
        $deleted = DB::table('primary_assesment_record_details')->where('id_assesment', $id)->delete();
        $assesment = PrimaryAssesmentRecord::findOrFail($id);
        $assesment->delete();

        return redirect()->back()->with('success', 'Data has been successfully deleted');
    }

    public function detail($id)
    {
        $assesments = DB::table('primary_assesment_records')
            ->join('primary_assesment_record_details', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
            ->where('primary_assesment_records.id', $id)
            ->get();

        $subject = PrimaryAssesmentRecord::where('id', $id)->first();

        $title = 'Assesment Record Detail';
        $path = 'Assesment Record';
        return view('primaryteacher/assesment_record/detail', compact('title', 'path', 'assesments', 'subject'));
    }

    public function updateAll(Request $request)
    {
        $data = $request->input('assesments', []);

        foreach ($data as $id => $values) {
            \App\Models\PrimaryAssesmentRecordDetails::where('id', $id)->update([
                'concept'      => $values['concept'],
                'demonstrate'  => $values['demonstrate'],
                'updated_at'   => now(),
            ]);
        }

        return redirect()->back()->with('success', 'All records updated successfully!');
    }


}
