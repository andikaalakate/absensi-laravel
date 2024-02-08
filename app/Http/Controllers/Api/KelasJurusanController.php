<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KelasJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelasData = Kelas::all();
        $jurusanData = Jurusan::all();

        if ($kelasData && $jurusanData) {
            return response()->json([
                'status' => true,
                'message' => 'List Data Kelas dan Jurusan',
                'data' => [
                    'kelas' => $kelasData,
                    'jurusan' => $jurusanData
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Kelas dan Jurusan tidak ditampilkan'
            ], 404);
        }
    }

    public function kelas()
    {
        $kelasData = Kelas::all();

        if ($kelasData) {
            return response()->json([
                'status' => true,
                'message' => 'List Data Kelas',
                'data' => [
                    'kelas' => $kelasData,
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Kelas tidak ditampilkan'
            ], 404);
        }
    }

    public function jurusan()
    {
        $jurusanData = Jurusan::all();

        if ($jurusanData) {
            return response()->json([
                'status' => true,
                'message' => 'List Data Jurusan',
                'data' => [
                    'jurusan' => $jurusanData,
                ]
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Jurusan tidak ditampilkan'
            ], 404);
        }
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
    public function store1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kelas' => 'required|string|max:20',
            'nama_kelas' => 'required|string|max:75',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Simpan data siswa
            $kelas = new Kelas();
            $kelas->fill($request->only([
                'id_kelas',
                'nama_kelas',
            ]));
            $kelas->save();

            DB::commit();

            return back()->with('success', 'Data kelas berhasil disimpan');
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return back()->with('error', 'Data kelas gagal disimpan');
        }
    }

    public function store2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_jurusan' => 'required|string|max:20',
            'alias_jurusan' => 'required|string|max:8',
            'nama_jurusan' => 'required|string|max:75',
            'kepala_jurusan' => 'required|string|max:75',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Simpan data jurusan
            $jurusan = new Jurusan();
            $jurusan->fill($request->only([
                'id_jurusan',
                'alias_jurusan',
                'nama_jurusan',
                'kepala_jurusan',
            ]));
            $jurusan->save();

            DB::commit();

            return back()->with('success', 'Data jurusan berhasil disimpan');
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return back()->with('error', 'Data jurusan gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy1(string $id)
    {
        try {
            Kelas::where('id_kelas', $id)->delete();
        } catch (\Throwable $e) {
            return back()->with('error', 'Data kelas gagal dihapus: ' . $e->getMessage());
        }

        return back()->with('success', 'Data kelas berhasil dihapus');
    }
    public function destroy2(string $id)
    {
        try {
            Jurusan::where('id_jurusan', $id)->delete();
        } catch (\Throwable $e) {
            return back()->with('error', 'Data jurusan gagal dihapus: ' . $e->getMessage());
        }

        return back()->with('success', 'Data jurusan berhasil dihapus');
    }
}
