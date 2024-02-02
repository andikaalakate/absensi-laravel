<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.profil', [
            'title' => "Profil",
            'nama' => "M. Gilang Chandrawinata"
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
        return view('siswa.keamanan', [
            'title' => "Keamanan"
        ]);
    }
    public function peringkat()
    {
        return view('siswa.peringkat', [
            'title' => "Peringkat",
            'siswas' => Siswa::all()
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
        return view('siswa.pindaiqr', [
            'title' => "Pindai QR"
        ]);
    }
}
