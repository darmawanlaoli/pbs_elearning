<?php

namespace App\Http\Controllers\Kindergarten;

use App\Http\Controllers\Controller;
use App\Models\KindergartenReportData;
use App\Models\KindergartenAssesmentRecordDetail;
use App\Models\KindergartenStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KindergartenStudentImport;

class StudentDataController extends Controller
{
    public function index()
    {
        $title = 'Student Data';
        $path = 'Student';
        $datas = DB::table('kindergarten_students')->orderBy('id', 'DESC')->get();
        return view('kindergarten/student_data/index', compact('title', 'path', 'datas'));
    }

    public function create()
    {
        $title = 'Create Student Data';
        $path = 'Student';
        $class = session('homeroom_class');

        $classes = DB::table('kindergarten_classes')->orderBy('id', 'DESC')->get();
        $academic_year = DB::table('kindergarten_academic_years')->first();
        $students = DB::table('kindergarten_students')->orderBy('id', 'DESC')->get();
        return view('kindergarten/student_data/create', compact('title', 'path', 'classes', 'academic_year', 'students'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'academic_year' => 'required',
            'term' => 'required',
            'report_card_distribution' => 'required',
        ]);

        KindergartenStudent::create([
            'academic_year' => $request->academic_year,
            'term' => $request->term,
            'distribution_date' => now(),
        ]);

        return redirect()->route('kindergarten.student_data')->with('success', 'Data has been successfully saved');
    }

    public function edit(KindergartenStudent $studentData)
    {
        $title = 'Edit Student Data';
        $path = 'Student';
        return view('kindergarten/student_data/edit', compact('studentData', 'title', 'path'));
    }

    public function update(Request $request, KindergartenStudent $studentData)
    {
        $validated = $request->validate([
            'name' => 'required',
            'class' => 'required',
            'registration_number' => 'required',
            'grade' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'first_day_of_school' => 'required|date',
            'name_of_parents' => 'required',
            'teachers' => 'required',
            'address' => 'required',
        ]);

        $studentData->update($validated);

        return redirect()
            ->route('kindergarten.student_data')
            ->with('success', 'Data student berhasil diperbarui!');
    }

    public function destroy(KindergartenStudent $studentData)
    {
        $studentData->delete();
        return redirect()->route('kindergarten.student_data')->with('success', 'Data student berhasil dihapus!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048'
        ]);

        try {
            Excel::import(new KindergartenStudentImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data siswa berhasil diimport!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

}

