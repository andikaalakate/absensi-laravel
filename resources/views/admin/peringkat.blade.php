@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminPeringkat.css') . "?id=" . Str::random(16) }}" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Peringkat</h1>
            <div class="detail-leaderboard">
                <div class="filter">
                    <label class="searchInput" for="cari">
                        <input type="text" class="filter-nama" placeholder="Cari Siswa..." id="cari" />
                        <i class="bx bx-search" onclick="search()"></i>
                    </label>
                    <select name="filter-waktu">
                        <option value="mingguan">Mingguan</option>
                        <option value="bulanan">Bulanan</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>
                <div class="tabel">
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
                                <td class="td-kelas">{{ $siswa->kelas }} - {{ $siswa->siswaJurusan->alias_jurusan }}</td>
                                <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/peringkat.js') . "?id=" . Str::random(16) }}"></script>
@endsection
