<?php

namespace App\Http\Controllers\PrimaryTeacher;

use App\Http\Controllers\Controller;
use App\Models\PrimaryClass;
use App\Models\PrimaryCommBook;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user()->name;
        $messages = PrimaryCommBook::where('sender', $user)->orderBy('created_at', 'desc')->get();
        $classes = PrimaryClass::get();
        return view('primaryteacher/dashboard', compact('messages', 'classes'));
    }

    public function storeMessage(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'message' => 'required|string',
            'class' => 'required|exists:primary_classes,class',
        ]);

        PrimaryCommBook::create([
            'sender' => auth()->user()->name,
            'message' => $request->input('message'),
            'class' => $request->input('class'),
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
