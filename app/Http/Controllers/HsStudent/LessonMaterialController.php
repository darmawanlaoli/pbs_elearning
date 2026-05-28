<?php

namespace App\Http\Controllers\HsStudent;

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
            ->where('class', session('grade'))
            ->groupBy('subject')
            ->pluck('total', 'subject');
        return view('hsstudent/lessonmaterial/index', compact('title', 'path', 'lessonmaterial', 'subjects', 'materialCounts'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query');

        $lessonplanes = PrimaryLessonPlan::where('nama_cabang', 'LIKE', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('username', 'LIKE', "%$keyword%")
            ->get();

        return view('superadmin.cabang.partials.search_result', compact('branches'));
    }

    public function detail($id)
    {
        $title = 'Lesson Plan';
        $path = 'Primary Teacher';
        $lessonplan = PrimaryLessonPlan::findOrFail($id);

        return view('primaryteacher/lesson_plan/detail', compact('title', 'path', 'academicyears', 'subjects'));
    }

    public function show($subject)
    {
        $title = 'Lesson Material';
        $path = 'Lesson Material';
        $lessonmaterial = DB::table('hs_lesson_materials')
            ->where('subject', $subject)
            ->where('class', session('grade'))
            ->get();

        if (!$lessonmaterial) {
            return redirect()->route('hsstudent.lesson_material')->with('error', 'Lesson material not found.');
        }

        return view('hsstudent/lessonmaterial/show', compact('title', 'path', 'lessonmaterial'));
    }
}
