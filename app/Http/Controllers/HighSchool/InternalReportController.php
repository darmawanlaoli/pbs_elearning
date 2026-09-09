<?php

namespace App\Http\Controllers\HighSchool;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsProjectFormulation;
use App\Models\HsSubject;
use App\Models\PrimaryLessonPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class InternalReportController extends Controller
{
    public function index()
    {
        $title = 'Internal Report';
        $path = 'Report';
        $classes = DB::table('hs_classes')
            ->orderBy('class', 'ASC')
            ->get();
        return view('high_school/internal_report/index', compact('title', 'path', 'classes'));
    }

    public function accumulated(string $class)
    {
        $title = 'Internal Accumulated';
        $path = 'Report';
        // 1. Ambil semua mata pelajaran untuk header tabel (sesuai urutan id)
        $subjects = DB::table('hs_subjects')->orderBy('id')->pluck('subject', 'id');

        // 2. Ambil data nilai dan gabungkan tabel (filter kelas jika perlu, misal: kelas tertentu)
        $rawData = DB::table('hs_assessment_record_details as detail')
            ->join('hs_assessment_records as record', 'detail.id_assesment', '=', 'record.id')
            ->join('hs_subjects as subject', 'record.subject', '=', 'subject.subject')
            ->select('detail.name', 'subject.subject as subject_name', 'detail.ku_total')
            ->orderBy('detail.name')
            ->get();


        // 3. Pivot data menggunakan Collection
        $students = $rawData->groupBy('name')->map(function ($items, $studentName) {
            $scores = [];
            foreach ($items as $item) {
                // Simpan nilai dengan key nama mata pelajaran
                $scores[$item->subject_name] = $item->ku_total;
            }



            return [
                'name' => $studentName,
                'scores' => $scores
            ];
        })->values();

        $assessmentLists = DB::table('hs_assessment_records')
            ->get();
        return view('high_school.assessment_record.internal_accumulated', compact('title', 'path', 'subjects', 'assessmentLists', 'class', 'students'));
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
