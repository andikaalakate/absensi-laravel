<?php

namespace App\Http\Controllers;

use App\Models\SiswaAbsensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiswaAbsensisController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|string|max:20',
            'lokasi_masuk' => 'required|string',
            'status' => 'required|string|in:Hadir,Sakit,Alpha,Izin',
            'jam_masuk' => 'required|Time',
            'jam_pulang' => 'nullable|Time',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Simpan data jurusan
            $siswaAbsensi = new SiswaAbsensi();
            $siswaAbsensi->fill($request->only([
                'nis',
                'lokasi_masuk',
                'status',
                'jam_masuk',
                'jam_pulang',
            ]));
            $siswaAbsensi->save();

            DB::commit();

            return back()->with('success', 'Data siswaAbsensi berhasil disimpan');
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return back()->with('error', 'Data siswaAbsensi gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SiswaAbsensi $siswaAbsensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiswaAbsensi $siswaAbsensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiswaAbsensi $siswaAbsensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiswaAbsensi $siswaAbsensi)
    {
        //
    }
}
