<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaAbsensiResource;
use App\Models\SiswaAbsensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SiswaAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensis = SiswaAbsensi::latest()->paginate(5);

        return new SiswaAbsensiResource(
            status: true,
            message: "List Data Absensi",
            resource: $absensis
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $today = Carbon::today(); // Mendapatkan tanggal hari ini
            $nis = $request->nis;

            // Cek apakah sudah ada data absensi untuk hari ini
            $siswaAbsensi = SiswaAbsensi::where('nis', $nis)
                ->whereDate('created_at', $today)
                ->first();

            if ($siswaAbsensi) {
                // Jika data absensi sudah ada, lakukan update jam pulang
                $siswaAbsensi->update(['jam_pulang' => now()]);
                return new SiswaAbsensiResource(
                    status: true,
                    message: 'Data absensi berhasil diperbarui.',
                    resource: $siswaAbsensi
                );
            } else {
                // Jika belum ada data absensi, buat data baru
                $siswaAbsensi = SiswaAbsensi::create($request->all());
                return new SiswaAbsensiResource(
                    status: true,
                    message: 'Data absensi berhasil ditambahkan.',
                    resource: $siswaAbsensi
                );
            }
        } catch (\Exception $e) {
            // Tangani jika terjadi exception
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $siswaAbsensi = SiswaAbsensi::where('nis', $nis)->get();

        if ($siswaAbsensi) {
            return new SiswaAbsensiResource(
                status: true,
                message: "Detail Data Absensi",
                resource: $siswaAbsensi
            );
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data absensi tidak ditemukan.',
            ], 404);
        }
    }
    public function show2($nis)
    {
        $siswaAbsensi = SiswaAbsensi::where('nis', $nis)->latest()->first();

        if ($siswaAbsensi) {
            return new SiswaAbsensiResource(
                status: true,
                message: "Detail Data Absensi",
                resource: $siswaAbsensi
            );
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data absensi tidak ditemukan.',
            ], 404);
        }
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
