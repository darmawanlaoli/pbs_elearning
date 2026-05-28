<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryTeacher;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $title = 'Teacher';
        $path = 'Master Data';
        $teachers = PrimaryTeacher::all();
        return view('adminprimary.teacher.index', compact('title', 'path', 'teachers'));
    }

    public function create(){
        $title = 'Input Teacher Data';
        $path = 'Master Data';
        return view('adminprimary.teacher.create', compact('title', 'path'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'username' => 'required|string|max:255|unique:primary_teachers,username',
                'password' => 'required|string|min:8|confirmed',
            ],

        );

        PrimaryTeacher::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'primaryteacher',
        ]);

        return redirect()->route('admin_primary.teacher')->with('success', 'Data cabang berhasil tersimpan!');
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
        $branch = PrimaryTeacher::findOrFail($id);
        $branch->delete();

        return redirect()->route('admin_primary.teacher')->with(['success' => 'Data successfully deleted!']);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query');

        $branches = PrimaryTeacher::where('nama_cabang', 'LIKE', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('username', 'LIKE', "%$keyword%")
            ->get();

        return view('superadmin.cabang.partials.search_result', compact('branches'));
    }
}
