<?php

namespace App\Http\Controllers\PrimaryTeacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrimaryAssesmentRecord;
use App\Models\AcademicYear;
use App\Models\PrimaryReportSubject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Exports\PrimaryAssesmentRecordExport;
use App\Exports\PePrimaryAssesmentRecordExport;
use App\Exports\LangLowerPrimaryAssesmentRecordExport;
use App\Exports\LangUpperPrimaryAssesmentRecordExport;
use App\Exports\ArtPrimaryAssesmentRecordExport;
use App\Exports\MandarinPrimaryAssesmentRecordExport;

use App\Imports\PePrimaryAssesmentRecordImport;
use App\Imports\MandarinPrimaryAssesmentRecordImport;
use App\Imports\LangLowerPrimaryAssesmentRecordImport;
use App\Imports\LangUpperPrimaryAssesmentRecordImport;
use App\Imports\ArtPrimaryAssesmentRecordImport;

use App\Imports\PrimaryAssesmentRecordImport;
use App\Models\PrimaryAssesmentRecordDetails;
use Maatwebsite\Excel\Facades\Excel;

class AcademicRecord extends Controller
{
    public function index()
    {
        $title = 'Academic Record';
        $path = 'Academic Record';
        $assesments = DB::table('primary_assesment_records')
            ->where('class', session('homeroom_class'))
            ->orderBy('term', 'DESC')
            ->orderBy('subject', 'ASC')
            ->get();
        return view('primaryteacher.academic_records.index', compact('title', 'path', 'assesments'));
    }

    public function detail($id)
    {
        $assesments = DB::table('primary_assesment_records')
            ->join('primary_assesment_record_details', 'primary_assesment_records.id', '=', 'primary_assesment_record_details.id_assesment')
            ->where('primary_assesment_records.id', $id)
            ->get();

        $subject = PrimaryAssesmentRecord::where('id', $id)->first();
        $class = $subject->class;
        $grade = substr($class, 0, 2);

        $title = 'Academic Record Detail';
        $path = 'Academic Record';

        if($subject->subject == 'HEALTH AND PHYSICAL EDUCATION') {
            return view('primaryteacher/academic_records/detail_pe', compact('title', 'path', 'assesments', 'subject'));
        }elseif($subject->subject == 'ENGLISH' || $subject->subject == 'BAHASA INDONESIA') {
            if(in_array($grade, ['P1', 'P2', 'P3'])) {
                return view('primaryteacher/academic_records/detail_lang_lower', compact('title', 'path', 'assesments', 'subject'));
            } else {
                return view('primaryteacher/academic_records/detail_lang_upper', compact('title', 'path', 'assesments', 'subject'));
            }

        }elseif($subject->subject == 'ART AND CRAFT') {
            return view('primaryteacher/academic_records/detail_art', compact('title', 'path', 'assesments', 'subject'));
        }elseif($subject->subject == 'MANDARIN') {
            return view('primaryteacher/academic_records/detail_mandarin', compact('title', 'path', 'assesments', 'subject'));
        } else {
            return view('primaryteacher/academic_records/detail', compact('title', 'path', 'assesments', 'subject'));
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
