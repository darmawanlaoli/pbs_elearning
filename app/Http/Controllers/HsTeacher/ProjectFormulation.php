<?php

namespace App\Http\Controllers\HsTeacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsProjectFormulation;
use App\Models\HsSubject;
use App\Models\PrimaryLessonPlan;
use App\Models\PrimarySubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectFormulation extends Controller
{
    public function index()
    {
        $title = 'Project Formulation';
        $path = 'High School Teacher';
        $lessonplans = DB::table('hs_project_formulations')
            ->where('teacher', session('name'))
            ->get();
        return view('hsteacher/project_formulation/index', compact('title', 'path', 'lessonplans'));
    }

    public function create(){
        $title = 'Upload Project Formulation';
        $path = 'Upload Project Formulation';
        $academicyears = AcademicYear::first();
        $subjects = HsSubject::all();

        return view('hsteacher/project_formulation/create', compact('title', 'path', 'academicyears', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'academic_year' => 'required|string',
                'term' => 'required|string',
                'class' => 'required|string',
                'subject' => 'required|string',
            ],

        );

        $fileName = null;

        if ($request->hasFile('project_formulation')) {
            $file = $request->file('project_formulation');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // local
            // $file->move(public_path('project_formulation'), $fileName);

            // hosting
            $destination = base_path('../../public_html/elearning/project_formulation');
            $file->move($destination, $fileName);
        }

        HsProjectFormulation::create([
            'subject' => $request->subject,
            'term' => $request->term,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'project_formulation' => $fileName,
            'teacher' => session('name'),
        ]);

        return redirect()->route('hs_teacher.project_formulation')->with('success', 'Data has been successfully uploaded');
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
        $lessonplan = HsProjectFormulation::findOrFail($id);
        $lessonplan->delete();

        return redirect()->route('hs_teacher.project_formulation')->with(['success' => 'Data has been successfully deleted']);
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
}
