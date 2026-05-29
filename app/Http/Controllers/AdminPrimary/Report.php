<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryAssesmentRecord;
use App\Models\AcademicYear;
use App\Models\PrimarySubject;
use App\Models\PrimaryTeacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Exports\PrimaryAssesmentRecordExport;
use App\Imports\PrimaryAssesmentRecordImport;
use App\Models\PrimaryReportDataDetails;
use App\Models\PrimaryReportDatas;
use App\Models\PrimaryStudent;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AccumulateExport;

class Report extends Controller
{
    public function index(Request $request)
    {
        $title = 'Report';
        $path = 'Report Data';
        $students = DB::table('primary_students')->where('class', session('homeroom_class'))->orderBy('name', 'ASC')->get();
        $academicyears = AcademicYear::first();
        $current_term = $academicyears->term;

        $student = $request->student;
        $siswa = $request->student;
        $class_admin = $request->class;
        $homeroom = DB::table('primary_teachers')->where('homeroom_class', $class_admin)->orderBy('name', 'ASC')->first();

         // ambil semua kelas homeroom
        $classes = DB::table('primary_teachers')->where('is_homeroom', 1)->orderBy('homeroom_class', 'ASC')->get();

        $students_request = [];

        if ($request->filled('class')) {
            $students_request = PrimaryStudent::where('class', $request->class)->get();
        }

         // jika ada student

        if($student){
            $academicyears = AcademicYear::first();
            $current_term = $academicyears->term;

            $class = $class_admin;

            $assesments = DB::table('primary_assesment_records')
            ->where('teacher', session('name'))
            ->get();

            $religious = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('subject', 'RELIGIOUS EDUCATION')
                ->where('term', $current_term)
                ->first();

            $meanReligious = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'RELIGIOUS EDUCATION')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_religious_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_religious_demonstrate'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'RELIGIOUS EDUCATION',
                    'mean_religious_concept' => 0,
                    'mean_religious_demonstrate' => 0,
                ];

            $civic = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('name', $student)
                ->where('term', $current_term)
                ->where('subject', 'CIVIC')
                ->first();

            $meanCivic1 = DB::table('primary_assesment_record_details')
                ->join('primary_assesment_records', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
                ->where('class', $class) // ambil class dari siswa tsb
                ->where('subject', 'CIVIC')
                ->where('term', $current_term)
                ->avg('concept');

            $meanCivic = DB::table('primary_assesment_record_details as d')
                ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
                ->where('r.class', $class)
                ->where('r.subject', 'CIVIC')
                ->where('term', $current_term)
                ->select(
                    'r.subject',
                    DB::raw('AVG(d.concept) as mean_civic_concept'),
                    DB::raw('AVG(d.demonstrate) as mean_civic_demonstrate'),
                )
                ->groupBy('r.subject')
                ->first() ?? (object)[
                    'subject' => 'CIVIC',
                    'mean_civic_concept' => 0,
                    'mean_civic_demonstrate' => 0,
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

        }else{
            $assesments = [];
            $religious = null;
            $meanReligious = [];
            $civic = null;
            $meanCivic = [];
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
            'civic',
            'meanCivic',
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
            'current_term'
        );

         // jika ada parameter print, load view print

        if(isset($_REQUEST['print'])){
            return view('primaryteacher.report.print', $data);
        }else{
            return view('adminprimary.report.index', $data);
        }


    }

    public function getByClass($class)
    {
        $students = PrimaryStudent::where('class', $class)->get();
        return response()->json($students);
    }

    public function reportData()
    {
        $title = 'Report Data';
        $path = 'Report';
        $reports = DB::table('primary_report_datas')
            ->where('teacher', session('name'))
            ->get();
        return view('primaryteacher.report.report_data', compact('title', 'path', 'reports'));
    }

    public function reportApproval(){
        $title = 'Report Approval';
        $path = 'Report';
        $classes = DB::table('primary_teachers')->where('is_homeroom', 1)->orderBy('homeroom_class', 'ASC')->get();

        return view('adminprimary/report/approval', compact('title', 'path', 'classes'));
    }

    public function approveAction(Request $request, $id): RedirectResponse
    {
        $primaryTeacher = PrimaryTeacher::findOrFail($id);
        $primaryTeacher->update([
            'is_allow_print_report' => 1
        ]);

        return redirect()->route('admin_primary.report_approval')->with(['success' => 'Report Successfully Approved!']);
    }

    public function undoAction(Request $request, $id): RedirectResponse
    {
        $primaryTeacher = PrimaryTeacher::findOrFail($id);
        $primaryTeacher->update([
            'is_allow_print_report' => 0
        ]);

        return redirect()->route('admin_primary.report_approval')->with(['success' => 'Report Successfully Approved!']);
    }

    public function rank()
    {
        $title = 'Rank';
        $path = 'Report';
        $classes = DB::table('primary_teachers')->where('is_homeroom', 1)->orderBy('homeroom_class', 'ASC')->get();

        return view('adminprimary/report/rank', compact('title', 'path', 'classes'));
    }

    public function rankDetail(Request $request, $id)
    {
        $title = 'Data Analysis';
        $path = 'Report';

        $class = DB::table('primary_teachers')
                ->where('id', $id)
                ->first();

        $ranks = DB::table('primary_assesment_record_details as d')
            ->join('primary_assesment_records as r', 'r.id', '=', 'd.id_assesment')
            ->select(
                'd.name',
                DB::raw('
                    SUM(
                        COALESCE(d.concept,0) +
                        COALESCE(d.demonstrate,0) +
                        COALESCE(d.pe_understand_rules,0) +
                        COALESCE(d.pe_locomotors_movement,0) +
                        COALESCE(d.art_followed_direction,0) +
                        COALESCE(d.art_displayed_neat,0) +
                        COALESCE(d.art_finished_project,0) +
                        COALESCE(d.lang_neatness_in_writing,0) +
                        COALESCE(d.lang_writes_with_fluency,0) +
                        COALESCE(d.lang_reads_fluency,0) +
                        COALESCE(d.lang_reads_accurately,0) +
                        COALESCE(d.lang_listen_with_understanding,0) +
                        COALESCE(d.lang_expresses_ideas,0) +
                        COALESCE(d.mandarin_understands_vocabulary,0) +
                        COALESCE(d.mandarin_writes_characters,0) +
                        COALESCE(d.mandarin_neatness,0) +
                        COALESCE(d.mandarin_correct_intonation,0) +
                        COALESCE(d.mandarin_reads_fluently,0) +
                        COALESCE(d.mandarin_able_to_pronounce,0) +
                        COALESCE(d.mandarin_able_to_transfer_the_words,0)
                    ) as total_score
                ')
            )
            ->where('r.academic_year', '2025/2026')
            ->where('r.term', 'Term 2')
            ->where('r.class', $class->homeroom_class)
            ->groupBy('d.name')
            ->orderByDesc('total_score')
            ->get();

        return view('adminprimary/report/rank_detail', compact('title', 'path', 'ranks', 'class'));
    }

    public function accumulate()
    {
        $title = 'Accumulate';
        $path = 'Report';

        $classes = DB::table('primary_teachers')->where('is_homeroom', 1)->orderBy('homeroom_class', 'ASC')->get();

        return view('adminprimary/accumulate/index', compact('title', 'path', 'classes'));
    }

    public function accumulateDetail($class, $semester) {
        $title = 'Accumulate';
        $path = 'Report';

        $query = DB::table('primary_assesment_record_details as d')

            ->join(
                'primary_assesment_records as r',
                'r.id',
                '=',
                'd.id_assesment'
            )

            ->select(
                'd.*',
                'r.subject',
                'r.term'
            );



        if ($semester == 1) {

            $query->whereIn('r.term', ['TERM 1', 'TERM 2']);
        } else {

            $query->whereIn('r.term', ['TERM 3', 'TERM 4']);
        }



        $rows = $query

            ->where('r.class', $class)

            ->orderBy('d.name')

            ->get();



        $subjects = subjectComponents();

        $students = [];



        foreach ($rows as $row) {

            $name = $row->name;

            $subject = strtoupper($row->subject);

            $term = strtoupper($row->term);



            if (!isset($subjects[$subject])) {
                continue;
            }



            if (!isset($students[$name])) {

                $students[$name] = [
                    'name' => $name
                ];
            }



            /*
            |--------------------------------------------------------------------------
            | Loop component
            |--------------------------------------------------------------------------
            */

            foreach ($subjects[$subject] as $component => $fields) {

                $score = calculateComponentScore(
                    $fields,
                    $row
                );

                $students[$name][$subject][$component][$term]
                    = $score;
            }
        }


        //
        foreach ($students as &$student) {

            foreach ($subjects as $subject => $components) {

                foreach ($components as $component => $fields) {

                    if($semester == 1) {
                        $t1 =
                            $student[$subject][$component]['TERM 1']
                            ?? null;

                        $t2 =
                            $student[$subject][$component]['TERM 2']
                            ?? null;

                        $student[$subject][$component]['AVG']
                            = calculateAverage($t1, $t2);
                    }else {
                        $t3 =
                            $student[$subject][$component]['TERM 3']
                            ?? null;

                        $t4 =
                            $student[$subject][$component]['TERM 4']
                            ?? null;

                        $student[$subject][$component]['AVG']
                            = calculateAverage($t3, $t4);
                    }
                }
            }
        }

        return view('adminprimary/accumulate/detail', compact('title', 'path', 'students', 'subjects', 'semester', 'class'));
    }

    public function downloadExcel($class, $semester)
    {
        $data = $this->accumulateDetail(
            $class,
            $semester
        );

        return Excel::download(

            new AccumulateExport(
                $data['students'],
                $data['subjects'],
                $semester,
                $class
            ),

            'accumulate-' . $class . '.xlsx'
        );
    }



}
