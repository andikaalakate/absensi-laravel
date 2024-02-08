<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\SiswaData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function home()
    {
        return redirect('/admin/dashboard');
    }
    public function flogin()
    {
        return redirect('/admin/login');
    }
    public function tlogin()
    {
        return redirect('/admin/dashboard');
    }
    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            // 'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        } else {
            return redirect()->intended('/admin/login')->with('warning', 'Username / Password Salah!');
        }
    }

    public function login(Request $request)
    {
        return view('auth.login');
    }
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();
            return redirect()->intended('/admin/login');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/';
        $siswaAbsensi   = Http::get($theUrl)->json();

        // dd($siswaAbsensi);

        // ini_set('max_execution_time', 120);
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->get();
        // $siswaAbsensi = Http::withoutVerifying()->timeout(30)->get(route('siswa.absensi.show2', Auth::user()->nis))->json();

        return view('admin.dashboard', [
            'title' => "Dashboard",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
        ]);
    }

    public function siswa()
    {
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/';
        $siswaAbsensi   = Http::get($theUrl)->json();

        // dd($siswaAbsensi);

        // ini_set('max_execution_time', 120);
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->get();
        // $siswaAbsensi = Http::withoutVerifying()->timeout(30)->get(route('siswa.absensi.show2', Auth::user()->nis))->json();

        return view('admin.siswa', [
            'title' => "Data Siswa",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
        ]);
    }

    public function jurusan()
    {
        return view('admin.jurusan', [
            'title' => "Data Jurusan",
        ]);
    }

    public function kelas()
    {
        return view('admin.kelas', [
            'title' => "Data Kelas",
        ]);
    }

    public function user()
    {
        return view('admin.user', [
            'title' => "Data User",
        ]);
    }

    public function peringkat()
    {
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->get();
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/';
        $siswaAbsensi   = Http::get($theUrl)->json();

        $hadirCount = 0;
        $sakitCount = 0;
        $izinCount = 0;
        $alphaCount = 0;

        // dd($siswaAbsensi);

        foreach ($siswaAbsensi['data']['data'] as $record) {
            switch ($record['status']) {
                case 'Hadir':
                    $hadirCount++;
                    break;
                case 'Sakit':
                    $sakitCount++;
                    break;
                case 'Izin':
                    $izinCount++;
                    break;
                case 'Alpha':
                    $alphaCount++;
                    break;
                default:
                    break;
            }
        }

        return view('admin.peringkat', [
            'title' => "Data Peringkat",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi,
            'hadirCount' => $hadirCount,
            'sakitCount' => $sakitCount,
            'izinCount' => $izinCount,
            'alphaCount' => $alphaCount,
        ]);
    }

    public function laporan()
    {
        return view('admin.laporan', [
            'title' => "Data Kelas",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
