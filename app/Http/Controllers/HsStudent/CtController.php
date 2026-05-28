<?php

namespace App\Http\Controllers\HsStudent;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsProjectFormulation;
use App\Models\HsSubject;
use App\Models\PrimaryAssignChapterTests;
use App\Models\HsChapterTest;
use App\Models\PrimaryLessonPlan;
use App\Models\PrimarySubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CtController extends Controller
{
    public function index()
    {
        $title = 'Chapter Test';
        $path = 'Academic';
        $cts = DB::table('primary_assign_chapter_tests')
                ->select('hs_chapter_tests.subject', 'hs_chapter_tests.date', 'hs_chapter_tests.file', 'primary_assign_chapter_tests.id as ids', 'hs_chapter_tests.id', 'hs_chapter_tests.jam_mulai', 'hs_chapter_tests.class')
                ->join('hs_chapter_tests', 'primary_assign_chapter_tests.ct_id', '=', 'hs_chapter_tests.id')
                ->where('primary_assign_chapter_tests.name', session('name'))
                ->get();
                
        
        return view('hsstudent/chapter_test/index', compact('title', 'path', 'cts'));
    }

    public function detail($id)
    {
        $title = 'Upload Chapter Test';
        $path = 'Primary Student';
        $cts = DB::table('primary_assign_chapter_tests')
                ->select('hs_chapter_tests.subject', 'hs_chapter_tests.date', 'primary_assign_chapter_tests.file as file_response', 'primary_assign_chapter_tests.id as ids', 'primary_assign_chapter_tests.status_upload', 'hs_chapter_tests.jam_mulai', 'hs_chapter_tests.class')
                ->join('hs_chapter_tests', 'primary_assign_chapter_tests.ct_id', '=', 'hs_chapter_tests.id')
                ->where('primary_assign_chapter_tests.name', session('name'))
                ->where('primary_assign_chapter_tests.id', $id)
                ->first();

        return view('hsstudent/chapter_test/detail', compact('title', 'path', 'cts'));
    }
    
    public function upload(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png|max:2048', // max 2MB
        ]);
    
        $user = PrimaryAssignChapterTests::findOrFail($id);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
    
            // Simpan ke folder public_html
            $destination = base_path('../../public_html/elearning/hs_chapter_test_responses');
            $file->move($destination, $filename);
    
            // Simpan nama file ke database
            date_default_timezone_set('Asia/Jakarta');
            $user->update([
                'file' => $filename,
                'status_upload' => 1,
                'update_at' => date('Y-m-d H:i:s')
            ]);
    
            return back()->with('success', 'File berhasil diupload.');
        }
    
        return back()->with('error', 'Tidak ada file yang diupload.');
    }
}
