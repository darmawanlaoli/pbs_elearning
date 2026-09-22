<?php

namespace App\Http\Controllers\Kindergarten;

use App\Http\Controllers\Controller;
use App\Models\KindergartenAssesmentRecord;
use App\Models\KindergartenAssesmentRecordDetail;
use App\Models\KindergartenStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssesmentRecordController extends Controller
{
    public function index()
    {
        $title = 'Assessment Record';
        $path = 'Report';
        $class = session('homeroom_class');

        // Ubah string terpisah koma menjadi array, pastikan tidak ada whitespace
        $selectedClasses = $class
            ? array_map('trim', explode(',', $class))
            : [];

        $query = DB::table('kindergarten_assesment_records');

        if(session('role') == 'kindergartenteacher') {

            // Gunakan whereIn jika ada kelas yang terpilih
            if (!empty($selectedClasses)) {
                $query->whereIn('class', $selectedClasses);
            } else {
                // Opsional: Jika tidak ada sesi kelas, kembalikan hasil kosong
                $query->whereRaw('1 = 0');
            }
        }

        $assessments = $query->orderBy('id', 'DESC')->get();

        return view('kindergarten/assessment_record/index', compact('title', 'path', 'assessments'));
    }

    public function create()
    {
        $title = 'Create Assessment Record';
        $path = 'Report';
        $class = session('homeroom_class');
        $selectedClasses = $class
            ? explode(',', $class)
            : [];

        $classes = DB::table('kindergarten_classes')->orderBy('id', 'DESC')->get();
        $academic_year = DB::table('kindergarten_report_data')->first();
        $students = DB::table('kindergarten_students')->orderBy('id', 'DESC')->get();
        return view('kindergarten/assessment_record/create', compact('title', 'path', 'classes', 'academic_year', 'students', 'selectedClasses'));
    }

    public function getStudentsByClass(Request $request)
    {
        $className = $request->query('class');

        $students = KindergartenStudent::where('class', $className)->get();

        return response()->json($students);
    }

    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'academic_year' => 'required',
            'term' => 'required',
            'class' => 'required',
            'distribution_date' => 'required',
            'is_confirmed' => 'accepted',
        ]);

        $cekData = KindergartenAssesmentRecordDetail::where('class', $request->class)->first();

        $cekData = DB::table('kindergarten_assesment_records')
            ->join('kindergarten_assesment_record_details', 'kindergarten_assesment_records.id', '=', 'kindergarten_assesment_record_details.id_assesment')
            ->select('kindergarten_assesment_records.class','kindergarten_assesment_records.id', 'kindergarten_assesment_records.academic_year', 'kindergarten_assesment_record_details.class', 'kindergarten_assesment_records.term')
            ->where('kindergarten_assesment_records.class', $request->class)
            ->first();

        if ($cekData != NULL) {
            return redirect()->back()->with('error', 'Assessment Record untuk kelas tersebut sudah dibuat, silahkan lanjut input atau pilih kelas lain.');
        }

        // 2. CEK DATA SISWA TERLEBIH DAHULU (Sebelum melakukan aksi database apapun)
        $students = KindergartenStudent::where('class', $request->class)->get();

        // Cegah proses jika tidak ada siswa, sehingga kita tidak perlu membatalkan transaksi
        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data siswa di kelas tersebut untuk disimpan.');
        }

        // 3. Mulai Database Transaction
        DB::beginTransaction();

        try {
            // 4. Simpan ke tabel Induk (kindergarten_assesment_records)
            $record = KindergartenAssesmentRecord::create([
                'class' => $request->class,
                'term' => $request->term,
                'academic_year' => $request->academic_year,
                'distribution_date' => $request->distribution_date,
            ]);

            // 5. Siapkan data untuk tabel Detail (kindergarten_assesment_record_details)
            $details = [];
            foreach ($students as $student) {
                $details[] = [
                    'id_assesment' => $record->id,
                    'name' => $student->name,
                    'registration_number' => $student->registration_number,
                    'class' => $student->class,
                    'gender' => $student->gender,
                    'date_of_birth' => $student->dob,
                    'address' => $student->address,
                    'name_of_parents' => $student->name_of_parents,
                    'teachers' => $student->teachers,
                    'distribution_date' => $request->distribution_date,
                    'first_day_of_school' => $student->first_day_of_school,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Gunakan insert() untuk bulk insert (lebih cepat dari create di dalam loop)
            KindergartenAssesmentRecordDetail::insert($details);

            // 6. Commit transaksi jika semuanya sukses
            DB::commit();

            return redirect()->route('kindergarten.assessment_record')
                ->with('success', 'Data assessment berhasil disimpan!');
        } catch (\Exception $e) {
            // 7. Rollback jika terjadi error
            DB::rollBack();
            return redirect()->route('kindergarten.assessment_record')
                ->with('error', 'Gagal menyimpan data assessment. ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $title = 'Edit Assessment Record';
        $path = 'Assessment Record';
        $assessment = KindergartenAssesmentRecordDetail::findOrFail($id);
        $class = substr($assessment->class, 0, 2);
        return view("kindergarten.assessment_record.edit_moduls.{$class}", compact('title', 'path', 'assessment'));
    }

    public function update(Request $request, $id)
    {
        $assessment = KindergartenAssesmentRecordDetail::findOrFail($id);

        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            $data[$key] = $value === '' ? null : $value;
        }

        $assessment->update($data);

        return redirect()->route('kindergarten.assessment_record.input', $assessment->id_assesment)
            ->with('success', 'Data assessment berhasil disimpan!');
    }

    // public function update(Request $request, $id)
    // {

    //     $request->validate(
    //         [
    //             'nama_cabang' => 'required|string',
    //             'username' => 'required|string|max:255',
    //             'password' => 'required|string|min:8|confirmed',
    //             'alamat' => 'required|string',
    //         ],
    //         [
    //             'nama_cabang.required' => 'Nama cabang wajib diisi',
    //             'alamat.required' => 'Alamat wajib diisi',
    //             'password.required' => 'Password wajib diisi',
    //             'username.required' => 'Username wajib diisi',
    //             'password.confirmed' => 'Konfirmasi password tidak sesuai',
    //             'password.min' => 'Password minimal 8 karakter',
    //         ]

    //     );

    //     $beanch = Branch::findOrFail($id);

    //     $beanch->update([
    //         'nama_cabang' => $request->nama_cabang,
    //         'alamat' => $request->alamat,
    //         'username' => $request->username,
    //         'pass' => $request->password,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     return redirect()->route('superadmin.data_cabang')->with(['success' => 'Data cabang berhasil diubah!']);
    // }

    public function input($id)
    {
        $title = 'Assessment Record';
        $path = 'Report';
        $teacher = session('name');

        // $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->where('teachers', $teacher)->orderBy('teachers', 'ASC')->orderBy('name', 'ASC')->get();

        $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->where('teachers', $teacher)->orderBy('teachers', 'ASC')->orderBy('name', 'ASC')->get();
        return view('kindergarten/assessment_record/input', compact('title', 'path', 'assessments'));
    }

    // public function inputAction(Request $request)
    // {
    //     $validated = $request->validate([
    //         'assessments' => 'required|array',
    //         'assessments.*' => 'array',
    //         // Opsional: Validasi opsi yang diizinkan (hanya '', 'I', 'G', 'S', 'E')
    //         'assessments.*.*' => 'nullable|string|in:,I,G,S,E',
    //     ]);

    //     try {
    //         // 2. Gunakan DB Transaction agar aman
    //         DB::transaction(function () use ($request) {

    //             foreach ($request->assessments as $id => $data) {
    //                 // Update masing-masing record berdasarkan ID
    //                 // Data otomatis berupa array associative seperti: ['introduce_name' => 'I', 'greet_teacher' => 'S']
    //                 KindergartenAssesmentRecordDetail::where('id', $id)->update($data);
    //             }
    //         });

    //         return redirect()->back()->with('success', 'Data assessment berhasil diperbarui!');

    //         // 3. Kembalikan ke halaman sebelumnya dengan pesan sukses
    //     } catch (\Exception $e) {
    //         return redirect()->route('kindergarten.assessment_record')
    //             ->with('error', 'Gagal menyimpan data assessment. ' . $e->getMessage());
    //     }
    // }

    // public function inputAction(Request $request)
    // {
    //     try {
    //         DB::transaction(function () use ($request) {

    //             foreach ($request->input('assessments', []) as $id => $data) {

    //                 $assessment = KindergartenAssesmentRecordDetail::find($id);

    //                 if (!$assessment) {
    //                     continue;
    //                 }

    //                 $updateData = [];

    //                 foreach ($data as $field => $value) {

    //                     // Jika nilai baru kosong, jangan timpa
    //                     // nilai lama yang sudah terisi
    //                     if (($value === null || $value === '') &&
    //                         ($assessment->{$field} !== null && $assessment->{$field} !== '')
    //                     ) {
    //                         continue;
    //                     }

    //                     // Jika nilai baru tidak kosong,
    //                     // atau nilai lama memang masih kosong,
    //                     // izinkan update
    //                     $updateData[$field] = $value;
    //                 }

    //                 if (!empty($updateData)) {
    //                     $assessment->update($updateData);
    //                 }
    //             }
    //         });

    //         return redirect()->back()
    //             ->with('success', 'Data assessment berhasil diperbarui!');
    //     } catch (\Exception $e) {

    //         return redirect()->route('kindergarten.assessment_record')
    //             ->with('error', 'Gagal menyimpan data assessment. ' . $e->getMessage());
    //     }
    // }

    // public function inputAction(Request $request)
    // {
    //     dd($request->input('assessments.22'));
    //     dd([
    //         'max_input_vars' => ini_get('max_input_vars'),
    //         'assessment_count' => count($request->input('assessments', [])),
    //         'total_variables' => count(
    //             $request->input('assessments', []),
    //             COUNT_RECURSIVE
    //         ),
    //         'assessments' => $request->input('assessments', []),
    //     ]);
    // }

    public function reportData($id)
    {
        $title = 'Report Data';
        $path = 'Report';
        $teacher = session('name');
        $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->where('teachers', $teacher)->orderBy('name', 'ASC')->get();
        return view('kindergarten/assessment_record/report_data', compact('title', 'path', 'assessments'));
    }

    public function storeReportData(Request $request)
    {
        // 1. Validasi Data (Opsional tapi disarankan)
        // $request->validate([
        //     'assessments'   => 'required|array',
        //     'assessments.*' => 'array',
        // ]);

        try {
            // 2. Gunakan DB Transaction agar aman
            DB::transaction(function () use ($request) {
                // Loop data dari request
                foreach ($request->assessments as $id => $data) {
                    // Update masing-masing record berdasarkan ID
                    // Data otomatis berupa array associative seperti: ['introduce_name' => 'I', 'greet_teacher' => 'S']
                    KindergartenAssesmentRecordDetail::where('id', $id)->update($data);
                }
            });

            return redirect()->route('kindergarten.assessment_record')
                ->with('success', 'Data assessment berhasil diperbarui!');

            // 3. Kembalikan ke halaman sebelumnya dengan pesan sukses
        } catch (\Exception $e) {
            return redirect()->route('kindergarten.assessment_record')
                ->with('error', 'Gagal menyimpan data assessment. ' . $e->getMessage());
        }
    }

    public function printPreview(Request $request, $id){
        $title = 'Assessment Record';
        $path = 'Report';
        $request = $request->student_name;
        if($request == null) {
            $student = null;
            $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->orderBy('name', 'ASC')->get();
            $assessment = DB::table('kindergarten_assesment_records')->where('id', $id)->first();
            $report = [];
        }else{
            $student = $request;
            $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->orderBy('name', 'ASC')->get();
            $assessment = DB::table('kindergarten_assesment_records')->where('id', $id)->first();
            $report = DB::table('kindergarten_assesment_record_details')->where('name', $student)->orderBy('name', 'ASC')->first();
        }



        return view('kindergarten/assessment_record/print_preview', compact('title', 'path', 'assessments', 'assessment', 'student', 'report', 'request'));
    }
}

