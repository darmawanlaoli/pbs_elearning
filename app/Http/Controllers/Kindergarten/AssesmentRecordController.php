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
        return view('kindergarten/assessment_record/create', compact('title', 'path'));
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
