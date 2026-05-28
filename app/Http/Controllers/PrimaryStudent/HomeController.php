<?php

namespace App\Http\Controllers\PrimaryStudent;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        
        $class = session('class');
        $zoom = DB::table('primary_zooms')
            ->where('class', session('class'))
            ->first();
        return view('primary_student/dashboard', compact('class', 'zoom'));
    }
}
