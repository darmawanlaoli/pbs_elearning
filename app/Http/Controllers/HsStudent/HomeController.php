<?php

namespace App\Http\Controllers\HsStudent;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $grade = session('grade');
        $is_update_password = session('is_update_password');
        if ($is_update_password == 0) {
            return view('hsstudent/update_password');
        }else{
            $messages = DB::table('chats')->where('class', $grade)->orderBy('id', 'DESC')->get();
            return view('hsstudent/dashboard', compact('messages'));
        }
    }

    public function storeChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        date_default_timezone_set('Asia/Jakarta');

        Chat::create([
            'sender' => session('name'),
            'class' => session('grade'),
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function storeUpdatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'religion' => 'required|string',
        ]);

        $hsStudent = auth()->user();
        $hsStudent->password = bcrypt($request->password);
        $hsStudent->religion = $request->religion;
        $hsStudent->is_update_password = 1; // Update status to indicate password has been changed
        $hsStudent->save();

        session(['is_update_password' => 1]); // Update session variable

        return redirect()->route('hs_student.home')->with('success', 'Password updated successfully.');
    }
}
