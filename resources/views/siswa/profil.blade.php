@extends('layouts.siswa')

@section('head')
<title>Siswa - {{ $title }}</title>
<link rel="stylesheet" href="{{ mix('assets/dashboard/css/profilSiswa.css') . "?id=" . Str::random(16) }}" />
@endsection

@section('content')
<!-- Dashboard -->
<div class="dash" id="dashBoard">
    <div class="dash-content" id="dashContent">
        <div class="profil-card">
            <div class="img-profil">
                <img src="@if ($siswas->siswaBio->image)
                /images/siswa/{{ $siswas->siswaBio->image }}
                @else
                    {{ asset('images/siswa/avatar1.webp') }}
                @endif" alt="{{ $siswas->siswaData->nama_lengkap }}" />
            </div>
            <div class="data-profil">
                <h1 class="nama-profil">{{ $siswas->siswaData->nama_lengkap }}</h1>
                <table border="1" class="tabel-profile">
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <th>{{ $siswas->siswaData->kelas }} - {{ $siswas->siswaJurusan->alias_jurusan }}</th>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <th>:</th>
                        <th>{{ $siswas->siswaData->jurusan }}</th>
                    </tr>
                </table>
            </div>
            <div class="waktu-profil">
                @if (empty($siswaAbsensi['data']))
                    <div class="waktu-masuk">Tidak Masuk</div>
                    <div class="waktu-pulang">Belum Pulang</div>
                @else
                    @php
                        $latestAttendance = collect($siswaAbsensi['data'])
                            ->where('nis', $siswas->siswaData->nis)
                            ->sortByDesc('created_at')
                            ->first();
                    @endphp

                    <div class="waktu-masuk">
                        @if ($latestAttendance && $latestAttendance['status'] == 'Hadir')
                            Masuk - {{ \Carbon\Carbon::parse($latestAttendance['jam_masuk'])->format('H:i') }}
                        @else
                            Tidak Masuk
                        @endif
                    </div>

                    <div class="waktu-pulang">
                        @if ($latestAttendance && $latestAttendance['status'] == 'Hadir' && $latestAttendance['jam_pulang'])
                            Pulang - {{ \Carbon\Carbon::parse($latestAttendance['jam_pulang'])->format('H:i') }}
                        @else
                            Belum Pulang
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="content-container">
            <div class="biografi-content">
                <table border=".3" class="biografi-table">
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td>{{ $siswas->siswaData->nis }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $siswas->siswaData->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $siswas->siswaBio->alamat }}</td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td>{{ $siswas->siswaLogin->no_telp }}</td>
                </tr>
                </table>
            </div>
            <div class="current-location">
                <h1><i class='bx bx-current-location'></i>Lokasi saat ini</h1>
                <div class="maps" id="location">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboard/js/userLocation.js') }}"></script>
@endsection
