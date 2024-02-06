<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SiswaBio;
use App\Models\SiswaData;
use App\Models\SiswaLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SiswaDataApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswaData = SiswaData::all();
        $siswaBio = SiswaBio::all();
        $siswaLogin = SiswaLogin::all();

        if (!$siswaData || !$siswaBio || !$siswaLogin) {
            return response()->json([
                'status' => false,
                'message' => 'Data Siswa tidak ditampilkan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Siswa berhasil ditampilkan',
            'data' => [
                'siswa_data' => $siswaData,
                'siswa_bio' => $siswaBio,
                'siswa_login' => $siswaLogin
            ]
        ], 200);
    }

    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:75',
            'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
            'jurusan' => 'required|string|in:Rekayasa Perangkat Lunak,Teknik Komputer dan Jaringan',
            'kelas' => 'required|string|in:X RPL,XI RPL,XII RPL,X TKJ,XI TKJ,XII TKJ',
            'tanggal_lahir' => 'required|date_format:Y-m-d',
            'alamat' => 'required|string',
            'biografi' => 'required|string',
            'hobi' => 'required|string',
            'image' => 'required|string',
            'no_telp' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        $siswaData = new SiswaData($request->only([
            'nis',
            'nama_lengkap',
            'jenis_kelamin',
            'jurusan',
            'kelas',
            'tanggal_lahir'
        ]));

        $siswaBio = new SiswaBio($request->only([
            'nis',
            'alamat',
            'biografi',
            'hobi',
            'image'
        ]));

        $siswaLogin = new SiswaLogin($request->only([
            'nis',
            'password',
            'email',
            'no_telp'
        ]));

        $siswaData->save();
        $siswaBio->save();
        $siswaLogin->save();

        return redirect()->route('siswa.create')->with('success', 'Data Siswa berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $nis)
    {
        $siswaData = SiswaData::where('nis', $nis)->first();
        $siswaBio = SiswaBio::where('nis', $nis)->first();
        $siswaLogin = SiswaLogin::where('nis', $nis)->first();

        if (!$siswaData || !$siswaBio || !$siswaLogin) {
            return response()->json([
                'status' => false,
                'message' => 'Data Siswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Siswa berhasil ditemukan',
            'data' => [
                'siswa_data' => $siswaData,
                'siswa_bio' => $siswaBio,
                'siswa_login' => $siswaLogin
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
