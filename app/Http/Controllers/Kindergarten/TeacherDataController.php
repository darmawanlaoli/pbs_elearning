<?php

namespace App\Http\Controllers\Kindergarten;

use App\Http\Controllers\Controller;
use App\Models\KindergartenTeacher;
use App\Models\KindergartenClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TeacherDataController extends Controller
{
    public function index()
    {
        $title = 'Teacher Data';
        $path = 'Teacher';
        $teachers = KindergartenTeacher::latest()->get();
        return view('kindergarten/teacher_data/index', compact('title', 'path', 'teachers'));
    }

    // 2. Form Tambah Data
    public function create()
    {
        $title = 'Input Teacher Data';
        $path = 'Teacher';
        $classes = DB::table('kindergarten_classes')->orderBy('class', 'ASC')->get();
        return view('kindergarten.teacher_data.create', compact('title', 'path', 'classes'));
    }

    // 3. Simpan Data Baru (Create)
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|string',
                'username' => 'required|string|max:255|unique:kindergarten_teachers,username',
                'password' => 'required|string|min:8|confirmed',
                'class' => 'required|array',
            ],

        );

        KindergartenTeacher::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'kindergartenteacher',
            'homeroom_class' => implode(',', $request['class'])
        ]);

        return redirect()->route('kindergarten.teacher_data')->with('success', 'Data has been successfully saved');
    }

    // 4. Form Edit Data
    public function edit(KindergartenTeacher $teacher)
    {
        $title = 'Edit Teacher Data';
        $path = 'Teacher';
        $classes = DB::table('kindergarten_classes')->orderBy('class', 'ASC')->get();
        $selectedClasses = $teacher->homeroom_class
            ? explode(',', $teacher->homeroom_class)
            : [];
        return view('kindergarten.teacher_data.edit', compact('title', 'path', 'classes', 'teacher', 'selectedClasses'));
    }

    // 5. Update Data (Update)
    public function update(Request $request, KindergartenTeacher $teacher)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => ['required', 'string', 'max:50', Rule::unique('kindergarten_teachers')->ignore($teacher->id)],
            'password' => 'nullable|string|min:8', // Opsional saat edit
        ]);

        // Jika password diisi, update password. Jika kosong, pertahankan password lama.
        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $validated['homeroom_class'] = implode(',', $request['class']);

        $teacher->update($validated);

        return redirect()->route('kindergarten.teacher_data')->with('success', 'Data guru berhasil diperbarui!');
    }

    // 6. Hapus Data (Delete)
    public function destroy(KindergartenTeacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('kindergarten.teacher_data')->with('success', 'Data guru berhasil dihapus!');
    }
}

?>
