<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SiswaBio;
use App\Models\SiswaData;
use App\Models\SiswaLogin;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SiswaController extends Controller
{
    public function index()
    {
        // $client = new Client();
        // $url = route('siswa.absensi.show', Auth::user()->nis);
        // $options = [
        //     'verify' => false,
        //     'accept' => 'application/json'
        // ];

        // $response = $client->request('GET', $url, $options);
        // $siswaAbsensi = $response->getBody()->getContents();

        // dd($siswaAbsensi);

        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->where('nis', Auth::user()->nis)->first();
        $siswaAbsensi = Http::withoutVerifying()->get(route('siswa.absensi.show2', Auth::user()->nis))->json();

        return view('siswa.profil', [
            'title' => "Profil",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
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
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->where('nis', Auth::user()->nis)->first();
        $siswaAbsensi = Http::withoutVerifying()->get(route('siswa.absensi.index'))->json();

        return view('siswa.keamanan', [
            'title' => "Keamanan",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
        ]);
    }
    public function peringkat()
    {
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->get();
        $siswaAbsensi = Http::withoutVerifying()->get(route('siswa.absensi.index'))->json();

        return view('siswa.peringkat', [
            'title' => "Peringkat",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
        ]);
    }
    public function statistik()
    {
        $siswaAbsensi = Http::withoutVerifying()->get(route('siswa.absensi.show', Auth::user()->nis))->json();

        // dd($siswaAbsensi); 

        return view('siswa.statistik', [
            'title' => "Statistik",
            'siswaAbsensi' => $siswaAbsensi
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
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->where('nis', Auth::user()->nis)->first();
        $siswaAbsensi = Http::withoutVerifying()->get(route('siswa.absensi.index'))->json();

        return view('siswa.pindaiqr', [
            'title' => "Pindai QR",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
        ]);
    }
}
