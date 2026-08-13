<?php

namespace App\Http\Controllers\Kindergarten;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssesmentRecordController extends Controller
{
    public function index()
    {
        $title = 'Assessment Record';
        $path = 'Report';
        $assessments = DB::table('kindergarten_assesment_records')->orderBy('id', 'DESC')->get();
        return view('kindergarten/assessment_record/index', compact('title', 'path', 'assessments'));
    }

    public function create()
    {
        $title = 'Create Assessment Record';
        $path = 'Report';
        $class = session('homeroom_class');

        $classes = DB::table('kindergarten_classes')->orderBy('id', 'DESC')->get();
        $academic_year = DB::table('kindergarten_academic_years')->first();
        $students = DB::table('kindergarten_students')->orderBy('id', 'DESC')->get();
        return view('kindergarten/assessment_record/create', compact('title', 'path', 'classes', 'academic_year', 'students'));
    }

    public function store(Request $request)
    {
        // Store logic here
    }

    public function detail()
    {
        $title = 'Assessment Record';
        $path = 'Report';
        $assessments = DB::table('kindergarten_assesment_records')->orderBy('id', 'DESC')->get();
        return view('kindergarten/assessment_record/index', compact('title', 'path', 'assessments'));
    }
}
