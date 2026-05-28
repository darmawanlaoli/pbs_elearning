<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryTeacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UtsReportController extends Controller
{
    public function index()
    {
        $title = 'Weekly Lesson Plan Report';
        $path = 'Lesson Plan';
        $teachers = PrimaryTeacher::all();
        $academicyears = \App\Models\AcademicYear::first();
        return view('adminprimary.uts_report.index', compact('title', 'path', 'teachers', 'academicyears'));
    }

    public function print(Request $request)
    {
        $request->validate(
            [
                'term' => 'required|string',
            ],
        );

        $term = $request->term;
        
        $guruBelumSubmit = DB::table('primary_lesson_plan_pics as pic')
            ->leftJoin('primary_uts as lp', function ($join) use ($term) {
                $join->on('pic.teacher', '=', 'lp.teacher')
                     ->on('pic.subject', '=', 'lp.subject')
                     ->on('pic.class', '=', 'lp.class')
                     ->where('lp.term', '=', $term);
            })
            ->whereNull('lp.id')
            ->where('pic.is_ct', 1)
            ->select('pic.teacher', 'pic.subject', 'pic.class')
            ->get();
    
        return view('adminprimary.uts_report.print', compact('guruBelumSubmit', 'term'));
    }
}
