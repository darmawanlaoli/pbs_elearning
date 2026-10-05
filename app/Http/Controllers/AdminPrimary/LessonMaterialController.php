<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsProjectFormulation;
use App\Models\PrimarySubject;
use App\Models\PrimaryLessonMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonMaterialController extends Controller
{
    public function index()
    {
        $title = 'Lesson Material';
        $path = 'Academic';
        $subjects = PrimarySubject::all();
        $lessonmaterial = DB::table('hs_lesson_materials')
            ->where('class', session('class'))
            ->get();
        $materialCounts = DB::table('primary_lesson_materials')
            ->select('subject', DB::raw('count(*) as total'))
            ->groupBy('subject')
            ->pluck('total', 'subject');
        return view('adminprimary/lessonmaterial/index', compact('title', 'path', 'lessonmaterial', 'subjects', 'materialCounts'));
    }



    public function show($subject)
    {
        $title = 'Lesson Material';
        $path = 'Lesson Material';
        $lessonmaterial = DB::table('primary_lesson_materials')
            ->where('subject', $subject)
            ->get();

        if (!$lessonmaterial) {
            return redirect()->route('primary_student.lesson_material')->with('error', 'Lesson material not found.');
        }

        return view('adminprimary/lessonmaterial/show', compact('title', 'path', 'lessonmaterial'));
    }
}
