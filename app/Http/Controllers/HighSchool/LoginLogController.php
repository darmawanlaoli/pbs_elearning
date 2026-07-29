<?php

namespace App\Http\Controllers\HighSchool;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginLogController extends Controller
{
    public function index()
    {
        $title = 'Login Log';
        $path = 'Tools';
        $logs = DB::table('login_logs')
            ->orderBy('id', 'DESC')
            ->get();
        return view('high_school/login_logs/index', compact('title', 'path', 'logs'));
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
            ->get();

        if (!$lessonmaterial) {
            return redirect()->route('hsstudent.lesson_material')->with('error', 'Lesson material not found.');
        }

        return view('hsstudent/lessonmaterial/show', compact('title', 'path', 'lessonmaterial'));
    }
}
