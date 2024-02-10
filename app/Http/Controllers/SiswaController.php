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
        // dd($siswaAbsensi);
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
    public function peringkat(Request $request)
    {
        $theUrl     = config('app.guzzle_test_url').'/api/absensi/siswa/';
        $siswaAbsensi   = Http::get($theUrl)->json();
        $siswaAbsensiCount = SiswaAbsensi::get();

        $filterKelas = $request->input('filter_kelas');

        $query = SiswaData::with('siswaData', 'siswaBio', 'siswaLogin', 'siswaAbsensi');

        if ($filterKelas && $filterKelas !== 'semua') {
            $query->whereHas('siswaData', function ($q) use ($filterKelas) {
                $q->where('kelas', $filterKelas);
            });
        }

        $siswas = $query->paginate(10);
        $siswaHadirCount = $siswaAbsensiCount
            ->where('status', 'Hadir')
            ->count();
        $siswaSakitCount = $siswaAbsensiCount
            ->where('status', 'Sakit')
            ->count();
        $siswaIzinCount = $siswaAbsensiCount
            ->where('status', 'Izin')
            ->count();
        $siswaAlphaCount = $siswaAbsensiCount
            ->where('status', 'Alpha')
            ->count();

        return view('siswa.peringkat', [
            'title' => "Peringkat",
            'siswas' => $siswas,
            'siswaAbsensi' => $siswaAbsensi,
            'hadirCount' => $siswaHadirCount,
            'sakitCount' => $siswaSakitCount,
            'izinCount' => $siswaIzinCount,
            'alphaCount' => $siswaAlphaCount,
        ]);
    }
    public function statistik(Request $request)
    {
        $nis = Auth::user()->nis;
        $absensiUrl = config('app.guzzle_test_url') . "/api/absensi/siswa/" . $nis;
        $statistik_url = route('siswa.statistik');

        if ($request->input('page') != '') {
            $absensiUrl .= "?page=" . $request->input('page');
        }

        $siswaAbsensiArray = Http::get($absensiUrl)->json();
        $siswaAbsensi = $siswaAbsensiArray['data'];

        foreach ($siswaAbsensi['links'] as &$link) {
            if ($link['label'] == 'pagination.previous') {
                $link['label'] = 'Previous';
            } elseif ($link['label'] == 'pagination.next') {
                $link['label'] = 'Next';
            }

            if ($link['url']) {
                $url = parse_url($link['url']);
                $query = isset($url['query']) ? '?' . $url['query'] : '';
                $link['url2'] = $statistik_url . $query;
            }
        }

        $siswaData = $siswaAbsensi;

        $absensiCount = SiswaAbsensi::where('nis', $nis)->get();

        // dd($siswaData);

        $hadirCount = $absensiCount
        ->where('status', 'Hadir')
        // ->whereBetween('jam_masuk', ['06:00:00', '08:00:00'])
        // ->whereBetween('jam_pulang', ['11:45:00', '14:00:00'])
        ->count();
        $sakitCount = $absensiCount
        ->where('status', 'Sakit')
        // ->whereBetween('jam_masuk', ['06:00:00', '08:00:00'])
        // ->whereBetween('jam_pulang', ['11:45:00', '14:00:00'])
        ->count();
        $izinCount = $absensiCount
        // ->whereBetween('jam_masuk', ['06:00:00', '08:00:00'])
        // ->whereBetween('jam_pulang', ['11:45:00', '14:00:00'])
        ->where('status', 'Izin')
        ->count();
        $alphaCount = $absensiCount
        // ->whereBetween('jam_masuk', ['06:00:00', '08:00:00'])
        // ->whereBetween('jam_pulang', ['11:45:00', '14:00:00'])
        ->where('status', 'Alpha')
        ->count();

        return view('siswa.statistik', [
            'title' => "Statistik",
            'siswaAbsensi' => $siswaAbsensi,
            'siswaData' => $siswaData,
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
