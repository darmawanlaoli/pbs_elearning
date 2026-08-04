<?php

namespace App\Http\Controllers\Kindergarten;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $messages = DB::table('chats')->orderBy('id', 'DESC')->get();
        $zoom = DB::table('primary_zooms')->orderBy('id', 'DESC')->get();
        return view('kindergarten/dashboard', compact('messages', 'zoom'));
    }

    public function chat()
    {
        $messages = Chat::with(['user', 'class'])->orderBy('created_at')->get();

        return view('chat.index', compact('messages', 'kelasList'));
    }

    public function storeChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        date_default_timezone_set('Asia/Jakarta');

        Chat::create([
            'sender' => session('name'),
            'class' => $request->kelas_id,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function academicCalendar()
    {
        // $messages = Chat::with(['user', 'class'])->orderBy('created_at')->get();

        $title = 'Academic Calendar';
        $path = 'High School Teacher';
        return view('hsteacher/academic_calendar', compact('title', 'path'));
    }
}
