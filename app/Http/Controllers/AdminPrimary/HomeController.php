<?php

namespace App\Http\Controllers\AdminPrimary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('adminprimary/dashboard');
    }
}
