<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryZoom;
use Illuminate\Support\Facades\Hash;

class ZoomController extends Controller
{
    public function index()
    {
        $title = 'Link Zoom';
        $path = 'Master Data';
        $zooms = PrimaryZoom::all();
        return view('adminprimary.zoom.index', compact('title', 'path', 'zooms'));
    }

    public function create(){
        $title = 'Input Link Zoom';
        $path = 'Master Data';
        return view('adminprimary.zoom.create', compact('title', 'path'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'class' => 'required|string',
                'zoom_id' => 'required|string|max:255',
                'passcode' => 'required|string|max:255',
                'link' => 'required|string|max:255',
            ],

        );

        PrimaryZoom::create([
            'class' => $request->class,
            'zoom_id' => $request->zoom_id,
            'passcode' => $request->passcode,
            'link' => $request->link,
        ]);

        return redirect()->route('admin_primary.zoom')->with('success', 'Data berhasil tersimpan!');
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
        $branch = PrimaryZoom::findOrFail($id);
        $branch->delete();

        return redirect()->route('admin_primary.zoom')->with(['success' => 'Data successfully deleted!']);
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
