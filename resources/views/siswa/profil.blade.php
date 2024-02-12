@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/profilSiswa.css') . '?id=' . Str::random(16) }}" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <div class="profil-card">
                <div class="img-profil">
                    <img src="@if ($siswas->siswaBio->image) /images/siswa/{{ $siswas->siswaBio->image }}
                @else
                    {{ asset('images/siswa/avatar1.webp') }} @endif"
                        alt="{{ $siswas->siswaData->nama_lengkap }}" />
                </div>
                <div class="data-profil">
                    <h1 class="nama-profil">{{ $siswas->siswaData->nama_lengkap }}</h1>
                    <table border="1" class="tabel-profile">
                        <tr>
                            <th>Kelas</th>
                            <th>:</th>
                            <th>{{ $siswas->siswaData->kelas }} - {{ $siswas->siswaJurusan->alias_jurusan }}
                                {{ $siswas->siswaData->variabel_kelas }}</th>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <th>:</th>
                            <th>{{ $siswas->siswaData->jurusan }}</th>
                        </tr>
                    </table>
                </div>
                <div class="waktu-profil">
                    @if ($siswaAbsensi === null)
                        <div class="waktu-masuk">Tidak Masuk</div>
                        <div class="waktu-pulang">-</div>
                    @else
                        @if (isset($siswaAbsensi['data']['jam_masuk']))
                            @php
                                $jamMasuk = \Carbon\Carbon::parse($siswaAbsensi['data']['jam_masuk']);
                            @endphp

                            @if ($jamMasuk->greaterThan(\Carbon\Carbon::parse('07:15')))
                                <div class="waktu-masuk terlambat">Terlambat</div>
                            @else
                                <div class="waktu-masuk">{{ $jamMasuk->format('H:i') }}</div>
                            @endif
                        @else
                            <div class="waktu-masuk">Tidak Masuk</div>
                        @endif

                        @if (isset($siswaAbsensi['data']['jam_pulang']))
                            <div class="waktu-pulang">
                                {{ \Carbon\Carbon::parse($siswaAbsensi['data']['jam_pulang'])->format('H:i') }}</div>
                        @else
                            <div class="waktu-pulang">Belum Pulang</div>
                        @endif
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
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td class="status">
                                <span
                                    class="bg-{{ $siswas->siswaLogin->last_seen >= now()->subMinutes(2) ? 'green' : 'red' }}">
                                    {{ $siswas->siswaLogin->last_seen >= now()->subMinutes(2) ? 'Online' : 'Offline' }}
                                </span>
                            </td>
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
