<?php

namespace App\Http\Controllers\HighSchool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HsAssessmentRecord;
use App\Models\HsAssessmentRecordDetail;
use App\Models\AcademicYear;
use App\Models\HsSubject;
use App\Models\HsClass;
use App\Models\HsStudent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\PrimaryAssesmentRecordDetails;

class AssessmentRecord extends Controller
{
    public function index()
    {
        $title = 'Input Assessment Record';
        $path = 'Assesment Record';
        $assesments = DB::table('hs_assessment_records')
            ->where('teacher', session('name'))
            ->orderBy('id', 'DESC')
            ->get();
        $academicyears = AcademicYear::first();
        return view('high_school.assessment_record.index', compact('title', 'path', 'assesments', 'academicyears'));
    }

    public function create(){
        $title = 'New Assesment Record';
        $path = 'Assesment Record';
        $academicyears = AcademicYear::first();
        $subjects = HsSubject::all();
        $classes = HsClass::all();

        return view('high_school.assessment_record.create', compact('title', 'path', 'academicyears', 'subjects', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'academic_year' => 'required|string',
                'term' => 'required|string',
                'class' => 'required|string',
                'subject' => 'required|string',
            ],

        );

        HsAssessmentRecord::create([
            'subject' => $request->subject,
            'status' => 0,
            'term' => $request->term,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'teacher' => session('name')
        ]);

        return redirect()->route('high_school.assessment_record')->with('success', 'Data has been successfully saved');
    }

    public function generate($id) {
        $title = 'Generate Student Data';
        $path = 'Assessment Record';
        $assessment = DB::table('hs_assessment_records')
            ->where('id', $id)
            ->first();
        $class = $assessment->class;
        $subject = $assessment->subject;
        $students = DB::table('hs_students')
            ->where('class', $class)
            ->orderBy('name', 'ASC')
            ->get();

        return view('high_school.assessment_record.generate', compact('title', 'path', 'subject', 'class', 'subject', 'students', 'assessment'));
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
        $assessments = DB::table('hs_assessment_record_details')
            ->where('id_assesment', $id)
            ->get();

        $class = $assessment->class;
        $subject = $assessment->subject;
        $students = DB::table('hs_students')
            ->where('class', $class)
            ->orderBy('name', 'ASC')
            ->get();

        return view('high_school.assessment_record.input', compact('title', 'path', 'subject', 'class', 'subject', 'students', 'assessment', 'assessments'));
    }


    public function destroy($id)
    {
        $deleted = DB::table('primary_assessment_record_details')->where('id_assesment', $id)->delete();
        $assesment = PrimaryAssesmentRecord::findOrFail($id);
        $assesment->delete();

        return redirect()->back()->with('success', 'Data has been successfully deleted');
    }

    public function detail($id)
    {
        $assesments = DB::table('primary_assessment_records')
            ->join('primary_assessment_record_details', 'primary_assessment_records.id', '=', 'primary_assessment_record_details.id_assesment')
            ->where('primary_assessment_records.id', $id)
            ->get();

        $subject = PrimaryAssesmentRecord::where('id', $id)->first();
        $class = $subject->class;
        $grade = substr($class, 0, 2);

        $title = 'Assesment Record Detail';
        $path = 'Assesment Record';

        if($subject->subject == 'HEALTH AND PHYSICAL EDUCATION') {
            return view('primaryteacher/assessment_record/detail_pe', compact('title', 'path', 'assesments', 'subject'));
        }elseif($subject->subject == 'ENGLISH' || $subject->subject == 'BAHASA INDONESIA') {
            if(in_array($grade, ['P1', 'P2', 'P3'])) {
                return view('primaryteacher/assessment_record/detail_lang_lower', compact('title', 'path', 'assesments', 'subject'));
            } else {
                return view('primaryteacher/assessment_record/detail_lang_upper', compact('title', 'path', 'assesments', 'subject'));
            }

        }elseif($subject->subject == 'ART AND CRAFT') {
            return view('primaryteacher/assessment_record/detail_art', compact('title', 'path', 'assesments', 'subject'));
        }elseif($subject->subject == 'MANDARIN') {
            return view('primaryteacher/assessment_record/detail_mandarin', compact('title', 'path', 'assesments', 'subject'));
        } else {
            return view('primaryteacher/assessment_record/detail', compact('title', 'path', 'assesments', 'subject'));
        }

    }

    public function updateAll(Request $request)
    {
        $data = $request->input('assesments', []);

        // foreach ($data as $id => $values) {
        //     \App\Models\PrimaryAssesmentRecordDetails::where('id', $id)->update([
        //         'concept'      => $values['concept'],
        //         'demonstrate'  => $values['demonstrate'],
        //         'updated_at'   => now(),
        //     ]);
        // }

        foreach ($data as $id => $values) {
        $updateData = [];

        if (isset($values['concept'])) {
            $updateData['concept'] = $values['concept'];
        }
        if (isset($values['demonstrate'])) {
            $updateData['demonstrate'] = $values['demonstrate'];
        }

        // PE
        if (isset($values['pe_understand_rules'])) {
            $updateData['pe_understand_rules'] = $values['pe_understand_rules'];
        }

        if (isset($values['pe_locomotors_movement'])) {
            $updateData['pe_locomotors_movement'] = $values['pe_locomotors_movement'];
        }

        // ART
        if (isset($values['art_followed_direction'])) {
            $updateData['art_followed_direction'] = $values['art_followed_direction'];
        }

        if (isset($values['art_displayed_neat'])) {
            $updateData['art_displayed_neat'] = $values['art_displayed_neat'];
        }

        if (isset($values['art_finished_project'])) {
            $updateData['art_finished_project'] = $values['art_finished_project'];
        }

        // LANG
        if (isset($values['lang_neatness_in_writing'])) {
            $updateData['lang_neatness_in_writing'] = $values['lang_neatness_in_writing'];
        }

        if (isset($values['lang_writes_with_fluency'])) {
            $updateData['lang_writes_with_fluency'] = $values['lang_writes_with_fluency'];
        }

        if (isset($values['lang_reads_accurately'])) {
            $updateData['lang_reads_accurately'] = $values['lang_reads_accurately'];
        }

        if (isset($values['lang_reads_fluency'])) {
            $updateData['lang_reads_fluency'] = $values['lang_reads_fluency'];
        }

        if (isset($values['lang_listen_with_understanding'])) {
            $updateData['lang_listen_with_understanding'] = $values['lang_listen_with_understanding'];
        }

        if (isset($values['lang_expresses_ideas'])) {
            $updateData['lang_expresses_ideas'] = $values['lang_expresses_ideas'];
        }

        // MANDARIN
        if (isset($values['mandarin_understands_vocabulary'])) {
            $updateData['mandarin_understands_vocabulary'] = $values['mandarin_understands_vocabulary'];
        }
        if (isset($values['mandarin_writes_characters'])) {
            $updateData['mandarin_writes_characters'] = $values['mandarin_writes_characters'];
        }
        if (isset($values['mandarin_neatness'])) {
            $updateData['mandarin_neatness'] = $values['mandarin_neatness'];
        }
        if (isset($values['mandarin_correct_intonation'])) {
            $updateData['mandarin_correct_intonation'] = $values['mandarin_correct_intonation'];
        }
        if (isset($values['mandarin_reads_fluently'])) {
            $updateData['mandarin_reads_fluently'] = $values['mandarin_reads_fluently'];
        }
        if (isset($values['mandarin_able_to_pronounce'])) {
            $updateData['mandarin_able_to_pronounce'] = $values['mandarin_able_to_pronounce'];
        }
        if (isset($values['mandarin_able_to_transfer_the_words'])) {
            $updateData['mandarin_able_to_transfer_the_words'] = $values['mandarin_able_to_transfer_the_words'];
        }

        if (!empty($updateData)) {
            $updateData['updated_at'] = now();
            \App\Models\PrimaryAssesmentRecordDetails::where('id', $id)->update($updateData);
        }
    }

        return redirect()->back()->with('success', 'All records updated successfully!');
    }


}
