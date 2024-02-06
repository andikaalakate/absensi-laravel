<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaAbsensiResource;
use App\Models\SiswaAbsensi;
use Illuminate\Http\Request;

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
        //
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
