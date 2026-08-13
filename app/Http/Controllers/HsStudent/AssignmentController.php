<?php

namespace App\Http\Controllers\HsStudent;

use App\Http\Controllers\Controller;
use App\Models\AssignmentResponse;
use App\Models\HsProjectFormulation;
use App\Models\HsSubject;
use App\Models\PrimaryLessonPlan;
use App\Models\PrimarySubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function index()
    {
        $title = 'Assignment';
        $path = 'Academic';
        $assignments = DB::table('assignment_responses')
            ->join('hs_assignments', 'assignment_responses.assignment_id', '=', 'hs_assignments.id')
            ->where('assignment_responses.student_name', session('name'))
            ->select(
                'assignment_responses.*', // Mengambil semua kolom assignment_responses (termasuk id-nya)
                'hs_assignments.id as hs_assignment_id',
                'hs_assignments.subject',
                'hs_assignments.class'
            )
            ->get();
        return view('hsstudent/assignment/index', compact('title', 'path', 'assignments'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('query');

        $lessonplanes = PrimaryLessonPlan::where('nama_cabang', 'LIKE', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('username', 'LIKE', "%$keyword%")
            ->get();

        return view('superadmin.cabang.partials.search_result', compact('branches'));
    }

    public function detail($id)
    {
        $title = 'Assignment';
        $path = 'HS Teacher';
        $assignments = DB::table('assignment_responses')
            ->join('hs_assignments', 'assignment_responses.assignment_id', '=', 'hs_assignments.id')
            ->where('assignment_responses.id', $id)
            ->select(
                'assignment_responses.*', // Mengambil semua kolom assignment_responses (termasuk id-nya)
                'hs_assignments.id as hs_assignment_id',
                'hs_assignments.subject',
                'hs_assignments.description',
                'hs_assignments.class'
            )
            ->first();

        return view('hsstudent/assignment/detail', compact('title', 'path', 'assignments'));
    }

    public function submit(Request $request, $id)
    {
        $request->validate([
            'response' => 'nullable|file|mimes:jpeg,png,jpg,webp,pdf,doc,docx|max:2048',
        ]);

        $assignmentResponse = AssignmentResponse::findOrFail($id);

        $data = [];

        if ($request->hasFile('response')) {

            $file = $request->file('response');

            $fileName = time() . '_' . $file->getClientOriginalName();

            $path = public_path('assignment_response');

            $file->move($path, $fileName);

            $data['response'] = $fileName;
        }

        $assignmentResponse->update($data);

        return redirect()
            ->route('hsstudent.assignment')
            ->with('success', 'Success!');
    }

    public function show($subject)
    {
        $title = 'Lesson Material';
        $path = 'Lesson Material';
        $lessonmaterial = DB::table('hs_lesson_materials')
            ->where('subject', $subject)
            ->where('class', session('grade'))
            ->get();

        if (!$lessonmaterial) {
            return redirect()->route('hsstudent.lesson_material')->with('error', 'Lesson material not found.');
        }

        return view('hsstudent/lessonmaterial/show', compact('title', 'path', 'lessonmaterial'));
    }
}
