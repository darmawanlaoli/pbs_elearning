<?php

namespace App\Http\Controllers\PrimaryTeacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\PrimaryUts;
use App\Models\PrimarySubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UtsController extends Controller
{
    public function index()
    {
        $title = 'Unit to Study';
        $path = 'Primary Teacher';
        $lessonplans = DB::table('primary_uts')
            ->where('teacher', session('name'))
            ->get();
        return view('primaryteacher/uts/index', compact('title', 'path', 'lessonplans'));
    }

    public function create(){
        $title = 'Input Lesson Plan';
        $path = 'Lesson Plan';
        $academicyears = AcademicYear::first();
        $subjects = PrimarySubject::all();

        return view('primaryteacher/uts/create', compact('title', 'path', 'academicyears', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'academic_year' => 'required|string',
                'term' => 'required|string',
                'class' => 'required|string',
                'subject' => 'required|string',
                'uts' => 'required',
            ],

        );

        PrimaryUts::create([
            'subject' => $request->subject,
            'term' => $request->term,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'uts' => $request->uts,
            'teacher' => session('name')
        ]);

        return redirect()->route('primary_teacher.uts')->with('success', 'Data has been successfully saved');
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
        $lessonplan = PrimaryUts::findOrFail($id);
        $lessonplan->delete();

        return redirect()->route('primary_teacher.uts')->with(['success' => 'Data has been successfully deleted']);
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
        $lessonplan = PrimaryUts::findOrFail($id);

        return view('primaryteacher/uts/detail', compact('title', 'path', 'lessonplan'));
    }
}
