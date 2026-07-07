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
        $request->validate(
            [
                'term' => 'required|string',
                'week' => 'required|string',
            ],
        );

        $week = $request->week;
        $term = $request->term;

        $guruBelumSubmit = DB::table('primary_lesson_plan_pics as pic')
            ->leftJoin('primary_lesson_plans as lp', function ($join) use ($term, $week) {
                $join->on('pic.teacher', '=', 'lp.teacher')
                     ->on('pic.subject', '=', 'lp.subject')
                     ->where('lp.academic_year', '=', \App\Models\AcademicYear::first()->id)
                     ->where('lp.term', '=', $term)
                     ->where('lp.week', '=', $week);
            })
            ->whereNull('lp.id')
            ->select('pic.teacher', 'pic.subject', 'pic.class')
            ->get();

        return view('adminprimary.lesson_plan_report.print', compact('guruBelumSubmit', 'week', 'term'));
    }
}
