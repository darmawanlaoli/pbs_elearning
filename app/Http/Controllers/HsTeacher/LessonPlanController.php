<?php

namespace App\Http\Controllers\HsTeacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYearLp;
use App\Models\HsLessonPlan;
use App\Models\PrimaryLessonPlanPic;
use App\Models\HsSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonPlanController extends Controller
{
    public function index()
    {
        $title = 'Lesson Plan';
        $path = 'High School Teacher';
        $lessonplans = DB::table('hs_lesson_plans')
            ->where('teacher', session('name'))
            ->orderBy('id', 'desc')
            ->get();
        return view('hsteacher/lesson_plan/index', compact('title', 'path', 'lessonplans'));
    }

    public function create()
    {
        $title = 'Input Lesson Plan.';
        $path = 'Lesson Plan';
        $academicyears = AcademicYearLp::first();
        $subjects = HsSubject::all();

        return view('hsteacher/lesson_plan/create', compact('title', 'path', 'academicyears', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'academic_year' => 'required|string',
                'term' => 'required|string',
                'week' => 'required|string',
                'class' => 'required|string',
                'subject' => 'required|string',
                'activities' => 'required',
            ],

        );

        HsLessonPlan::create([
            'subject' => $request->subject,
            'week' => $request->week,
            'term' => $request->term,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'activities' => $request->activities,
            'teacher' => session('name')
        ]);

        return redirect()->route('hs_teacher.lesson_plan')->with('success', 'Data has been successfully saved');
    }

    public function edit(string $id): View
    {
        $title = 'Edit Lesson Plan';
        $path = 'High School Teacher';
        $lessonplan = HsLessonPlan::findOrFail($id);
        return view('hsteacher.lesson_plan.edit', compact('title', 'path', 'lessonplan'));
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'nama_cabang' => 'required|string',
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
                'alamat' => 'required|string',
            ],
            [
                'nama_cabang.required' => 'Nama cabang wajib diisi',
                'alamat.required' => 'Alamat wajib diisi',
                'password.required' => 'Password wajib diisi',
                'username.required' => 'Username wajib diisi',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'password.min' => 'Password minimal 8 karakter',
            ]

        );

        $beanch = Branch::findOrFail($id);

        $beanch->update([
            'nama_cabang' => $request->nama_cabang,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'pass' => $request->password,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('superadmin.data_cabang')->with(['success' => 'Data cabang berhasil diubah!']);
    }

    public function destroy($id)
    {
        $lessonplan = HsLessonPlan::findOrFail($id);
        $lessonplan->delete();

        return redirect()->route('hs_teacher.lesson_plan')->with(['success' => 'Data has been successfully deleted']);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query');

        $lessonplanes = HsLessonPlan::where('nama_cabang', 'LIKE', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('username', 'LIKE', "%$keyword%")
            ->get();

        return view('superadmin.cabang.partials.search_result', compact('branches'));
    }

    public function detail($id)
    {
        $title = 'Lesson Plan';
        $path = 'High School Teacher';
        $lessonplan = HsLessonPlan::findOrFail($id);

        return view('hsteacher/lesson_plan/detail', compact('title', 'path', 'lessonplan'));
    }
}
