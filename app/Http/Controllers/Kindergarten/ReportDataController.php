<?php

namespace App\Http\Controllers\Kindergarten;

use App\Http\Controllers\Controller;
use App\Models\KindergartenReportData;
use App\Models\KindergartenAssesmentRecordDetail;
use App\Models\KindergartenStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportDataController extends Controller
{
    public function index()
    {
        $title = 'Report Data';
        $path = 'Report';
        $datas = DB::table('kindergarten_report_data')->orderBy('id', 'DESC')->get();
        return view('kindergarten/report_data/index', compact('title', 'path', 'datas'));
    }

    public function create()
    {
        $title = 'Create Report Data';
        $path = 'Report';
        $class = session('homeroom_class');

        $classes = DB::table('kindergarten_classes')->orderBy('id', 'DESC')->get();
        $academic_year = DB::table('kindergarten_academic_years')->first();
        $students = DB::table('kindergarten_students')->orderBy('id', 'DESC')->get();
        return view('kindergarten/report_data/create', compact('title', 'path', 'classes', 'academic_year', 'students'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'academic_year' => 'required',
            'term' => 'required',
            'report_card_distribution' => 'required',
        ]);

        KindergartenReportData::create([
            'academic_year' => $request->academic_year,
            'term' => $request->term,
            'distribution_date' => now(),
        ]);

        return redirect()->route('kindergarten.report_data')->with('success', 'Data has been successfully saved');
    }

    public function edit(KindergartenReportData $reportData)
    {
        $title = 'Edit Report Data';
        $path = 'Report';
        return view('kindergarten/report_data/edit', compact('reportData', 'title', 'path'));
    }

    public function update(Request $request, KindergartenReportData $reportData)
    {
        $validated = $request->validate([
            'academic_year' => 'required',
            'term' => 'required',
            'distribution_date' => 'required',
        ]);

        $reportData->update($validated);

        return redirect()
            ->route('kindergarten.report_data')
            ->with('success', 'Data report berhasil diperbarui!');
    }

    public function destroy(KindergartenReportData $reportData)
    {
        $reportData->delete();
        return redirect()->route('kindergarten.report_data')->with('success', 'Data report berhasil dihapus!');
    }


}

