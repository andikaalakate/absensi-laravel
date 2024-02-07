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


        // $url = route('siswa.absensi.show', Auth::user()->nis);
        // $response = Http::withoutVerifying()->timeout(120)->async()->acceptJson()->get($url);

        // $siswaAbsensi = $response->json();

        // dd($siswaAbsensi);

        ini_set('max_execution_time', 120);
        $theUrl     = config('app.guzzle_test_url').'/api/absensi2/siswa/'.Auth::user()->nis;
        $siswaAbsensi   = Http::get($theUrl)->json();
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin', 'siswaJurusan')->where('nis', Auth::user()->nis)->first();
        // $siswaAbsensi = Http::withoutVerifying()->acceptJson()->get(route('siswa.absensi.show2', Auth::user()->nis))->json();

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
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/';
        $siswaAbsensi   = Http::get($theUrl)->json();

        return view('siswa.keamanan', [
            'title' => "Keamanan",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
        ]);
    }
    public function peringkat()
    {
        $siswas = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin')->paginate(10);
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/';
        $siswaAbsensi   = Http::get($theUrl)->json();

        $hadirCount = 0;
        $sakitCount = 0;
        $izinCount = 0;
        $alphaCount = 0;

        // dd($siswas);

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
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/'.Auth::user()->nis;
        $siswaAbsensi   = Http::get($theUrl)->json();

        $hadirCount = 0;
        $sakitCount = 0;
        $izinCount = 0;
        $alphaCount = 0;

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
                    $alphaCount++;
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
            'alphaCount' => $alphaCount,
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
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/'.Auth::user()->nis;
        $siswaAbsensi   = Http::get($theUrl)->json();

        // dd($siswaAbsensi);
        return view('siswa.pindaiqr', [
            'title' => "Pindai QR",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi
        ]);
    }
}
