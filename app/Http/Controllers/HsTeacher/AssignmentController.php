<?php

namespace App\Http\Controllers\HsTeacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsAssignment;
use App\Models\HsSubject;
use App\Models\PrimaryLessonPlan;
use App\Models\HsLessonMaterial;
use App\Models\HsStudent;
use App\Models\AssignmentResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Log;

class AssignmentController extends Controller
{
    public function index()
    {
        $title = 'Assignment';
        $path = 'High School Teacher';
        $assignments = DB::table('hs_assignments')
            ->where('teacher', session('name'))
            ->get();
        return view('hsteacher/assignments/index', compact('title', 'path', 'assignments'));
    }

    public function create(){
        $title = 'Upload Assignment';
        $path = 'Upload Assignment';
        $subjects = HsSubject::all();

        return view('hsteacher/assignments/create', compact('title', 'path', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required|string',
            'subject' => 'required|string',
            'radioDefault' => 'required|in:link,upload',
            'file_upload' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,jpg,jpeg,png|max:15048',
        ]);

        $type = $request->radioDefault;
        $filePathOrLink = null;

        if ($request->hasFile('file_upload')) {

            $file = $request->file('file_upload');
            $filePathOrLink = time() . '_' . $file->getClientOriginalName();

            // Local
            $destination = public_path('assignment');

            // Hosting
            // $destination = base_path('../../public_html/elearning/assignment');

            $file->move($destination, $filePathOrLink);
        }

        DB::beginTransaction();

        try {

            $assignment = HsAssignment::create([
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
                'activity' => 'Teacher ' . session('name') . ' uploaded Assignment "' . $request->subject . '" for class ' . $request->class,
                'grade'  => $request->class,
                'role'   => 'HS Teacher',
                'created_at'  => now(),
            ]);

            DB::commit();

            return redirect()
                ->route('hs_teacher.assignment')
                ->with('success', 'Assignment successfully saved.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Failed to save Assignment. ' . $e->getMessage());
        }
    }

    public function assign(Request $request, $id)
    {
        $assignment = HsAssignment::findOrFail($id);

        $assignmentResponse = AssignmentResponse::where('assignment_id', $assignment->id)->first();

        if ($assignmentResponse) {
            return redirect()
                ->route('hs_teacher.assignment')
                ->with('error', 'This assignment has already been assigned to students.');
        }

        DB::transaction(function () use ($assignment) {

            $students = HsStudent::where(
                'class',
                $assignment->class
            )->get();

            $responses = [];

            $now = now();

            foreach ($students as $student) {
                $responses[] = [
                    'assignment_id' => $assignment->id,
                    'student_name' => $student->name,
                    'status' => 'pending',
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            if (!empty($responses)) {
                AssignmentResponse::insert($responses);
            }

            $assignment->update([
                'status' => 'assigned',
                'assigned_at' => $now,
            ]);
        });

        return redirect()
            ->route('hs_teacher.assignment')
            ->with('success', 'Assignment successfully assigned.');
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
        $assignment = HsLessonMaterial::findOrFail($id);
        $assignment->delete();

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
        $title = 'Assignment';
        $path = 'Hs Teacher';
        $assignment = HsAssignment::findOrFail($id);

        $assignmentResponses = AssignmentResponse::where('assignment_id', $assignment->id)->get();

        return view('hsteacher/assignments/responses', compact('title', 'path', 'assignment', 'assignmentResponses'));
    }
}
