<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function home()
    {
        return redirect('/siswa/profil');
    }
    public function flogin()
    {
        return redirect('/login');
    }
    public function tlogin()
    {
        return redirect('/siswa/profil');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
            'nis' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/siswa/profil');
        } else {
            return redirect()->intended('/login')->with('warning', 'NIS / Password Salah!');
        }
    }
    public function logout(Request $request)
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->intended('/login');
        }
    }
}
