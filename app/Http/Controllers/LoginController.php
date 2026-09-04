<?php

namespace App\Http\Controllers;

use App\Models\HsStudent;
use App\Models\User;
use App\Models\HsTeacher;
use App\Models\PrimaryTeacher;
use App\Models\PrimaryStudent;
use App\Models\KindergartenTeacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException; // Tambahkan ini
use App\Models\LoginLog;
use Illuminate\Support\Carbon;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login_action2(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $username = $request->username;
        $password = $request->password;

        // Daftar guard dan model yang ingin dicoba
        $guards = [

            'primarystudent' => [
                'model' => PrimaryStudent::class,
                'field' => 'username',
                'role' => 'primarystudent',
                'redirect' => 'primary_student.home',
                'session_data' => ['name' => 'name', 'username' => 'username', 'class' => 'class']
            ],

            'primaryadmin' => [
                'model' => User::class,
                'field' => 'username',
                'role' => 'primaryadmin',
                'redirect' => 'admin_primary.home',
                'session_data' => ['name' => 'name', 'username' => 'username']
            ],
            'hsstudent' => [
                'model' => HsStudent::class,
                'field' => 'username',
                'role' => 'hsstudent',
                'redirect' => 'hs_student.home',
                'session_data' => [
                    'name' => 'name',
                    'username' => 'username',
                    'grade' => 'grade',
                    'class' => 'class',
                    'is_update_password' => 'is_update_password'
                ]
            ],
            'hsadmin' => [
                'model' => User::class,
                'field' => 'username',
                'role' => 'hsadmin',
                'redirect' => 'hs_admin.home',
                'session_data' => ['name' => 'name', 'username' => 'username']
            ],
            'hsteacher' => [
                'model' => HsTeacher::class,
                'field' => 'username',
                'role' => 'hsteacher',
                'redirect' => 'hs_teacher.home',
                'session_data' => ['name' => 'name', 'username' => 'username']
            ],

            'primaryteacher' => [
                'model' => PrimaryTeacher::class,
                'field' => 'username',
                'role' => 'primaryteacher',
                'redirect' => 'primary_teacher.home',
                'session_data' => [
                    'name' => 'name',
                    'username' => 'username',
                    'is_homeroom' => 'is_homeroom',
                    'homeroom_class' => 'homeroom_class',
                    'is_allow_print_report' => 'is_allow_print_report'
                ]
            ],

            'kindergartenteacher' => [
                'model' => KindergartenTeacher::class,
                'field' => 'username',
                'role' => 'kindergartenteacher',
                'redirect' => 'kindergarten_teacher.home',
                'session_data' => ['name' => 'name', 'username' => 'username']
            ],

            'web' => [
                'model' => User::class,
                'field' => 'username', // Field untuk mencari username
                'role' => 'adminprimary',
                'redirect' => 'admin_primary.home',
                'session_data' => ['name' => 'name', 'username' => 'username']
            ],

        ];

        foreach ($guards as $guardName => $config) {
            $user = $config['model']::where($config['field'], $username)->first();

            if ($user && Hash::check($password, $user->password)) {
                Auth::guard($guardName)->login($user);
                $request->session()->regenerate();
                // Simpan data ke session

                session([
                    'role' => $config['role'],
                    'name' => $user->name ?? null, // Untuk Branch
                ]);
                foreach ($config['session_data'] as $sessionKey => $userAttribute) {
                    session([$sessionKey => $user->$userAttribute]);
                }
                return redirect()->route($config['redirect']);
            }else{
                echo "You are unauthorized to view these page";
            }
        }
        // Jika tidak ada guard yang berhasil login
        throw ValidationException::withMessages([
            'username' => ['Username atau password salah.'],
        ]);
    }

    public function login_action(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->username;
        $password = $request->password;

        // =========================
        // STUDENT PRIMARY
        // =========================
        if ($user = PrimaryStudent::where('username', $username)->first()) {

            if (!Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['Username atau password salah.'],
                ]);
            }

            Auth::guard('primarystudent')->login($user);
            $this->saveLoginLog($request, $user, 'primarystudent');
            $request->session()->regenerate();

            session([
                'role' => 'primarystudent',
                'name' => $user->name,
                'username' => $user->username,
                'class' => $user->class,
            ]);

            return redirect()->route('primary_student.home');
        }

        // =========================
        // HS STUDENT
        // =========================
        if ($user = HsStudent::where('username', $username)->first()) {

            if (!Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['Username atau password salah.'],
                ]);
            }

            Auth::guard('hsstudent')->login($user);
            $this->saveLoginLog($request, $user, 'hsstudent');
            $request->session()->regenerate();

            session([
                'role' => 'hsstudent',
                'name' => $user->name,
                'username' => $user->username,
                'grade' => $user->grade,
                'class' => $user->class,
                'is_update_password' => $user->is_update_password,
            ]);

            return redirect()->route('hs_student.home');
        }

        // =========================
        // HS TEACHER
        // =========================
        if ($user = HsTeacher::where('username', $username)->first()) {

            if (!Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['Username atau password salah.'],
                ]);
            }

            Auth::guard('hsteacher')->login($user);
            $this->saveLoginLog($request, $user, 'hsteacher');
            $request->session()->regenerate();

            session([
                'role' => 'hsteacher',
                'name' => $user->name,
                'username' => $user->username,
            ]);

            return redirect()->route('hs_teacher.home');
        }

        // =========================
        // PRIMARY TEACHER
        // =========================
        if ($user = PrimaryTeacher::where('username', $username)->first()) {

            if (!Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['Username atau password salah.'],
                ]);
            }

            Auth::guard('primaryteacher')->login($user);
            $this->saveLoginLog($request, $user, 'primaryteacher');
            $request->session()->regenerate();

            session([
                'role' => 'primaryteacher',
                'name' => $user->name,
                'username' => $user->username,
                'is_homeroom' => $user->is_homeroom,
                'homeroom_class' => $user->homeroom_class,
                'is_allow_print_report' => $user->is_allow_print_report,
            ]);

            return redirect()->route('primary_teacher.home');
        }

        // =========================
        // KINDERGARTEN TEACHER
        // =========================
        if ($user = KindergartenTeacher::where('username', $username)->first()) {

            if (!Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['Username atau password salah.'],
                ]);
            }

            Auth::guard('kindergartenteacher')->login($user);
            $this->saveLoginLog($request, $user, 'kindergartenteacher');
            $request->session()->regenerate();

            session([
                'role' => 'kindergartenteacher',
                'name' => $user->name,
                'username' => $user->username,
                'is_homeroom' => $user->is_homeroom,
                'homeroom_class' => $user->homeroom_class,
                'is_allow_print_report' => $user->is_allow_print_report,
            ]);

            return redirect()->route('kindergarten_teacher.home');
        }

        // =========================
        // ADMIN (User)
        // =========================
        if ($user = User::where('username', $username)->first()) {

            if (!Hash::check($password, $user->password)) {
                throw ValidationException::withMessages([
                    'username' => ['Username atau password salah.'],
                ]);
            }

            switch ($user->role) {

                case 'primaryadmin':

                    Auth::guard('primaryadmin')->login($user);
                    $this->saveLoginLog($request, $user, 'primaryadmin');
                    session([
                        'role' => 'primaryadmin',
                        'name' => $user->name,
                        'username' => $user->username,
                    ]);

                    $request->session()->regenerate();

                    return redirect()->route('admin_primary.home');

                case 'hsadmin':

                    Auth::guard('hsadmin')->login($user);
                    $this->saveLoginLog($request, $user, 'hsadmin');
                    session([
                        'role' => 'hsadmin',
                        'name' => $user->name,
                        'username' => $user->username,
                    ]);

                    $request->session()->regenerate();

                    return redirect()->route('hs_admin.home');

                case 'kindergartenadmin':

                    Auth::guard('kindergartenadmin')->login($user);
                    $this->saveLoginLog($request, $user, 'kindergartenadmin');
                    session([
                        'role' => 'kindergartenadmin',
                        'name' => $user->name,
                        'username' => $user->username,
                    ]);

                    $request->session()->regenerate();

                    return redirect()->route('kindergarten.home');
            }
        }

        throw ValidationException::withMessages([
            'username' => ['Username atau password salah.'],
        ]);
    }

    private function saveLoginLog(Request $request, $user, $role)
    {
        LoginLog::create([
            'username'   => $user->username,
            'name'       => $user->name,
            'role'       => $role,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'login_at'   => Carbon::now(),
        ]);
    }


    public function logout(Request $request)
    {
        // Logout dari semua guard yang mungkin aktif
        // foreach (array_keys(config('auth.guards')) as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         Auth::guard($guard)->logout();
        //     }
        // }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with(['success' => 'Anda telah logout.']);
    }
}
