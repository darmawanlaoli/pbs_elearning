<?php

namespace App\Http\Controllers\HighSchool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HsStudent;
use Illuminate\Support\Facades\Hash;

class StudentDatabaseController extends Controller
{
    public function index()
    {
        $title = 'Student Database';
        $path = 'Master Data';
        $teachers = HsStudent::all();
        return view('high_school.student_database.index', compact('title', 'path', 'teachers'));
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

    public function edit(string $id): View
    {
        $title = 'Edit Cabang';
        $path = 'Master Data';
        $branch = Branch::findOrFail($id);
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
