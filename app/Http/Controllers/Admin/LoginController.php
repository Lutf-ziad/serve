<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getlogin ()
    {
        return view('admin.dashboard');
    }
}