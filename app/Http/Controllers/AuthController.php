<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function proseslogin(Request $request)
    {
        return view('auth.login');
    }
}
