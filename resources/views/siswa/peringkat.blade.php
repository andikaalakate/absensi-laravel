@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/leaderboard.css') }}">
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Leaderboard <span>#10</span></h1>
            <div class="detail-leaderboard">
                <div class="filter">
                    <input class="filter-nama" type="text" placeholder="Cari..." />
                    <select name="filter-waktu">
                        <option value="mingguan">Mingguan</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>
                <table border="1" class="tabel-leaderboard">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Urutan</th>
                    </tr>
                    @php
                        $studentRatios = [];
                        foreach ($siswas->take(10) as $siswa) {
                            $hadir = $hadirCount;
                            $sakit = $sakitCount;
                            $izin = $izinCount;
                            $alpha = $alphaCount;
                            $absen = 100 - ($hadir + $sakit + $izin + $alpha);
                            $ratio = $hadir / 100;
                            $studentRatios[$siswa->nama_lengkap] = $ratio;
                        }
                        arsort($studentRatios);
                        $sortedStudents = array_keys($studentRatios);
                    @endphp

                    @foreach ($sortedStudents as $namaSiswa)
                        @php
                            $siswa = $siswas->where('nama_lengkap', $namaSiswa)->first();
                            $hadir = $hadirCount;
                            $sakit = $sakitCount;
                            $izin = $izinCount;
                            $alpha = $alphaCount;
                            $ratio = $hadir / ($hadir + $sakit + $izin + $alpha);
                        @endphp

                        <tr>
                            <td class="td-nomor">{{ $loop->iteration }}.</td>
                            <td class="td-nama">
                                <p class="nama-siswa">{{ $siswa->nama_lengkap }}</p>
                                <small>{{ $hadir }} Hadir, {{ $sakit }} Sakit, {{ $izin }} Izin, {{ $alpha }} Alpha</small>
                            </td>
                            <td class="td-kelas">{{ $siswa->kelas }}</td>
                            <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection