<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaAbsensiResource;
use App\Models\SiswaAbsensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
                $siswaAbsensi = SiswaAbsensi::create($request->all());
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
    public function show($nis)
    {
        $siswaAbsensi = SiswaAbsensi::where('nis', $nis)
            ->latest('jam_masuk')
            ->paginate(10);

        return new SiswaAbsensiResource(
            status: true,
            message: "Detail Data Absensi",
            resource: $siswaAbsensi
        );
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


    public function storeOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|string|max:20',
            'lokasi_masuk' => 'required|string',
            'status' => 'required|string|in:Hadir,Sakit,Alpha,Izin',
            'jam_masuk' => 'required|date_format:H:i:s',
            'jam_pulang' => 'nullable|date_format:H:i:s|after:jam_masuk',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Cek apakah sudah ada data untuk nis pada hari ini
            $siswaAbsensi = SiswaAbsensi::where('nis', $request->nis)
                ->whereDate('created_at', today())
                ->first();

            if ($siswaAbsensi) {
                // Jika sudah ada, update data
                $siswaAbsensi->fill($request->only([
                    'jam_pulang',
                ]));
                $siswaAbsensi->save();
            } else {
                // Jika belum ada, buat entri baru
                $siswaAbsensi = new SiswaAbsensi();
                $siswaAbsensi->fill($request->only([
                    'nis',
                    'lokasi_masuk',
                    'status',
                    'jam_masuk',
                ]));
                $siswaAbsensi->save();
            }

            DB::commit();

            return back()->with('success', 'Data siswaAbsensi berhasil disimpan');
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return back()->with('error', 'Data siswaAbsensi gagal disimpan');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $validator = Validator::make($request->all(), [
            'jam_pulang' => 'required|date_format:H:i:s|after:jam_masuk',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();

            // Cek apakah sudah ada data untuk nis pada hari ini
            $siswaAbsensi = SiswaAbsensi::where('nis', $nis)
                ->whereDate('created_at', today())
                ->first();

            if ($siswaAbsensi) {
                // Jika sudah ada, update jam_pulang
                $siswaAbsensi->jam_pulang = $request->jam_pulang;
                $siswaAbsensi->save();
            } else {
                // Jika tidak ada, kembalikan respons error
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            }

            DB::commit();

            return response()->json(['message' => 'Data berhasil diperbarui'], 200);
        } catch (\Exception $e) {
            // Tangani rollback jika terjadi kesalahan
            DB::rollback();
            return response()->json(['error' => 'Data gagal diperbarui'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiswaAbsensi $siswaAbsensi)
    {
        //
    }
}
