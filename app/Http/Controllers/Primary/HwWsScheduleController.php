<?php

namespace App\Http\Controllers\Primary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryStudent;
use App\Models\Log;
use App\Models\PrimaryClass;
use App\Models\PrimarySubject;
use App\Models\HwWsSchedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HwWsScheduleController extends Controller
{
    public function index(Request $request)
    {
        $title = 'HW & WS Schedule';
        $path = 'Schedule';

        $search = $request->input('search');
        if($search == null) {
            $schedule = DB::table('hw_ws_schedules')
                ->join('primary_teachers', 'hw_ws_schedules.id_teacher', '=', 'primary_teachers.id')
                ->select('hw_ws_schedules.*', 'primary_teachers.name as teacher_name')
                ->get();
        }else {
            $schedule = DB::table('hw_ws_schedules')
                ->join('primary_teachers', 'hw_ws_schedules.id_teacher', '=', 'primary_teachers.id')
                ->select('hw_ws_schedules.*', 'primary_teachers.name as teacher_name')
                ->get();
        }

        return view('primary.hw_ws_schedule.index', compact('title', 'path', 'schedule'));
    }

    public function create(){
        $title = 'Input HW & WS Schedule';
        $path = 'Schedule';
        $classes = PrimaryClass::all();
        $subjects = PrimarySubject::all();
        return view('primary.hw_ws_schedule.create', compact('title', 'path', 'classes', 'subjects'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'tanggal' => 'required|string',
                'academic_year' => 'required|string',
                'term' => 'required|string|max:255',
                'subject' => 'required|string|max:255',
                'kind_of_assessment' => 'required|string|max:255',
                'class' => 'required|string|max:255',
            ],

        );

        $cekData = HwWsSchedule::where('id_teacher', session('id'))
            ->where('tanggal', $request->tanggal)
            ->where('kind_of_assessment', 'WS')
            ->where('academic_year', $request->academic_year)
            ->where('term', $request->term)
            ->where('class', $request->class)
            ->count();

        if ($cekData >= 2) {
            return redirect()->back()->with('error', 'Kuota WS untuk tanggal ini sudah penuh. Silakan pilih tanggal lain ya.');
        }

        HwWsSchedule::create([
            'id_teacher' => session('id'),
            'tanggal' => $request->tanggal,
            'kind_of_assessment' => $request->kind_of_assessment,
            'academic_year' => $request->academic_year,
            'term' => $request->term,
            'subject' => $request->subject,
            'class' => $request->class,
        ]);

        return redirect()->route('primary.hw_ws_schedule')->with('success', 'Jadwal HW & WS berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $title = 'Edit Cabang';
        $path = 'Master Data';
        return redirect()->route('primary.hw_ws_schedule')->with('success', 'Fitur edit sedang dalam tahap pengembangan!');
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

    public function resetPassword(Request $request, $id)
    {
        $student = PrimaryStudent::findOrFail($id);

        $student->update([
            'last_update_password' => null,
            'password' => Hash::make('pbsprimary2026'),
        ]);

        Log::create([
            'user'        => session('name'),
            'description'    => '',
            'activity' => 'Primary Admin reset password ' . $student->name,
            'grade'  => $student->class,
            'role'   => 'Primary Admin',
            'created_at'  => now(),
        ]);

        return redirect()->route('admin_primary.student')->with(['success' => 'Password berhasil direset!']);
    }

    public function destroy($id)
    {
        $branch = PrimaryStudent::findOrFail($id);
        $branch->delete();

        return redirect()->route('admin_primary.student')->with(['success' => 'Data successfully deleted!']);
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
