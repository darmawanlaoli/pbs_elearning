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
        $assessments = DB::table('kindergarten_assesment_records')->orderBy('id', 'DESC')->get();
        return view('kindergarten/assessment_record/index', compact('title', 'path', 'assessments'));
    }

    public function create()
    {
        $title = 'Create Assessment Record';
        $path = 'Report';
        $class = session('homeroom_class');

        $classes = DB::table('kindergarten_classes')->orderBy('id', 'DESC')->get();
        $academic_year = DB::table('kindergarten_report_data')->first();
        $students = DB::table('kindergarten_students')->orderBy('id', 'DESC')->get();
        return view('kindergarten/assessment_record/create', compact('title', 'path', 'classes', 'academic_year', 'students'));
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

    public function input($id)
    {
        $title = 'Assessment Record';
        $path = 'Report';
        $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->orderBy('name', 'ASC')->get();
        return view('kindergarten/assessment_record/input', compact('title', 'path', 'assessments'));
    }

    public function inputAction(Request $request)
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

    public function reportData($id)
    {
        $title = 'Report Data';
        $path = 'Report';
        $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->orderBy('name', 'ASC')->get();
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
        if($request->student_name == null) {
            $student = null;
            $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->orderBy('name', 'ASC')->get();
            $assessment = DB::table('kindergarten_assesment_records')->where('id', $id)->first();
            $report = [];
        }else{
            $student = $request->student_name;
            $assessments = DB::table('kindergarten_assesment_record_details')->where('id_assesment', $id)->orderBy('name', 'ASC')->get();
            $assessment = DB::table('kindergarten_assesment_records')->where('id', $id)->first();
            $report = DB::table('kindergarten_assesment_record_details')->where('name', $student)->orderBy('name', 'ASC')->first();
        }

        return view('kindergarten/assessment_record/print_preview', compact('title', 'path', 'assessments', 'assessment', 'student', 'report'));
    }
}

