<?php

namespace App\Http\Controllers\PrimaryTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryAssesmentRecord;
use App\Models\AcademicYear;
use App\Models\PrimarySubject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Exports\PrimaryAssesmentRecordExport;
use App\Imports\PrimaryAssesmentRecordImport;
use App\Models\PrimaryReportDataDetails;
use App\Models\PrimaryReportDatas;
use App\Models\PrimaryStudent;
use Maatwebsite\Excel\Facades\Excel;

class Report extends Controller
{
    public function index(Request $request)
    {
        $title = 'Report';
        $path = 'Report Data';
        $students = DB::table('primary_students')->where('class', session('homeroom_class'))->orderBy('name', 'ASC')->get();
        $student = $request->student;
        $siswa = $request->student;

        if($student){
            $class = session('homeroom_class');
            $academicyears = AcademicYear::first();
            $current_term = $academicyears->term;
            
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
                ->where('subject', 'CIVIC')
                ->where('term', $current_term)
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
                ->where('subject', 'SCIENCE AND SOCIAL STUDY')
                ->where('term', $current_term)
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
                ->where('teacher', session('name'))
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
            $academicyears = AcademicYear::first();
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
            'academicyears'
        );

        if(isset($_REQUEST['print'])){
            if(session('is_allow_print_report') == 1) {
                return view('primaryteacher.report.print', $data);
            }else{
                return redirect()->route('primary_teacher.report')->with(['alert' => 'Anda belum dapat mencetak RAPOR karena belum disetujui oleh Principal.']);
            }
        }else{
            return view('primaryteacher.report.index', $data);
        }


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

    public function create(){
        $title = 'New Assesment Record';
        $path = 'Assesment Record';
        $academicyears = AcademicYear::first();
        $subjects = PrimarySubject::all();

        return view('primaryteacher/report/create_report_data', compact('title', 'path', 'academicyears', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'academic_year' => 'required|string',
                'term' => 'required|string',
                'class' => 'required|string',
            ],

        );

        $report =  PrimaryReportDatas::create([
            'term' => $request->term,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'teacher' => session('name')
        ]);

         // 2. Ambil semua siswa berdasarkan class
        $students = PrimaryStudent::where('class', $request->class)->get();

        // 3. Insert ke tabel primary_report_data_details
        $details = [];
        foreach ($students as $student) {
            $details[] = [
                'id_report' => $report->id,
                'name'      => $student->name, // sesuaikan nama kolom pada tabel siswa
                'created_at'=> now(),
                'updated_at'=> now(),
            ];
        }
        PrimaryReportDataDetails::insert($details);

        return redirect()->route('primary_teacher.report_data')->with('success', 'Data has been successfully saved');
    }

    public function destroy($id)
    {
        $deleted = DB::table('primary_report_data_details')->where('id_report', $id)->delete();
        $assesment = PrimaryReportDatas::findOrFail($id);
        $assesment->delete();

        return redirect()->back()->with('success', 'Data has been successfully deleted');
    }

    public function input($id)
    {
        $reports = DB::table('primary_report_datas')
            ->join('primary_report_data_details', 'primary_report_datas.id', '=', 'primary_report_data_details.id_report')
            ->where('primary_report_datas.id', $id)
            ->get();

        $subject = PrimaryReportDatas::where('id', $id)->first();

        $title = 'Input Report Data';
        $path = 'Report Data';
        return view('primaryteacher/report/input', compact('title', 'path', 'reports', 'subject'));
    }

    public function updateAll(Request $request)
    {
        $data = $request->input('assesments', []);

        foreach ($data as $id => $values) {
            \App\Models\PrimaryReportDataDetails::where('id', $id)->update([
                'comment'      => $values['comment'],
                'att_present'  => $values['att_present'],
                'att_excused' => $values['att_excused'],
                'att_unexcused'   => $values['att_unexcused'],
                'att_tardy'   => $values['att_tardy'],
                'skills_independent_work'   => $values['skills_independent_work'],
                'skills_collaboration'   => $values['skills_collaboration'],
                'skills_innitiative'   => $values['skills_innitiative'],
                'skills_responsibility'   => $values['skills_responsibility'],
                'skills_self_regulation'   => $values['skills_self_regulation'],
                'skills_organization'   => $values['skills_organization'],
                'extra_1'   => $values['extra_1'],
                'extra_1_score'   => $values['extra_1_score'],
                'extra_2'   => $values['extra_2'],
                'extra_2_score'   => $values['extra_2_score'],
            ]);
        }



        return redirect()->back()->with('success', 'All records updated successfully!');
    }



}
