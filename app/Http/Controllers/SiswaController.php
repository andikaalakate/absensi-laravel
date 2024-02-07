<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SiswaAbsensi;
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

        
        $url = route('siswa.absensi.show', Auth::user()->nis);
        $response = Http::withoutVerifying()->acceptJson()->get($url);
        
        $siswaAbsensi = $response->json();
        
        // dd($siswaAbsensi);

        // ini_set('max_execution_time', 120);
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->where('nis', Auth::user()->nis)->first();
        // $siswaAbsensi = Http::withoutVerifying()->timeout(30)->get(route('siswa.absensi.show2', Auth::user()->nis))->json();

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

        $hadirCount = 0;
        $sakitCount = 0;
        $izinCount = 0;
        $alphaCount = 0;

        // dd($siswaAbsensi);

        foreach ($siswaAbsensi['data']['data'] as $record) {
            switch ($record['status']) {
                case 'Hadir':
                    $hadirCount++;
                    break;
                case 'Sakit':
                    $sakitCount++;
                    break;
                case 'Izin':
                    $izinCount++;
                    break;
                case 'Alpha':
                    $alphaCount++;
                    break;
                default:
                    break;
            }
        }

        return view('siswa.peringkat', [
            'title' => "Peringkat",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi,
            'hadirCount' => $hadirCount,
            'sakitCount' => $sakitCount,
            'izinCount' => $izinCount,
            'alphaCount' => $alphaCount,
        ]);
    }
    public function statistik()
    {
        $siswaAbsensi = Http::withoutVerifying()->get(route('siswa.absensi.show', Auth::user()->nis))->json();

        $hadirCount = 0;
        $sakitCount = 0;
        $izinCount = 0;
        $absenCount = 0;

        foreach ($siswaAbsensi['data'] as $record) {
            switch ($record['status']) {
                case 'Hadir':
                    $hadirCount++;
                    break;
                case 'Sakit':
                    $sakitCount++;
                    break;
                case 'Izin':
                    $izinCount++;
                    break;
                case 'Alpha':
                    $absenCount++;
                    break;
                default:
                    break;
            }
        }

        // dd($hadirCount, $sakitCount, $izinCount, $absenCount);

        return view('siswa.statistik', [
            'title' => "Statistik",
            'siswaAbsensi' => $siswaAbsensi,
            'hadirCount' => $hadirCount,
            'sakitCount' => $sakitCount,
            'izinCount' => $izinCount,
            'absenCount' => $absenCount,
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
