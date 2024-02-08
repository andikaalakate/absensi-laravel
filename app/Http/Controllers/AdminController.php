<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\SiswaData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
        $theUrl1     = config('app.guzzle_test_url').'/api/absensi/siswa/';
        $siswaAbsensi   = Http::get($theUrl1)->json();

        // dd($siswaAbsensi);

        // ini_set('max_execution_time', 120);
        // $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->get();
        // $siswaAbsensi = Http::withoutVerifying()->timeout(30)->get(route('siswa.absensi.show2', Auth::user()->nis))->json();
        $theUrl2     = config('app.guzzle_test_url').'/api/siswa/';
        $siswas   = Http::get($theUrl2)->json();

        // dd($siswas);
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
        // $siswaAbsensi = Http::withoutVerifying()->timeout(30)->get(route('siswa.absensi.show2', Auth::user()->nis))->json();
        
        // $theUrl2     = config('app.guzzle_test_url').'/api/siswa/';
        // $siswas   = Http::get($theUrl2)->json();
        
        $siswaData = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->paginate(5);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        // dd($siswaData);
        return view('admin.siswa', [
            'title' => "Data Siswa",
            'siswas' => $siswaData,
            'siswaAbsensi' => $siswaAbsensi,
            'jurusan' => $jurusan,
            'kelas' => $kelas
        ]);

    }

    public function jurusan()
    {
        $jurusan = Jurusan::paginate(3);
        return view('admin.jurusan', [
            'title' => "Data Jurusan",
            'jurusan' => $jurusan
        ]);
    }

    public function kelas()
    {
        $siswaData = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->get();
        $kelas = Kelas::paginate(3);
        return view('admin.kelas', [
            'title' => "Data Kelas",
            'siswas' => $siswaData,
            'kelas' => $kelas
        ]);
    }

    public function user()
    {
        $user = Admin::paginate(3);
        return view('admin.user', [
            'title' => "Data User",
            'users' => $user
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:75',
            'username' => 'required|string|max:75',
            'email' => 'required|email|max:75',
            'no_telp' => 'required|string|max:20',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,operator,kepala_sekolah',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Simpan data jurusan
            if ($request->filled('username') && $request->filled('password')) {
                $admin = new Admin();
                $admin->fill([
                    'nama' => $request->nama,
                    'username' => $request->username,
                    'email' => $request->email,
                    'role' => $request->role,
                    'password' => bcrypt($request->password),
                    'no_telp' => $request->filled('no_telp') ? $request->no_telp : null,
                ]);
                $admin->save();
            }

            DB::commit();

            // return back()->with('success', 'Data user berhasil disimpan');
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan',
            ]);
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            // return back()->with('error', 'Data user gagal disimpan');
            return response()->json([
                'status' => false,
                'message' => 'Data user gagal disimpan: ' . $e->getMessage(),
            ]);
        }
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
    public function destroy(Admin $admin, Request $request, $id)
    {
        try {
            Admin::where('id', $id)->delete();
        } catch (\Throwable $e) {
            // return back()->with('error', 'Data user gagal dihapus: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Data user gagal dihapus: ' . $e->getMessage(),
            ]);
        }

        // return back()->with('success', 'Data user berhasil dihapus');
        return response()->json([
            'status' => true,
            'message' => 'Data user berhasil dihapus',
        ]);
    }
}
