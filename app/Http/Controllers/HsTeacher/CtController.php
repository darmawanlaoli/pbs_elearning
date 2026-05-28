<?php

namespace App\Http\Controllers\HsTeacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsProjectFormulation;
use App\Models\HsSubject;
use App\Models\PrimaryLessonPlan;
use App\Models\HsChapterTest;
use App\Models\PrimaryAssignChapterTests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CtController extends Controller
{
    public function index()
    {
        $title = 'Chapter Test';
        $path = 'High School Teacher';
        $lessonplans = DB::table('hs_chapter_tests')
            ->where('teacher', session('name'))
            ->get();
        return view('hsteacher/chapter_test/index', compact('title', 'path', 'lessonplans'));
    }

    public function create(){
        $title = 'Upload Chapter Test';
        $path = 'Upload Chapter Test';
        $subjects = HsSubject::all();

        return view('hsteacher/chapter_test/create', compact('title', 'path', 'subjects'));
    }

    public function store(Request $request)
    {
        // Validasi input umum
        $request->validate([
            'class' => 'required|string',
            'subject' => 'required|string',
            'date' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
        ]);

        // Inisialisasi variabel untuk disimpan
        $filePathOrLink = null;
        $type = $request->radioDefault;

        $request->validate([
            'file_upload' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png|max:15048', // max 2MB
        ]);

        $uploadedFile = $request->file('file_upload');
        $filename = Str::uuid() . '.' . $uploadedFile->getClientOriginalExtension();
        $filePathOrLink = $uploadedFile->storeAs('public/hs_chapter_test', $filename); // path di storage



        $filePathOrLink = null;

        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $filePathOrLink = time() . '_' . $file->getClientOriginalName();

            // local
            // $file->move(public_path('lesson_material'), $filePathOrLink);

            // hosting
            $destination = base_path('../../public_html/elearning/chapter_test');
            $file->move($destination, $filePathOrLink);
        }

        // Simpan ke database
        HsChapterTest::create([
            'class' => $request->class,
            'subject' => $request->subject,
            'description' => $request->description,
            'date' => $request->date,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'file' => $filePathOrLink,
            'teacher' => session('name'),
        ]);

        return redirect()->route('hs_teacher.ct')->with('success', 'Lesson material successfully saved.');
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
        $lessonMaterial = HsChapterTest::findOrFail($id);
        $lessonMaterial->delete();

        return redirect()->route('hs_teacher.ct')->with(['success' => 'Data has been successfully deleted']);
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

    public function assign($id)
    {
        $title = 'Assign Chapter Test';
        $path = 'Primary Teacher';
        $cts = HsChapterTest::findOrFail($id);
        $class = $cts->class;
        $cekAssign = DB::table('primary_assign_chapter_tests')
            ->where('ct_id', $id)
            ->first();
        $students = DB::table('hs_students')
            ->where('class', $class)
            ->get();
            
        if($cekAssign) {
            return redirect()->route('hs_teacher.ct')->with(['success' => 'Anda telah asign chapter test ini']);
        }else{
            return view('hsteacher/chapter_test/assign', compact('title', 'path', 'cts', 'students'));
        }
    }
    
    public function assignAction(Request $request)
    {
        $studentsData = $request->input('students'); // Ambil array students
    
        foreach ($studentsData as $student) {
            // Contoh: Simpan ke tabel pivot atau ke model tertentu
            DB::table('primary_assign_chapter_tests')->insert([
                'name' => $student['name'],
                'class' => $student['class'],
                'ct_id' => $student['id'],
                'status_upload' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return redirect()->route('hs_teacher.ct')->with(['success' => 'Students assigned successfully!']);
    }
    
    
    public function responses($id)
    {
        $title = 'Chapter Test Responses';
        $path = 'Primary Teacher';
        $cts = HsChapterTest::findOrFail($id);
        $class = $cts->class;
        $cekAssign = DB::table('primary_assign_chapter_tests')
            ->where('ct_id', $id)
            ->first();
        $students = DB::table('primary_assign_chapter_tests')
            ->where('ct_id', $id)
            ->get();
            
            
        if(!$cekAssign) {
            return redirect()->route('hs_teacher.ct')->with(['success' => 'Anda belum assign untuk test ini']);
        }else{
            return view('hsteacher/chapter_test/responses', compact('title', 'path', 'cts', 'students'));
        }
    }

}
