<?php

namespace App\Http\Controllers\PrimaryStudent;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index()
    {

        $class = session('class');
        $zoom = DB::table('primary_zooms')
            ->where('class', session('class'))
            ->first();

        $grade = session('grade');
        $last_update_password = session('last_update_password');

        if ($last_update_password == '0000-00-00 00:00:00') {
            return view('primary_student/update_password');
        } else {
            return view('primary_student/dashboard', compact('class', 'zoom'));
        }
    }

    public function storeUpdatePassword(Request $request)
    {
        try {

            $request->validate([
                'password' => [
                    'required',
                    'string',
                    'confirmed',
                    Password::min(8)->mixedCase()->numbers(),
                ],
            ], [
                'password.required'  => 'Password baru wajib diisi.',
                'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            ]);

        } catch (ValidationException $e) {
            return redirect()->route('primary_student.home')->with('error', 'Password baru yang Anda input tidak memenuhi syarat. Pastikan password memiliki minimal 8 karakter, mengandung huruf besar, huruf kecil, dan angka. Silakan coba lagi.');
        }

        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->last_update_password = date('Y-m-d H:i:s');
        $user->save();

        // 4. Return Feedback Sukses
        return redirect()->route('login')->with('success', 'Password berhasil diperbarui, silakan login kembali.');
    }
}
