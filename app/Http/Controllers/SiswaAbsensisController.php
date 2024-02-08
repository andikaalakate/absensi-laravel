<?php

namespace App\Http\Controllers;

use App\Models\SiswaAbsensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        try {
            $today = Carbon::today(); // Mendapatkan tanggal hari ini
            $nis = $request->nis;

            $siswaAbsensi = new SiswaAbsensi;

            // Cek apakah sudah ada data absensi untuk hari ini
            $siswaAbsensi = SiswaAbsensi::where('nis', $nis)
                ->first();


            if ($siswaAbsensi) {
                // Jika data absensi sudah ada, lakukan update jam pulang
                $siswaAbsensi->update(['jam_pulang' => now()]);
                return redirect()->back()->with('success', 'Data absensi berhasil ditambahkan.');
            } else {
                // Jika belum ada data absensi, buat data baru
                $siswaAbsensi = SiswaAbsensi::create([
                    'nis' => $request->nis,
                    'jam_masuk' => now(),
                    'jam_pulang' => null,
                    'status' => $request->status,
                    'created_at' => $today,
                    'updated_at' => $today,
                ]);
                $siswaAbsensi->save();
                // return new SiswaAbsensiResource(
                //     status: true,
                //     message: 'Data absensi berhasil ditambahkan.',
                //     resource: $siswaAbsensi
                // );
                return redirect()->back()->with('success', 'Data absensi berhasil ditambahkan.');
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
