<?php

namespace App\Http\Controllers\HsTeacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsProjectFormulation;
use App\Models\HsSubject;
use App\Models\PrimaryLessonPlan;
use App\Models\HsLessonMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Log;

class LessonMaterialController extends Controller
{
    public function index()
    {
        $title = 'Lesson Material';
        $path = 'High School Teacher';
        $lessonplans = DB::table('hs_lesson_materials')
            ->where('teacher', session('name'))
            ->get();
        return view('hsteacher/lesson_material/index', compact('title', 'path', 'lessonplans'));
    }

    public function create(){
        $title = 'Upload Lesson Material';
        $path = 'Upload Lesson Material';
        $subjects = HsSubject::all();

        return view('hsteacher/lesson_material/create', compact('title', 'path', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required|string',
            'subject' => 'required|string',
            'radioDefault' => 'required|in:link,upload',
        ]);

        $type = $request->radioDefault;
        $filePathOrLink = null;

        if ($type === 'upload') {

            $request->validate([
                'file_upload' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png|max:15048',
            ]);

            if ($request->hasFile('file_upload')) {

                $file = $request->file('file_upload');
                $filePathOrLink = time() . '_' . $file->getClientOriginalName();

                // Local
                $destination = public_path('lesson_material');

                // Hosting
                // $destination = base_path('../../public_html/elearning/lesson_material');

                $file->move($destination, $filePathOrLink);
            }
        } else {

            $request->validate([
                'file_link' => 'required|url|max:2048',
            ]);

            $filePathOrLink = $request->file_link;
        }

        DB::beginTransaction();

        try {

            $lessonMaterial = HsLessonMaterial::create([
                'class'       => $request->class,
                'subject'     => $request->subject,
                'description' => $request->description,
                'type'        => $type,
                'file'        => $filePathOrLink,
                'teacher'     => session('name'),
            ]);

            // Simpan ke tabel logs
            Log::create([
                'user'        => session('name'),
                'description'    => $request->description,
                'activity' => 'Teacher ' . session('name') . ' uploaded lesson material "' . $request->subject . '" for class ' . $request->class,
                'grade'  => $request->class,
                'role'   => 'HS Teacher',
                'created_at'  => now(),
            ]);

            DB::commit();

            return redirect()
                ->route('hs_teacher.lesson_material')
                ->with('success', 'Lesson material successfully saved.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Failed to save lesson material. ' . $e->getMessage());
        }
    }

    public function store1(Request $request)
    {
        // Validasi input umum
        $request->validate([
            'class' => 'required|string',
            'subject' => 'required|string',
            'radioDefault' => 'required|in:link,upload',
        ]);

        // Inisialisasi variabel untuk disimpan
        $filePathOrLink = null;
        $type = $request->radioDefault;

        // Validasi dan proses berdasarkan tipe input
        if ($type === 'upload') {
            $request->validate([
                'file_upload' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png|max:15048', // max 2MB
            ]);

            $uploadedFile = $request->file('file_upload');
            $filename = Str::uuid() . '.' . $uploadedFile->getClientOriginalExtension();
            $filePathOrLink = $uploadedFile->storeAs('public/hs_lesson_material', $filename); // path di storage



            $filePathOrLink = null;

            if ($request->hasFile('file_upload')) {
                $file = $request->file('file_upload');
                $filePathOrLink = time() . '_' . $file->getClientOriginalName();

                // local
                // $file->move(public_path('lesson_material'), $filePathOrLink);

                // hosting
                $destination = base_path('../../public_html/elearning/lesson_material');
                $file->move($destination, $filePathOrLink);
            }

        } elseif ($type === 'link') {
            $request->validate([
                'file_link' => 'required|url|max:2048',
            ]);

            $filePathOrLink = $request->input('file_link');
        }

        // Simpan ke database
        HsLessonMaterial::create([
            'class' => $request->class,
            'subject' => $request->subject,
            'description' => $request->description,
            'type' => $type,
            'file' => $filePathOrLink,
            'teacher' => session('name'),
        ]);

        return redirect()->route('hs_teacher.lesson_material')->with('success', 'Lesson material successfully saved.');
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
        $lessonMaterial = HsLessonMaterial::findOrFail($id);
        $lessonMaterial->delete();

        return redirect()->route('hs_teacher.lesson_material')->with(['success' => 'Data has been successfully deleted']);
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
