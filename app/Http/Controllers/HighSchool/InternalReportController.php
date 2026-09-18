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
        if (session('role') == 'hsadmin') {
            $classes = DB::table('hs_classes')
                ->orderBy('class', 'ASC')
                ->get();
        } else {
            $classes = DB::table('hs_classes')
                ->where('class', session('homeroom'))
                ->orderBy('class', 'ASC')
                ->get();
        }

        return view('high_school/internal_report/index', compact('title', 'path', 'classes'));
    }

    public function accumulated1(string $class)
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
            ->where('record.class', $class)
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

        if (session('role') == 'hsadmin') {
            $assessmentLists = DB::table('hs_assessment_records')
                ->where('submitted_at', '!=', null)
                ->get();
        } else {
            $assessmentLists = DB::table('hs_assessment_records')
                ->where('teacher', session('name'))
                ->get();
        }

        return view('high_school.assessment_record.internal_accumulated', compact('title', 'path', 'subjects', 'assessmentLists', 'class', 'students'));
    }

    public function accumulated(string $class)
    {
        $title = 'Internal Accumulated';
        $path = 'Report';
        // 1. Ambil semua mata pelajaran untuk header tabel (sesuai urutan id)
        // GANTI MENJADI INI
        if (str_contains($class, 'Y7') || str_contains($class, 'Y8') || str_contains($class, 'Y9')) {
            $u = 'jhs';
        }else {
            $u = 'shs';
        }
        $unit = $u;
        $subjects = DB::table('hs_report_subjects')
            ->where('unit', 'all')
            ->orWhere('unit', $unit)
            ->orderBy('sequence')
            ->get(['id', 'subject', 'initial']);

        // 2. Ambil data nilai dan gabungkan tabel (filter kelas jika perlu, misal: kelas tertentu)
        $rawData = DB::table('hs_assessment_record_details as detail')
            ->join('hs_assessment_records as record', 'detail.id_assesment', '=', 'record.id')
            ->join('hs_report_subjects as subject', 'record.subject', '=', 'subject.subject')
            ->select('detail.name', 'subject.subject as subject_name', 'subject.initial', 'detail.ku_total', 'detail.dk_total', 'detail.lang_total_ku', 'detail.lang_total_dk')
            ->where('record.class', $class)
            ->orderBy('detail.name')
            ->get();

        // 3. Pivot data & hitung total nilai
        $students = $rawData->groupBy('name')->map(function ($items, $studentName) {
            $kuScores = [];
            $dkScores = [];
            $langKuScores = [];
            $langDkScores = [];

            // Daftar subject bahasa
            $languageSubjects = ['Bahasa Indonesia', 'English'];

            foreach ($items as $item) {
                if (in_array($item->subject_name, $languageSubjects)) {
                    // Simpan ke array khusus bahasa
                    $langKuScores[$item->subject_name] = $item->lang_total_ku;
                    $langDkScores[$item->subject_name] = $item->lang_total_dk;
                } else {
                    // Simpan ke array reguler
                    $kuScores[$item->subject_name] = $item->ku_total;
                    $dkScores[$item->subject_name] = $item->dk_total;
                }
            }

            $totalKu = $items->sum('ku_total');
            $totalDk = $items->sum('dk_total');



            return [
                'name'          => $studentName,
                'ku_total'      => $kuScores,
                'dk_total'      => $dkScores,
                'lang_total_ku' => $langKuScores,
                'lang_total_dk' => $langDkScores,
                'total_ku'      => $totalKu,
                'total_dk'      => $totalDk,
                'grand_total'   => $totalKu + $totalDk,
            ];
        })->values();

        // 4. Urutkan berdasarkan nilai tertinggi dulu untuk menentukan ranking
        $rankedStudents = $students->sortByDesc('grand_total')->values();

        // 5. Berikan nomor rank ke setiap siswa
        $studentsWithRank = $rankedStudents->map(function ($student, $index) {
            $student['rank'] = $index + 1;
            return $student;
        });

        // 6. Kembalikan urutan siswa berdasarkan nama (sesuai abjad A-Z)
        $students = $studentsWithRank->sortBy('name')->values();

        if (session('role') == 'hsadmin') {
            $assessmentLists = DB::table('hs_assessment_records')
                ->where('submitted_at', '!=', null)
                ->get();
        } else {
            $assessmentLists = DB::table('hs_assessment_records')
                ->where('teacher', session('name'))
                ->get();
        }

        return view('high_school.assessment_record.internal_accumulated', compact('title', 'path', 'subjects', 'assessmentLists', 'class', 'students'));
    }

    public function print1(string $class, Request $request)
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

    public function print(Request $request)
    {
        $title = 'Report';
        $path = 'Report Data';
        $students = DB::table('hs_students')->where('class', session('homeroom'))->orderBy('name', 'ASC')->get();
        $academicyears = AcademicYear::first();
        $current_term = $academicyears->term;

        $student = $request->student;
        $siswa = $request->student;
        $class_admin = $request->class;
        $homeroom = DB::table('primary_teachers')->where('homeroom_class', $class_admin)->orderBy('name', 'ASC')->first();
        $murid = DB::table('hs_students')->where('name', $siswa)->first();
        // ambil semua kelas homeroom
        $classes = DB::table('primary_teachers')->where('is_homeroom', 1)->orderBy('homeroom_class', 'ASC')->get();

        $students_request = [];

        if ($request->filled('class')) {
            $students_request = PrimaryStudent::where('class', $request->class)->get();
        }

        // jika ada student

        if ($student) {
            $academicyears = AcademicYear::first();
            $current_term = $academicyears->term;

            $class = $class_admin;

            $assesments = DB::table('primary_assesment_records')
                ->where('teacher', session('name'))
                ->get();

            $religious = DB::table('hs_assessment_record_details')
                ->join('hs_assessment_records', 'hs_assessment_records.id', '=', 'hs_assessment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'RELIGIOUS EDUCATION')
                ->where('term', $current_term)
                ->first();

            $meanReligious = DB::table('hs_assessment_record_details as d')
                ->join('hs_assessment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'RELIGIOUS EDUCATION')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.ku_total) as mean_religious_ku'),
                    DB::raw('AVG(d.dk_total) as mean_religious_dk'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'RELIGIOUS EDUCATION',
                    'mean_religious_ku' => 0,
                    'mean_religious_dk' => 0,
                ];

            $pkn = DB::table('hs_assessment_record_details')
                ->join('hs_assessment_records', 'hs_assessment_records.id', '=', 'hs_assessment_record_details.id_assesment')
                ->where('name', $student)
                ->where('term', $current_term)
                ->where('subject', 'PKN')
                ->first();

            $meanPKn = DB::table('hs_assessment_record_details as d')
                ->join('hs_assessment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'PKN')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.ku_total) as mean_ku'),
                    DB::raw('AVG(d.dk_total) as mean_dk'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'PKN',
                    'mean_ku' => 0,
                    'mean_dk' => 0,
                ];

            $music = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'MUSIC')
                ->where('term', $current_term)
                ->first();

            $meanMusic = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'MUSIC')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_music_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_music_demonstrate'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'MUSIC',
                    'mean_music_concept' => 0,
                    'mean_music_demonstrate' => 0,
                ];

            $ipas = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('term', $current_term)
                ->where('subject', 'SCIENCE AND SOCIAL STUDY')
                ->first();

            $meanIpas = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'SCIENCE AND SOCIAL STUDY')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_ipas_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_ipas_demonstrate'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'SCIENCE AND SOCIAL STUDY',
                    'mean_ipas_concept' => 0,
                    'mean_ipas_demonstrate' => 0,
                ];

            // PE
            $pe = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'HEALTH AND PHYSICAL EDUCATION')
                ->where('term', $current_term)
                ->first();

            $meanPe = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'HEALTH AND PHYSICAL EDUCATION')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_pe_concept'),
                    DB::raw('AVG(d.pe_understand_rules) as mean_pe_understand_rules'),
                    DB::raw('AVG(d.pe_locomotors_movement) as mean_pe_locomotors_movement'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'HEALTH AND PHYSICAL EDUCATION',
                    'mean_pe_concept' => 0,
                    'mean_pe_understand_rules' => 0,
                    'mean_pe_locomotors_movement' => 0,
                ];

            // ICT
            $ict = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'INFORMATION AND COMMUNICATION TECHNOLOGY')
                ->where('term', $current_term)
                ->first();

            $meanIct = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'INFORMATION AND COMMUNICATION TECHNOLOGY')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_ict_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_ict_demonstrate'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'INFORMATION AND COMMUNICATION TECHNOLOGY',
                    'mean_ict_concept' => 0,
                    'mean_ict_demonstrate' => 0,
                ];


            $math = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'MATHEMATIC')
                ->where('term', $current_term)
                ->first();

            $meanMath = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'MATHEMATIC')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_math_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_math_demonstrate'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'MATHEMATIC',
                    'mean_math_concept' => 0,
                    'mean_math_demonstrate' => 0,
                ];

            $mathematic = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'Mathematic')
                ->where('term', $current_term)
                ->first();

            $english = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'ENGLISH')
                ->where('term', $current_term)
                ->first();

            $meanEnglish = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'ENGLISH')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_english_concept'),
                    DB::raw('AVG(d.lang_neatness_in_writing) as mean_lang_neatness_in_writing'),
                    DB::raw('AVG(d.lang_neatness_in_writing) as mean_lang_neatness_in_writing'),
                    DB::raw('AVG(d.lang_writes_with_fluency) as mean_lang_writes_with_fluency'),
                    DB::raw('AVG(d.lang_reads_accurately) as mean_lang_reads_accurately'),
                    DB::raw('AVG(d.lang_expresses_ideas) as mean_lang_expresses_ideas'),
                    DB::raw('AVG(d.lang_reads_fluency) as mean_lang_reads_fluency'),
                    DB::raw('AVG(d.lang_listen_with_understanding) as mean_lang_listen_with_understanding'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'ENGLISH',
                    'mean_lang_neatness_in_writing' => 0,
                    'mean_lang_writes_with_fluency' => 0,
                    'mean_lang_reads_accurately' => 0,
                    'mean_lang_expresses_ideas' => 0,
                    'mean_lang_reads_fluency' => 0,
                    'mean_lang_listen_with_understanding' => 0,
                ];

            // Art and Craft
            $art = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'ART AND CRAFT')
                ->where('term', $current_term)
                ->first();

            $meanArt = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'ART AND CRAFT')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.art_followed_direction) as mean_art_followed_direction'),
                    DB::raw('AVG(d.art_displayed_neat) as mean_art_displayed_neat'),
                    DB::raw('AVG(d.art_finished_project) as mean_art_finished_project'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'ART AND CRAFT',
                    'mean_art_followed_direction' => 0,
                    'mean_art_displayed_neat' => 0,
                    'mean_art_finished_project' => 0,
                ];

            // MANDARIN
            $mandarin = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'MANDARIN')
                ->where('term', $current_term)
                ->first();

            $meanMandarin = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'MANDARIN')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.mandarin_understands_vocabulary) as mean_mandarin_understands_vocabulary'),
                    DB::raw('AVG(d.mandarin_writes_characters) as mean_mandarin_writes_characters'),
                    DB::raw('AVG(d.mandarin_neatness) as mean_mandarin_neatness'),
                    DB::raw('AVG(d.	mandarin_correct_intonation) as mean_mandarin_correct_intonation'),
                    DB::raw('AVG(d.mandarin_reads_fluently) as mean_mandarin_reads_fluently'),
                    DB::raw('AVG(d.mandarin_able_to_pronounce) as mean_mandarin_able_to_pronounce'),
                    DB::raw('AVG(d.mandarin_able_to_transfer_the_words) as mean_mandarin_able_to_transfer_the_words'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'MANDARIN',
                    'mean_mandarin_understands_vocabulary' => 0,
                    'mean_mandarin_writes_characters' => 0,
                    'mean_mandarin_neatness' => 0,
                    'mean_mandarin_correct_intonation' => 0,
                    'mean_mandarin_reads_fluently' => 0,
                    'mean_mandarin_able_to_pronounce' => 0,
                    'mean_mandarin_able_to_transfer_the_words' => 0,

                ];

            // BAHASA INDONESIA
            $indonesia = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'BAHASA INDONESIA')
                ->where('term', $current_term)
                ->first();

            $meanIndonesia = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'BAHASA INDONESIA')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_indo_concept'),
                    DB::raw('AVG(d.lang_neatness_in_writing) as mean_indo_neatness_in_writing'),
                    DB::raw('AVG(d.lang_writes_with_fluency) as mean_indo_lang_writes_with_fluency'),
                    DB::raw('AVG(d.lang_reads_accurately) as mean_indo_reads_accurately'),
                    DB::raw('AVG(d.lang_expresses_ideas) as mean_indo_expresses_ideas'),
                    DB::raw('AVG(d.lang_reads_fluency) as mean_indo_reads_fluency'),
                    DB::raw('AVG(d.lang_listen_with_understanding) as mean_indo_listen_with_understanding'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'BAHASA INDONESIA',
                    'mean_indo_concept' => 0,
                    'mean_indo_neatness_in_writing' => 0,
                    'mean_indo_writes_with_fluency' => 0,
                    'mean_indo_reads_accurately' => 0,
                    'mean_indo_expresses_ideas' => 0,
                    'mean_indo_reads_fluency' => 0,
                    'mean_indo_listen_with_understanding' => 0,
                ];

            $reportData = DB::table('primary_report_data_details')
                ->join('primary_report_datas', 'primary_report_datas.id', '=', 'primary_report_data_details.id_report')
                ->where('name', $student)
                ->where('class', $class)
                ->where('term', $current_term)
                ->first();

            $records = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('d.name', $student)
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    'r.term',
                    'd.concept',
                    'd.demonstrate',
                    'd.pe_understand_rules',
                    'd.pe_locomotors_movement'
                )
                ->get()
                ->groupBy('subject');


            $subjects = $records->map(function ($rows, $subject) {
                $indicators = [];

                foreach (['concept', 'demonstrate', 'pe_understand_rules', 'pe_locomotors_movement'] as $indicator) {
                    // ambil nilai (null kalau tidak dipakai di subject tsb)
                    $scores = $rows->pluck($indicator)->filter();
                    if ($scores->isNotEmpty()) {
                        $indicators[$indicator] = [
                            'scores' => $scores,
                            'mean' => $scores->avg()
                        ];
                    }
                }

                return $indicators;
            });

            $class = session('homeroom_class');
            $means = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_demonstrate'),
                    DB::raw('AVG(d.pe_understand_rules) as mean_pe_understand_rules'),
                    DB::raw('AVG(d.pe_locomotors_movement) as mean_pe_locomotors_movement')
                )
                ->groupBy('r.subject')
                ->get()
                ->keyBy('subject');
        } else {
            $assesments = [];
            $religious = null;
            $meanReligious = [];
            $pkn = null;
            $meanPKn = [];
            $music = null;
            $meanMusic = [];
            $ipas = null;
            $meanIpas = [];
            $pe = null;
            $meanPe = [];
            $math = null;
            $meanMath = [];
            $ict = null;
            $meanIct = [];
            $mandarin = null;
            $meanMandarin = [];
            $art = null;
            $meanArt = [];
            $indonesia = null;
            $meanIndonesia = [];
            $english = null;
            $meanEnglish = [];
            $mathematic = null;
            $records = [];
            $subjects = [];
            $means = [];
            $reportData = null;
        }

        $data = compact(
            'title',
            'path',
            'assesments',
            'students',
            'religious',
            'meanReligious',
            'pkn',
            'meanPKn',
            'music',
            'meanMusic',
            'mandarin',
            'meanMandarin',
            'pe',
            'meanPe',
            'math',
            'meanMath',
            'ipas',
            'meanIpas',
            'art',
            'meanArt',
            'ict',
            'meanIct',
            'indonesia',
            'meanIndonesia',
            'english',
            'meanEnglish',
            'records',
            'subjects',
            'means',
            'reportData',
            'siswa',
            'classes',
            'students_request',
            'class_admin',
            'homeroom',
            'current_term',
            'murid'
        );

        // jika ada parameter print, load view print

        if (isset($_REQUEST['print'])) {
            return view('primaryteacher.report.print', $data);
        } else {
            return view('high_school.internal_report.print', $data);
        }
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
            ->orderBy('name', 'ASC')
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

    public function updateReportDaata(Request $request)
    {
        $students = $request->input('students', []);

        DB::transaction(function () use ($students) {

            foreach ($students as $assessmentId => $data) {

                HsReportDataDetail::where('id', $assessmentId)

                    ->update([
                        'comment' => $data['comment'] ?? null,
                        'present' => $data['present'] ?? null,

                        'excused' => $data['excused'] ?? null,
                        'unexcused' => $data['unexcused'] ?? null,
                        'tardy' => $data['tardy'] ?? null,

                        'club1' => $data['club1'] ?? null,
                        'grade_club1' => $data['grade_club1'] ?? null,

                        'club2' => $data['club2'] ?? null,
                        'grade_club2' => $data['grade_club2'] ?? null,

                        'club3' => $data['club3'] ?? null,
                        'grade_club3' => $data['grade_club3'] ?? null,

                        'club4' => $data['club4'] ?? null,
                        'grade_club4' => $data['grade_club4'] ?? null,

                    ]);
            }
        });

        return back()->with('success', 'Report data berhasil disimpan.');
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
