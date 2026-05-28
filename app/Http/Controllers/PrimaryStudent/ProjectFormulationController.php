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

class ProjectFormulationController extends Controller
{
    public function index()
    {
        $title = 'Project Formulation';
        $path = 'Academic';
        $project_formulations = DB::table('hs_project_formulations')
            ->where('class', session('grade'))
            ->get();
        return view('hsstudent/projectformulation/index', compact('title', 'path', 'project_formulations'));
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
