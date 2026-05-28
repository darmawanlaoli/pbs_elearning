<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryTeacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UtsController extends Controller
{
    public function index()
    {
        $title = 'Unit to Study';
        $path = 'Unit to Study';
        $teachers = PrimaryTeacher::all();
        $academicyears = \App\Models\AcademicYear::first();
        return view('adminprimary.uts.index', compact('title', 'path', 'teachers', 'academicyears'));
    }
    
    public function show(Request $request)
    {
        $request->validate(
            [
                'term' => 'required|string',
                'class' => 'required|string',
            ],

        );
        
        $term = $request->term;
        $class = $request->class;

        $uts = DB::table('primary_uts')
            ->where('term', $term)
            ->where('class', $class)
            ->orderBy('subject', 'asc')
            ->get();
        return view('adminprimary.uts.show', compact('uts', 'term', 'class'));
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
}
