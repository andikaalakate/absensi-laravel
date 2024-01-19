<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function flogin()
    {
        return redirect('/login');
    }
    public function tlogin()
    {
        return redirect('/siswa/dashboard');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function proseslogin(Request $request)
    {
        if (Auth::guard('siswa')->attempt(['nis' => $request->nis, 'password' => $request->password])) {
            return redirect('/siswa/dashboard');
        } else {
            return redirect('/login')->with('warning', 'NIS / Password Salah!');
        }
    }
    public function logout()
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
            return redirect('/login');
        }
    }
}
