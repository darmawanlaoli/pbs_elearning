<?php

namespace App\Http\Controllers\HighSchool;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsProjectFormulation;
use App\Models\HsSubject;
use App\Models\PrimaryLessonPlan;
use App\Models\PrimarySubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonMaterialController extends Controller
{
    public function index()
    {
        $title = 'Lesson Material';
        $path = 'Academic';
        $subjects = HsSubject::all();
        $lessonmaterial = DB::table('hs_lesson_materials')
            ->where('class', session('grade'))
            ->get();
        $materialCounts = DB::table('hs_lesson_materials')
            ->select('subject', DB::raw('count(*) as total'))
            ->groupBy('subject')
            ->pluck('total', 'subject');
        return view('high_school/lesson_material/index', compact('title', 'path', 'lessonmaterial', 'subjects', 'materialCounts'));
    }

    public function show($subject)
    {
        $title = 'Lesson Material';
        $path = 'Lesson Material';
        $lessonmaterial = DB::table('hs_lesson_materials')
            ->where('subject', $subject)
            ->get();

        if (!$lessonmaterial) {
            return redirect()->route('hsstudent.lesson_material')->with('error', 'Lesson material not found.');
        }

        return view('high_school/lesson_material/show', compact('title', 'path', 'lessonmaterial'));
    }
}
