<?php

namespace App\Http\Controllers\HighSchool;
use App\Models\Chat;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $messages = DB::table('chats')->orderBy('id', 'DESC')->get();
        return view('high_school/dashboard', compact('messages'));
    }
}
