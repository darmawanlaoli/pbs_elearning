<?php

namespace App\Http\Controllers\HighSchool;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\HsReportData;
use App\Models\HsStudent;
use App\Models\HsReportDataDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class InternalReportController extends Controller
{
    public function index()
    {
        $title = 'Internal Report';
        $path = 'Report';
        $classes = DB::table('hs_classes')
            ->where('class', session('homeroom'))
            ->orderBy('class', 'ASC')
            ->get();

        return view('high_school/internal_report/index', compact('title', 'path', 'classes'));
    }

    public function accumulated(string $class)
    {
        $title = 'Internal Accumulated';
        $path = 'Report';
        // 1. Ambil semua mata pelajaran untuk header tabel (sesuai urutan id)
        // GANTI MENJADI INI
        $unit = 'jhs';
        $subjects = DB::table('hs_report_subjects')
            ->where('unit', 'all')
            ->orWhere('unit', $unit)
            ->orderBy('sequence')
            ->get(['id', 'subject', 'initial']);

        // 2. Ambil data nilai dan gabungkan tabel (filter kelas jika perlu, misal: kelas tertentu)
        $rawData = DB::table('hs_assessment_record_details as detail')
            ->join('hs_assessment_records as record', 'detail.id_assesment', '=', 'record.id')
            ->join('hs_report_subjects as subject', 'record.subject', '=', 'subject.subject')
            ->select('detail.name', 'subject.subject as subject_name', 'subject.initial', 'detail.ku_total', 'detail.dk_total')
            ->orderBy('detail.name')
            ->get();


        // 3. Pivot data menggunakan Collection
        $students = $rawData->groupBy('name')->map(function ($items, $studentName) {
            $kuScores = [];
            $dkScores = [];
            foreach ($items as $item) {
                // Simpan nilai dengan key nama mata pelajaran
                $kuScores[$item->subject_name] = $item->ku_total;
                $dkScores[$item->subject_name] = $item->dk_total;
            }



            return [
                'name' => $studentName,
                'ku_total' => $kuScores,
                'dk_total' => $dkScores
            ];
        })->values();

        $assessmentLists = DB::table('hs_assessment_records')->get();
        return view('high_school.assessment_record.internal_accumulated', compact('title', 'path', 'subjects', 'assessmentLists', 'class', 'students'));
    }

    public function print(string $class, Request $request)
    {
        $title = 'Internal Report';
        $path = 'Report';
        $academic_year = AcademicYear::first();
        $students = DB::table('hs_students')
            ->where('class', $class)
            ->orderBy('name', 'ASC')
            ->get();
        $classes = DB::table('hs_classes')
            ->where('class', session('homeroom'))
            ->orderBy('class', 'ASC')
            ->get();
        $filter = $request->student;

        $assessments = DB::table('hs_assessment_record_details')
            ->where('name', $filter)
            ->orderBy('name', 'ASC')
            ->get();

        $reportData = DB::table('hs_report_data_details')
            ->where('name', $filter)
            ->first();
        $siswa = DB::table('hs_students')
            ->where('name', $filter)
            ->first();

        return view('high_school.internal_report.print', compact('title', 'path', 'classes', 'academic_year', 'class', 'students', 'assessments', 'siswa', 'reportData'));
    }


    public function createReportData($class)
    {
        $title = 'Create Report Data';
        $path = 'Report Data';

        $academic_year = AcademicYear::first();

        $subjects = DB::table('hs_report_subjects')
            ->orderBy('subject', 'ASC')
            ->get();

        $students = DB::table('hs_students')
            ->where('class', $class)
            ->orderBy('name', 'ASC')
            ->get();
        $reportDataDetails = DB::table('hs_report_data_details')
            ->where('class', $class)
            ->get();
        $reportData = DB::table('hs_report_data')
            ->where('class', $class)
            ->first();
        $clubs = DB::table('hs_clubs')
            ->orderBy('name', 'ASC')
            ->get();

        if ($reportDataDetails->isNotEmpty()) {
            return view('high_school.internal_report.input_report_data', compact('title', 'path', 'academic_year', 'subjects', 'class', 'students', 'reportData', 'reportDataDetails', 'clubs'));
        } else {
            return view('high_school.internal_report.create_report_data', compact('title', 'path', 'academic_year', 'subjects', 'class', 'students'));
        }
    }

    public function storeReportData(Request $request)
    {

        // 1. Validasi Input
        $request->validate([
            'academic_year' => 'required',
            'term' => 'required',
            'class' => 'required',
            'homeroom' => 'required',
            'is_confirmed' => 'accepted',
        ]);

        // 2. CEK DATA SISWA TERLEBIH DAHULU (Sebelum melakukan aksi database apapun)
        $students = HsStudent::where('class', $request->class)->get();

        // Cegah proses jika tidak ada siswa, sehingga kita tidak perlu membatalkan transaksi
        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data siswa di kelas tersebut untuk disimpan.');
        }

        // 3. Mulai Database Transaction
        DB::beginTransaction();

        try {
            // 4. Simpan ke tabel Induk (kindergarten_assesment_records)
            $record = HsReportData::create([
                'class' => $request->class,
                'term' => $request->term,
                'academic_year' => $request->academic_year,
                'homeroom' => $request->homeroom,
            ]);

            // 5. Siapkan data untuk tabel Detail (kindergarten_assesment_record_details)
            $details = [];
            foreach ($students as $student) {
                $details[] = [
                    'id_report_data' => $record->id,
                    'name' => $student->name,
                    'class' => $request->class,
                    'homeroom' => $request->homeroom,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Gunakan insert() untuk bulk insert (lebih cepat dari create di dalam loop)
            HsReportDataDetail::insert($details);

            // 6. Commit transaksi jika semuanya sukses
            DB::commit();

            return redirect()->route('high_school.internal_report')
                ->with('success', 'Report Data berhasil disimpan!');
        } catch (\Exception $e) {
            // 7. Rollback jika terjadi error
            DB::rollBack();
            return redirect()->route('high_school.internal_report')
                ->with('error', 'Gagal menyimpan data assessment. ' . $e->getMessage());
        }
    }

    public function reportData($class)
    {
        $title = 'Generate Report Data';
        $path = 'Assessment Record';

        $students = DB::table('hs_students')
            ->where('class', $class)
            ->orderBy('name', 'ASC')
            ->get();


        return view('high_school.internal_report.generate', compact('title', 'path', 'students'));
    }

    public function generateAction($id)
    {
        $assessment = DB::table('hs_assessment_records')
            ->where('id', $id)
            ->first();
        $class = $assessment->class;
        $students = DB::table('hs_students')
            ->where('class', $class)
            ->orderBy('name', 'ASC')
            ->get();

        // Cegah proses jika tidak ada siswa, sehingga kita tidak perlu membatalkan transaksi
        if ($students->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data siswa di kelas tersebut untuk disimpan.');
        }

        // 3. Mulai Database Transaction
        DB::beginTransaction();

        try {
            $details = [];
            foreach ($students as $student) {
                $details[] = [
                    'id_assesment' => $id,
                    'name' => $student->name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Gunakan insert() untuk bulk insert (lebih cepat dari create di dalam loop)
            HsAssessmentRecordDetail::insert($details);

            // 6. Commit transaksi jika semuanya sukses
            DB::commit();

            return redirect()->route('high_school.assessment_record')
                ->with('success', 'Data assessment berhasil disimpan!');
        } catch (\Exception $e) {
            // 7. Rollback jika terjadi error
            DB::rollBack();
            return redirect()->route('high_school.assessment_record')
                ->with('success', 'Data assessment berhasil disimpan!' . $e->getMessage());
        }
    }

    public function input($id)
    {
        $title = 'Generate Student Data';
        $path = 'Assessment Record';
        $assessment = DB::table('hs_assessment_records')
            ->where('id', $id)
            ->first();
        $assessmentLists = DB::table('hs_assessment_records')
            ->get();
        $assessments = DB::table('hs_assessment_record_details')
            ->where('id_assesment', $id)
            ->get();

        if (!$assessments || $assessments->isEmpty()) {
            return redirect()->back()->with('info', 'Silahkan generate data siswa terlebih dahulu sebelum menginput nilai.');
        }

        $class = $assessment->class;
        $subject = $assessment->subject;
        $students = DB::table('hs_students')
            ->where('class', $class)
            ->orderBy('name', 'ASC')
            ->get();

        return view('high_school.assessment_record.input', compact('title', 'path', 'subject', 'class', 'subject', 'students', 'assessment', 'assessments', 'assessmentLists'));
    }

    public function inputAction(Request $request)
    {
        $students = $request->input('students', []);

        DB::transaction(function () use ($students) {

            foreach ($students as $assessmentId => $data) {

                HsAssessmentRecordDetail::where('id', $assessmentId)

                    ->update([
                        'ct' => $data['ct'] ?? null,
                        'avg_ct' => $data['avg_ct'] ?? null,

                        'hw1' => $data['hw1'] ?? null,
                        'hw2' => $data['hw2'] ?? null,
                        'hw3' => $data['hw3'] ?? null,

                        'ku1' => $data['ku1'] ?? null,
                        'ku2' => $data['ku2'] ?? null,
                        'ku3' => $data['ku3'] ?? null,
                        'ku4' => $data['ku4'] ?? null,
                        'ku_avg' => $data['ku_avg'] ?? null,
                        'ku_total' => $data['ku_total'] ?? null,

                        'dk1' => $data['dk1'] ?? null,
                        'dk_avg' => $data['dk_avg'] ?? null,
                        'dk_total' => $data['dk_total'] ?? null,

                        'attendance' => $data['attendance'] ?? null,

                        'management_skill' => $data['management_skill'] ?? null,
                        'active_participation' => $data['active_participation'] ?? null,
                        'social_responsibility' => $data['social_responsibility'] ?? null,

                        // IMYC
                        'imyc_geo' => $data['imyc_geo'] ?? null,
                        'imyc_geo_att' => $data['imyc_geo_att'] ?? null,
                        'imyc_geo_total' => $data['imyc_geo_total'] ?? null,
                        'imyc_science' => $data['imyc_science'] ?? null,
                        'imyc_science_att' => $data['imyc_science_att'] ?? null,
                        'imyc_science_total' => $data['imyc_science_total'] ?? null,
                        'imyc_history' => $data['imyc_history'] ?? null,
                        'imyc_history_att' => $data['imyc_history_att'] ?? null,
                        'imyc_history_total' => $data['imyc_history_total'] ?? null,
                        'imyc_tech' => $data['imyc_tech'] ?? null,
                        'imyc_tech_att' => $data['imyc_tech_att'] ?? null,
                        'imyc_tech_total' => $data['imyc_tech_total'] ?? null,
                        'imyc_lang' => $data['imyc_lang'] ?? null,
                        'imyc_lang_att' => $data['imyc_lang_att'] ?? null,
                        'imyc_lang_total' => $data['imyc_lang_total'] ?? null,

                        'imyc_geo_management_skill' => $data['imyc_geo_management_skill'] ?? null,
                        'imyc_geo_active_participation' => $data['imyc_geo_active_participation'] ?? null,
                        'imyc_geo_social_responsibility' => $data['imyc_geo_social_responsibility'] ?? null,
                        'imyc_science_management_skill' => $data['imyc_science_management_skill'] ?? null,
                        'imyc_science_active_participation' => $data['imyc_science_active_participation'] ?? null,
                        'imyc_science_social_responsibility' => $data['imyc_science_social_responsibility'] ?? null,
                        'imyc_history_management_skill' => $data['imyc_history_management_skill'] ?? null,
                        'imyc_history_active_participation' => $data['imyc_history_active_participation'] ?? null,
                        'imyc_history_social_responsibility' => $data['imyc_history_social_responsibility'] ?? null,
                        'imyc_tech_management_skill' => $data['imyc_tech_management_skill'] ?? null,
                        'imyc_tech_active_participation' => $data['imyc_tech_active_participation'] ?? null,
                        'imyc_tech_social_responsibility' => $data['imyc_tech_social_responsibility'] ?? null,
                        'imyc_lang_management_skill' => $data['imyc_lang_management_skill'] ?? null,
                        'imyc_lang_active_participation' => $data['imyc_lang_active_participation'] ?? null,
                        'imyc_lang_social_responsibility' => $data['imyc_lang_social_responsibility'] ?? null,
                    ]);
            }
        });

        return back()->with('success', 'Assessment record berhasil disimpan.');
    }
}
