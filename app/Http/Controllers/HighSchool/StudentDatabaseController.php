<?php

namespace App\Http\Controllers\HighSchool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HsStudent;
use App\Models\HsClass;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentDatabaseController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Student Database';
        $path = 'Master Data';

        $filter_religion = $request->filter_religion;

        $class = session('homeroom');

        if($filter_religion == null) {
            $data = HsStudent::orderBy('class', 'ASC')
                ->orderBy('name', 'ASC')
                ->where('class', $class)
                ->get();
        }else {
            $data = HsStudent::orderBy('class', 'ASC')
                ->where('religion', $filter_religion)
                ->orderBy('name', 'ASC')
                ->get();
        }

        $students = $data;

        return view('high_school.student_database.index', compact('title', 'path', 'students'));
    }

    public function create(){
        $title = 'Input Student Data';
        $path = 'Master Data';
        return view('high_school.student_database.create', compact('title', 'path'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'username' => 'required|string|max:255|unique:hs_students,username',
                'password' => 'required|string|min:8|confirmed',
            ],

        );

        HsStudent::create([
            'name' => $request->name,
            'username' => $request->username,
            'class' => $request->class,
            'grade' => $request->grade,
            'password' => Hash::make($request->password),
            'role' => 'hsstudent',
        ]);

        return redirect()->route('high_school.database.students')->with('success', 'Data siswa berhasil tersimpan!');
    }

    public function edit()
    {
        $title = 'Edit Student Data';
        $path = 'Student Data';
        $class = session('homeroom');
        $students = HsStudent::orderBy('class', 'ASC')
            ->orderBy('name', 'ASC')
            ->where('class', $class)
            ->get();
        $classes = HsClass::all();

        return view('high_school.student_database.edit', compact('title', 'path', 'students', 'classes'));
    }

    public function bulkUpdate(Request $request)
    {
        // Validasi array input
        // $request->validate([
        //     'students' => 'required|array',
        //     'students.*.reg_number' => 'nullable|string',
        //     'students.*.name'       => 'required|string',
        //     'students.*.religion'   => 'nullable|string',
        //     'students.*.grade'      => 'nullable|string',
        //     'students.*.class'      => 'nullable|string',
        // ]);

        DB::transaction(function () use ($request) {
            foreach ($request->students as $id => $data) {
                HsStudent::where('id', $id)->update([
                    'reg_number' => $data['reg_number'],
                    'name'       => $data['name'],
                    'religion'   => $data['religion'],
                    'grade'      => $data['grade'],
                    'class'      => $data['class'],
                ]);
            }
        });

        return redirect()->back()->with('success', 'Data siswa berhasil diperbarui!');
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
        $branch = HsStudent::findOrFail($id);
        $branch->delete();

        return redirect()->route('high_school.database.students')->with(['success' => 'Data successfully deleted!']);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query');

        $branches = HsStudent::where('name', 'LIKE', "%$keyword%")
            ->orWhere('class', 'LIKE', "%$keyword%")
            ->orWhere('grade', 'LIKE', "%$keyword%")
            ->get();

        return view('high_school.student_database.partials.search_result', compact('branches'));
    }
}
