<?php

namespace App\Http\Controllers;

use App\Models\SiswaBio;
use App\Models\SiswaData;
use App\Models\SiswaLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiswaDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:75',
            'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
            'jurusan' => 'required|string|in:Rekayasa Perangkat Lunak,Teknik Jaringan Komputer dan Telekomunikasi,Akuntansi dan Keuangan Lembaga,Manajemen Perkantoran dan Layanan Bisnis,Pemasaran',
            'kelas' => 'required|string|in:X,XI,XII',
            'tanggal_lahir' => 'required|Date',
            'alamat' => 'required|string',
            'biografi' => 'nullable|string',
            'hobi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'no_telp' => 'nullable|string',
            'email' => 'nullable|email',
            'password' => 'nullable|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Simpan data siswa
            $siswaData = new SiswaData();
            $siswaData->fill($request->only([
                'nis', 'nama_lengkap', 'jenis_kelamin', 'jurusan', 'kelas', 'tanggal_lahir',
            ]));
            $qr_code = 'api/absensi/siswa' . $siswaData->nis;
            $siswaData->qr_code = $qr_code;
            // $tanggal_lahir = Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('yyyy-mm-dd');
            // $siswaData->tanggal_lahir = $tanggal_lahir;
            $siswaData->save();

            // Simpan data bio siswa
            $siswaBio = new SiswaBio();
            $siswaBio->fill($request->only([
                'nis', 'alamat', 'biografi', 'hobi'
            ]));

            // Simpan gambar jika disediakan
            if ($request->hasFile('image')) {
                $imageName = strtolower($request->nama_lengkap) . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/siswa'), $imageName);
                $siswaBio->image = $imageName;
            }

            $siswaBio->save();

            // Simpan data login siswa jika email dan password disediakan
            if ($request->filled('email') && $request->filled('password')) {
                $siswaLogin = new SiswaLogin();
                $siswaLogin->fill([
                    'nis' => $request->nis,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'no_telp' => $request->filled('no_telp') ? $request->no_telp : null,
                ]);
                $siswaLogin->save();
            }

            DB::commit();

            return back()->with('success', 'Data siswa berhasil disimpan');
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return back()->with('error', 'Data siswa gagal disimpan');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(SiswaData $siswaData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiswaData $siswaData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiswaData $siswaData, $nis)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'string|max:20',
            'nama_lengkap' => 'string|max:75',
            'jenis_kelamin' => 'string|in:Laki-Laki,Perempuan',
            'jurusan' => 'string|in:Rekayasa Perangkat Lunak,Teknik Komputer dan Jaringan',
            'kelas' => 'string|in:X,XI,XII',
            'tanggal_lahir' => 'date_format:Y-m-d',
            'alamat' => 'string',
            'biografi' => 'string',
            'hobi' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'no_telp' => 'string',
            'email' => 'email',
            'password' => 'nullable|string|min:8', // tambahkan validasi min panjang password
        ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        try {
            DB::beginTransaction();

            $siswaData = SiswaData::where('nis', $nis)->firstOrFail();
            $siswaData->update($request->only([
                'nis', 'nama_lengkap', 'jenis_kelamin', 'jurusan', 'kelas', 'tanggal_lahir'
            ]));

            $siswaBio = SiswaBio::where('nis', $nis)->firstOrFail();
            $siswaBio->update($request->only([
                'nis', 'alamat', 'biografi', 'hobi'
            ]));

            if ($request->hasFile('image')) {
                // Ambil gambar lama
                $oldImage = $siswaBio->image;

                // Hapus gambar lama jika ada
                if ($oldImage && file_exists(public_path('images/siswa/' . $oldImage))) {
                    unlink(public_path('images/siswa/' . $oldImage));
                }

                // Simpan gambar baru
                $imageName = strtolower($request->nama_lengkap) . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('images/siswa'), $imageName);
                $siswaBio->image = $imageName;
            }

            // Simpan data siswa
            $siswaBio->save();

            $siswaLogin = SiswaLogin::where('nis', $nis)->firstOrFail();
            // Update email only if it is provided
            if ($request->filled('email')) {
                $siswaLogin = SiswaLogin::where('nis', $nis)->firstOrFail();
                $siswaLogin->update([
                    'email' => $request->email
                ]);
            }

            // Update nomor telepon only if it is provided
            if ($request->filled('no_telp')) {
                $siswaLogin = SiswaLogin::where('nis', $nis)->firstOrFail();
                $siswaLogin->update([
                    'no_telp' => $request->no_telp
                ]);
            }

            // Update password only if it is provided
            if ($request->filled('password')) {
                $siswaLogin = SiswaLogin::where('nis', $nis)->firstOrFail();
                $siswaLogin->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            DB::commit();

            return back()->with('success', 'Data siswa berhasil diperbarui');
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiswaData $siswaData)
    {
        //
    }
}
