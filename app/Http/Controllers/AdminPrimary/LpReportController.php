<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryTeacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class LpReportController extends Controller
{
    public function index()
    {
        $title = 'Weekly Lesson Plan Report';
        $path = 'Lesson Plan';
        $teachers = PrimaryTeacher::all();
        $academicyears = \App\Models\AcademicYear::first();
        return view('adminprimary.lesson_plan_report.index', compact('title', 'path', 'teachers', 'academicyears'));
    }

    public function print(Request $request)
    {
        $request->validate([
            'term' => 'required|string',
            'week' => 'required|string',
        ]);

        // Ambil data tahun akademik pertama
        $academicYearModel = \App\Models\AcademicYear::first();

        // Validasi/Fallback jika database academic_years kosong
        $currentAcademicYear = $academicYearModel ? $academicYearModel->academic_year : null;

        $week = $request->week;
        $term = $request->term;

        $guruBelumSubmit = DB::table('primary_lesson_plan_pics as pic')
            // Tambahkan $currentAcademicYear ke dalam klausa 'use'
            ->leftJoin('primary_lesson_plans as lp', function ($join) use ($term, $week, $currentAcademicYear) {
                $join->on('pic.teacher', '=', 'lp.teacher')
                    ->on('pic.subject', '=', 'lp.subject')
                    ->where('lp.academic_year', '=', $currentAcademicYear) // Ditambahkan '=' agar konsisten
                    ->where('lp.term', '=', $term)
                    ->where('lp.week', '=', $week);
            })
            ->whereNull('lp.id')
            ->select('pic.teacher', 'pic.subject', 'pic.class')
            ->orderBy('pic.teacher', 'ASC')
            ->orderBy('pic.class', 'ASC')
            ->get();

        return view('adminprimary.lesson_plan_report.print', compact('guruBelumSubmit', 'week', 'term'));
    }
}
