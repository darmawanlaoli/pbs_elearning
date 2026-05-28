<?php

namespace App\Http\Controllers\PrimaryTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryAssesmentRecord;
use App\Models\AcademicYear;
use App\Models\PrimaryReportSubject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Exports\PrimaryAssesmentRecordExport;
use App\Exports\PePrimaryAssesmentRecordExport;
use App\Exports\LangPrimaryAssesmentRecordExport;
use App\Exports\ArtPrimaryAssesmentRecordExport;
use App\Exports\MandarinPrimaryAssesmentRecordExport;

use App\Imports\PePrimaryAssesmentRecordImport;
use App\Imports\MandarinPrimaryAssesmentRecordImport;
use App\Imports\LangPrimaryAssesmentRecordImport;
use App\Imports\ArtPrimaryAssesmentRecordImport;

use App\Imports\PrimaryAssesmentRecordImport;
use App\Models\PrimaryAssesmentRecordDetails;
use Maatwebsite\Excel\Facades\Excel;

class AssesmentRecord extends Controller
{
    public function index()
    {
        $title = 'Input Assesment Record';
        $path = 'Assesment Record';
        $assesments = DB::table('primary_assesment_records')
            ->where('teacher', session('name'))
            ->get();
        return view('primaryteacher.assesment_record.index', compact('title', 'path', 'assesments'));
    }

    public function create(){
        $title = 'New Assesment Record';
        $path = 'Assesment Record';
        $academicyears = AcademicYear::first();
        $subjects = PrimaryReportSubject::all();

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

    public function export($class, $subject)
    {
        if($subject == 'HEALTH AND PHYSICAL EDUCATION') {
            return Excel::download(new PePrimaryAssesmentRecordExport($class, $subject), "Assesment Record - {$subject} - {$class}.xlsx");
        }elseif($subject == 'ENGLISH' || $subject == 'BAHASA INDONESIA') {
            return Excel::download(new LangPrimaryAssesmentRecordExport($class, $subject), "Assesment Record - {$subject} - {$class}.xlsx");
        }elseif($subject == 'ART AND CRAFT') {
            return Excel::download(new ArtPrimaryAssesmentRecordExport($class, $subject), "Assesment Record - {$subject} - {$class}.xlsx");
        }elseif($subject == 'MANDARIN') {
            return Excel::download(new MandarinPrimaryAssesmentRecordExport($class, $subject), "Assesment Record - {$subject} - {$class}.xlsx");
        }else{
            return Excel::download(new PrimaryAssesmentRecordExport($class, $subject), "Assesment Record - {$subject} - {$class}.xlsx");
        }

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
        $subject = $request->subject;

        if($subject == 'HEALTH AND PHYSICAL EDUCATION') {
            Excel::import(new PePrimaryAssesmentRecordImport($id_assesment), $request->file('file'));
        }elseif($subject == 'ENGLISH' || $subject == 'BAHASA INDONESIA') {
            Excel::import(new LangPrimaryAssesmentRecordImport($id_assesment), $request->file('file'));
        }elseif($subject == 'ART AND CRAFT') {
            Excel::import(new ArtPrimaryAssesmentRecordImport($id_assesment), $request->file('file'));
        }elseif($subject == 'MANDARIN') {
            Excel::import(new MandarinPrimaryAssesmentRecordImport($id_assesment), $request->file('file'));
        }else{
            Excel::import(new PrimaryAssesmentRecordImport($id_assesment), $request->file('file'));
        }

        return redirect()->route('primary_teacher.assesment_record')->with('success', 'Assesment record has been successfully saved');
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

        if($subject->subject == 'HEALTH AND PHYSICAL EDUCATION') {
            return view('primaryteacher/assesment_record/detail_pe', compact('title', 'path', 'assesments', 'subject'));
        }elseif($subject->subject == 'ENGLISH' || $subject->subject == 'BAHASA INDONESIA') {
            return view('primaryteacher/assesment_record/detail_lang', compact('title', 'path', 'assesments', 'subject'));
        }elseif($subject->subject == 'ART AND CRAFT') {
            return view('primaryteacher/assesment_record/detail_art', compact('title', 'path', 'assesments', 'subject'));
        }elseif($subject->subject == 'MANDARIN') {
            return view('primaryteacher/assesment_record/detail_mandarin', compact('title', 'path', 'assesments', 'subject'));
        } else {
            return view('primaryteacher/assesment_record/detail', compact('title', 'path', 'assesments', 'subject'));
        }

    }

    public function updateAll(Request $request)
    {
        $data = $request->input('assesments', []);

        // foreach ($data as $id => $values) {
        //     \App\Models\PrimaryAssesmentRecordDetails::where('id', $id)->update([
        //         'concept'      => $values['concept'],
        //         'demonstrate'  => $values['demonstrate'],
        //         'updated_at'   => now(),
        //     ]);
        // }

        foreach ($data as $id => $values) {
        $updateData = [];

        if (isset($values['concept'])) {
            $updateData['concept'] = $values['concept'];
        }
        if (isset($values['demonstrate'])) {
            $updateData['demonstrate'] = $values['demonstrate'];
        }

        // PE
        if (isset($values['pe_understand_rules'])) {
            $updateData['pe_understand_rules'] = $values['pe_understand_rules'];
        }

        if (isset($values['pe_locomotors_movement'])) {
            $updateData['pe_locomotors_movement'] = $values['pe_locomotors_movement'];
        }

        // ART
        if (isset($values['art_followed_direction'])) {
            $updateData['art_followed_direction'] = $values['art_followed_direction'];
        }

        if (isset($values['art_displayed_neat'])) {
            $updateData['art_displayed_neat'] = $values['art_displayed_neat'];
        }

        if (isset($values['art_finished_project'])) {
            $updateData['art_finished_project'] = $values['art_finished_project'];
        }

        if (!empty($updateData)) {
            $updateData['updated_at'] = now();
            \App\Models\PrimaryAssesmentRecordDetails::where('id', $id)->update($updateData);
        }
    }

        return redirect()->back()->with('success', 'All records updated successfully!');
    }


}
