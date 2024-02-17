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
            'lokasi_masuk' => 'required',
            'status' => 'required|string|in:Hadir,Sakit,Alpha,Izin',
            'jam_masuk' => 'required|date_format:H:i:s',
            'jam_pulang' => 'nullable|date_format:H:i:s|after:jam_masuk',
        ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        try {
            DB::beginTransaction();

            $todayDate = Carbon::now()->toDateString();

            $existingSiswaAbsensi = SiswaAbsensi::where('nis', $request->nis)
                ->whereDate('created_at', $todayDate)
                ->first();

            if ($existingSiswaAbsensi) {
                $existingSiswaAbsensi->jam_pulang = Carbon::now()->format('H:i:s');
                $existingSiswaAbsensi->save();
            } else {
                $siswaAbsensi = new SiswaAbsensi();
                $siswaAbsensi->fill($request->only([
                    'nis',
                    'lokasi_masuk',
                    'status',
                    'jam_masuk',
                    'jam_pulang',
                ]));
                $siswaAbsensi->jam_pulang = Carbon::now()->format('H:i:s');
                $siswaAbsensi->save();
            }

            DB::commit();

            // return back()->with('success', 'Data siswaAbsensi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            // return back()->with('error', 'Data siswaAbsensi gagal disimpan');
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
