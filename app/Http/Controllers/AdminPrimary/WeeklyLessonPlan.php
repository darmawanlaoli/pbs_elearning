<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryTeacher;
use App\Models\PrimaryLessonPlanPic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class WeeklyLessonPlan extends Controller
{
    public function index()
    {
        $title = 'Weekly Lesson Plan';
        $path = 'Lesson Plan';
        $teachers = PrimaryTeacher::all();
        $academicyears = \App\Models\AcademicYear::first();
        return view('adminprimary.lesson_plan.index', compact('title', 'path', 'teachers', 'academicyears'));
    }

    public function print(Request $request)
    {
        $request->validate(
            [
                'term' => 'required|string',
                'week' => 'required|string',
                'class' => 'required|string',
            ],

        );

        $week = $request->week;
        $term = $request->term;
        $class = $request->class;
        $startdate = $request->start_date;
        $enddate = $request->end_date;

        $lessonplan = DB::table('primary_lesson_plans')
            ->where('week', $week)
            ->where('term', $term)
            ->where('class', $class)
            ->orderBy('subject', 'asc')
            ->get();
        return view('adminprimary.lesson_plan.print', compact('lessonplan', 'week', 'term', 'class', 'startdate', 'enddate'));
    }

    public function pic()
    {
        $title = 'Weekly Lesson Plan PIC';
        $path = 'Lesson Plan';
        $pics = PrimaryLessonPlanPic::orderBy('teacher', 'asc')->get();
        $academicyears = \App\Models\AcademicYear::first();
        return view('adminprimary.lesson_plan.pic', compact('title', 'path', 'pics', 'academicyears'));
    }
}
