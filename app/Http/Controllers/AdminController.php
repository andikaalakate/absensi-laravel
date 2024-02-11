<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\SiswaAbsensi;
use App\Models\SiswaData;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
    public function dashboard(Request $request)
    {
        $theUrl1 = config('app.guzzle_test_url') . '/api/absensi/siswa/';
        $siswaAbsensi = Http::get($theUrl1)->json();

        $theUrl2 = config('app.guzzle_test_url') . '/api/siswa/';
        $siswas = Http::get($theUrl2)->json();

        // dd($siswaAbsensi);
        $today = Carbon::today();

        $siswaDataCount = SiswaData::get();
        $jurusanDataCount = Jurusan::get();
        $kelasDataCount = Kelas::get();
        $adminDataCount = Admin::get();
        $siswaAbsensiCount = SiswaAbsensi::where('status', 'Hadir')
            ->whereDate('created_at', $today)
            ->get();

        // $sesi = $request->session();
        // dd($sesi);

        $siswaHadirCount = $siswaAbsensiCount
            ->pluck('nis')
            ->unique()
            ->count();
        $siswaCount = $siswaDataCount->count();
        $jurusanCount = $jurusanDataCount->count();
        $kelasCount = $kelasDataCount->count();
        $adminCount = $adminDataCount->count();

        // dd($siswaAbsensiCount);
        return view('admin.dashboard', [
            'title' => "Dashboard",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi,
            'siswaCount' => $siswaCount,
            'jurusanCount' => $jurusanCount,
            'kelasCount' => $kelasCount,
            'adminCount' => $adminCount,
            'siswaHadirCount' => $siswaHadirCount
        ]);
    }

    public function siswa()
    {
        $theUrl = config('app.guzzle_test_url') . '/api/absensi/siswa/';
        $siswaAbsensi = Http::get($theUrl)->json();

        $query = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin', 'siswaAbsensi')->filterBySiswa();

        $siswaData = $query->paginate(5)->withQueryString();
        
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
        $kelas = Kelas::paginate(3);
        $jurusan = Jurusan::filterByJurusan()->paginate(3)->withQueryString();
        return view('admin.jurusan', [
            'title' => "Data Jurusan",
            'jurusan' => $jurusan,
            'kelas' => $kelas
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
        $kelas = Kelas::paginate(3);
        $user = Admin::filterByUsers()->paginate(3)->withQueryString();
        $jurusan = Jurusan::paginate(3);
        return view('admin.user', [
            'title' => "Data User",
            'users' => $user,
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }

    public function peringkat(Request $request)
    {
        $theUrl = config('app.guzzle_test_url') . '/api/absensi/siswa/';
        $siswaAbsensi = Http::get($theUrl)->json();
        $siswaAbsensiCount = SiswaAbsensi::get();

        $query = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin', 'siswaAbsensi', 'siswaJurusan')
        ->filterByKelas($request->input('filter_kelas'));

        $siswas = $query->get();

        // dd($siswas);

        $siswaHadirCount = $siswaAbsensiCount
            ->where('status', 'Hadir')
            ->count();
        $siswaSakitCount = $siswaAbsensiCount
            ->where('status', 'Sakit')
            ->count();
        $siswaIzinCount = $siswaAbsensiCount
            ->where('status', 'Izin')
            ->count();
        $siswaAlphaCount = $siswaAbsensiCount
            ->where('status', 'Alpha')
            ->count();

        return view('admin.peringkat', [
            'title' => "Data Peringkat",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi,
            'hadirCount' => $siswaHadirCount,
            'sakitCount' => $siswaSakitCount,
            'izinCount' => $siswaIzinCount,
            'alphaCount' => $siswaAlphaCount,
        ]);
    }

    public function laporan(Request $request)
    {
        $today = Carbon::today();
        $siswaDataCount = SiswaData::with('siswaData', 'siswaKelas', 'siswaJurusan', 'siswaAbsensi')->get();
        $siswaAbsensiCounts = SiswaAbsensi::select(
            DB::raw('COUNT(*) as jumlah_hadir'),
            'kelas',
            'jurusan.alias_jurusan',
            'kelas.variabel_kelas'
        )
            ->join('siswa_data', 'siswa_absensi.nis', '=', 'siswa_data.nis')
            ->join('kelas', 'siswa_data.kelas', '=', 'kelas.nama_kelas')
            ->join('jurusan', 'kelas.alias_jurusan', '=', 'jurusan.alias_jurusan')
            ->where('siswa_absensi.status', 'Hadir')
            ->whereDate('siswa_absensi.created_at', $today)
            ->groupBy('kelas', 'jurusan.alias_jurusan', 'kelas.variabel_kelas')
            ->get();
        // dd($siswaDataCount);
        $siswaCount = $siswaDataCount->count();
        if ($request->get('lihat') == 'pdf') {
            $pdf = Pdf::loadView('admin.cetakLaporan', [
                'siswas' => $siswaDataCount,
                'siswaAbsensiCounts' => $siswaAbsensiCounts,
                'siswaCount' => $siswaCount
            ]);
            return $pdf->stream('cetaklaporan (' . $today . ').pdf');
        }
        if ($request->get('cetak') == 'pdf') {
            $pdf = Pdf::loadView('admin.cetakLaporan', [
                'siswas' => $siswaDataCount,
                'siswaAbsensiCounts' => $siswaAbsensiCounts,
                'siswaCount' => $siswaCount
            ]);
            return $pdf->download('cetaklaporan (' . $today . ').pdf');
        }
        return view('admin.laporan', [
            'title' => "Data Laporan",
            'siswas' => $siswaDataCount,
            'siswaAbsensiCounts' => $siswaAbsensiCounts,
            'siswaCount' => $siswaCount
        ]);
    }

    public function viewLaporan()
    {
        $today = Carbon::today();
        $siswaDataCount = SiswaData::with('siswaData', 'siswaKelas', 'siswaJurusan', 'siswaAbsensi')->get();
        $siswaAbsensiCounts = SiswaAbsensi::select(
            DB::raw('COUNT(*) as jumlah_hadir'),
            'kelas',
            'jurusan.alias_jurusan',
            'kelas.variabel_kelas'
        )
            ->join('siswa_data', 'siswa_absensi.nis', '=', 'siswa_data.nis')
            ->join('kelas', 'siswa_data.kelas', '=', 'kelas.nama_kelas')
            ->join('jurusan', 'kelas.alias_jurusan', '=', 'jurusan.alias_jurusan')
            ->where('siswa_absensi.status', 'Hadir')
            ->whereDate('siswa_absensi.created_at', $today)
            ->groupBy('kelas', 'jurusan.alias_jurusan', 'kelas.variabel_kelas')
            ->get();
        // dd($siswaDataCount);
        $siswaCount = $siswaDataCount->count();
        $pdf = Pdf::loadView('admin.cetakLaporan', [
            'siswas' => $siswaDataCount,
            'siswaAbsensiCounts' => $siswaAbsensiCounts,
            'siswaCount' => $siswaCount
        ]);
        return $pdf->stream('cetaklaporan.pdf');
        // return view('admin.cetakLaporan', [
        //     'title' => "Data Laporan",
        // ]);
    }

    public function cetakLaporan()
    {
        return view('admin.cetakLaporan', [
            'title' => "Data Laporan",
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

            return back()->with('success', 'Data user berhasil disimpan');
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Data user berhasil disimpan',
            // ]);
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return back()->with('error', 'Data user gagal disimpan');
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Data user gagal disimpan: ' . $e->getMessage(),
            // ]);
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
    public function update(UpdateAdminRequest $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'string|max:75',
            'username' => 'string|max:75',
            'email' => 'email|max:75',
            'no_telp' => 'string|max:20',
            'role' => 'in:admin,operator,kepala_sekolah',
            'password' => 'nullable|string|min:8',
        ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        try {
            DB::beginTransaction();

            $admin = Admin::where('id', $id)->firstOrFail();
            $admin->update($request->only([
                'nama',
                'username',
                'email',
                'no_telp',
                'role',
            ]));

            if ($request->filled('password')) {
                $admin = Admin::where('id', $id)->firstOrFail();
                $admin->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            $admin->save();

            DB::commit();

            return back()
                ->with('success', 'Data Admin berhasil diperbarui');
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan

            DB::rollback();
            // return back()->with('error', 'Gagal memperbarui data jurusan');
        }
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
