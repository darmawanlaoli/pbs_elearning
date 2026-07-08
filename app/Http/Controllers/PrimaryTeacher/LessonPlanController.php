<?php

namespace App\Http\Controllers\PrimaryTeacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYearLp;
use App\Models\PrimaryLessonPlan;
use App\Models\PrimarySubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonPlanController extends Controller
{
    public function index()
    {
        $title = 'Lesson Plan';
        $path = 'Primary Teacher';
        $lessonplans = DB::table('primary_lesson_plans')
            ->where('teacher', session('name'))
            ->get();
        return view('primaryteacher/lesson_plan/index', compact('title', 'path', 'lessonplans'));
    }

    public function create(){
        $title = 'Input Lesson Plan.';
        $path = 'Lesson Plan';
        $academicyears = AcademicYearLp::first();
        $subjects = PrimarySubject::all();

        return view('primaryteacher/lesson_plan/create', compact('title', 'path', 'academicyears', 'subjects'));
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

        PrimaryLessonPlan::create([
            'subject' => $request->subject,
            'week' => $request->week,
            'term' => $request->term,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'activities' => $request->activities,
            'teacher' => session('name')
        ]);

        return redirect()->route('primary_teacher.lesson_plan')->with('success', 'Data has been successfully saved');
    }

    public function edit(string $id): View
    {
        $title = 'Edit Cabang';
        $path = 'Master Data';
        $lessonplan = Branch::findOrFail($id);
        return view('superadmin.cabang.edit', compact('title', 'path', 'branch'));
    }

    public function update(Request $request, $id){

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
        $lessonplan = PrimaryLessonPlan::findOrFail($id);
        $lessonplan->delete();

        return redirect()->route('primary_teacher.lesson_plan')->with(['success' => 'Data has been successfully deleted']);
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

        return view('primaryteacher/lesson_plan/detail', compact('title', 'path', 'lessonplan'));
    }

    public function pic()
    {
        $title = 'Weekly Lesson Plan PIC';
        $path = 'Lesson Plan';
        $pics = PrimaryLessonPlan::orderBy('teacher', 'asc')->get();
        $academicyears = \App\Models\AcademicYear::first();
        return view('primaryteacher.lesson_plan.pic', compact('title', 'path', 'pics', 'academicyears'));
    }
}
