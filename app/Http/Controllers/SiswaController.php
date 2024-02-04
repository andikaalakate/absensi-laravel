<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SiswaBio;
use App\Models\SiswaData;
use App\Models\SiswaLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $siswaData = SiswaLogin::with('siswaData')->where('nis', Auth::user()->nis)->first();
        $siswaBio = SiswaLogin::with('siswaBio')->where('nis', Auth::user()->nis)->first();

        return view('siswa.profil', [
            'title' => "Profil",
            'siswas' => $siswaData,
            'siswass' => $siswaBio
        ]);
    }
    public function tentang()
    {
        return view('siswa.tentang', [
            'title' => "Tentang"
        ]);
    }
    public function keamanan()
    {
        $siswaData = SiswaLogin::with('siswaData')->where('nis', Auth::user()->nis)->first();
        $siswaBio = SiswaLogin::with('siswaBio')->where('nis', Auth::user()->nis)->first();

        return view('siswa.keamanan', [
            'title' => "Keamanan",
            'siswas' => $siswaData,
            'siswass' => $siswaBio
        ]);
    }
    public function peringkat()
    {
        return view('siswa.peringkat', [
            'title' => "Peringkat",
            'siswas' => SiswaData::all()
        ]);
    }
    public function statistik()
    {
        return view('siswa.statistik', [
            'title' => "Statistik"
        ]);
    }
    public function tampilan()
    {
        return view('siswa.tampilan', [
            'title' => "Tampilan"
        ]);
    }
    public function pindaiqr()
    {
        $siswaData = SiswaLogin::with('siswaData')->where('nis', Auth::user()->nis)->first();
        $siswaBio = SiswaLogin::with('siswaBio')->where('nis', Auth::user()->nis)->first();

        return view('siswa.pindaiqr', [
            'title' => "Pindai QR",
            'siswas' => $siswaData,
            'siswass' => $siswaBio
        ]);
    }
}
