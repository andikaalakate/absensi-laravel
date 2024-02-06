@extends('layouts.siswa')

@section('head')
<title>Siswa - {{ $title }}</title>
<link rel="stylesheet" href="{{ mix('assets/dashboard/css/profilSiswa.css') }}" />
@endsection

@section('content')
<!-- Dashboard -->
<div class="dash" id="dashBoard">
    <div class="dash-content" id="dashContent">
        <div class="profil-card">
            <div class="img-profil">
                <img src="{{ asset($siswas->siswaBio->image) }}" alt="Avatar 1" />
            </div>
            <div class="data-profil">
                <h1 class="nama-profil">{{ $siswas->siswaData->nama_lengkap }}</h1>
                <table border="1" class="tabel-profile">
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <th>{{ $siswas->siswaData->kelas }}</th>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <th>:</th>
                        <th>{{ $siswas->siswaData->jurusan }}</th>
                    </tr>
                </table>
            </div>
            <div class="waktu-profil">
                <div class="waktu-masuk">
                    @if ($siswaAbsensi['data']['status'] == 'Hadir')
                        Masuk - {{ \Carbon\Carbon::parse($siswaAbsensi['data']['jam_masuk'])->format('H:i') }}
                    @else
                        Tidak Masuk
                    @endif
                </div>

                <div class="waktu-pulang">
                    @if ($siswaAbsensi['data']['status'] == 'Hadir')
                        Pulang - {{ \Carbon\Carbon::parse($siswaAbsensi['data']['jam_pulang'])->format('H:i') }}
                    @else
                        Tidak Pulang
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection