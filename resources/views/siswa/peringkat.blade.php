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
                    @foreach ($siswas as $siswa)
                        <tr>
                            <td class="td-nomor">{{ $loop->iteration }}.</td>
                            <td class="td-nama">
                                <p class="nama-siswa">{{ $siswa->nama_lengkap }}</p>
                                <small>95 Hadir, 5 Sakit, 3 Izin, 3 Absen</small>
                            </td>
                            <td class="td-kelas">{{ $siswa->kelas }}</td>
                            <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                        </tr>
                    @endforeach
                    {{-- <tr>
                        <td class="td-nomor">1.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">M. Gilang Chandrawinata</p>
                            <small>100 Hadir, 5 Sakit, 0 Izin, 1 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                    </tr>
                    <tr>
                        <td class="td-nomor">2.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Andika Pratama</p>
                            <small>95 Hadir, 5 Sakit, 3 Izin, 3 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                    </tr>
                    <tr>
                        <td class="td-nomor">3.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Budiono Siregar</p>
                            <small>91 Hadir, 5 Sakit, 0 Izin, 10 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                    </tr>
                    <tr>
                        <td class="td-nomor">4.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Andriani Siregar</p>
                            <small>90 Hadir, 5 Sakit, 1 Izin, 10 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat">#4</td>
                    </tr>
                    <tr>
                        <td class="td-nomor">5.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Harianto Budiman</p>
                            <small>89 Hadir, 6 Sakit, 1 Izin, 10 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat">#5</td>
                    </tr>
                    <tr>
                        <td class="td-nomor"> =</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Sukanto</p>
                            <small>85 Hadir, 10 Sakit, 1 Izin, 10 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat">=</td>
                    </tr>
                    <tr>
                        <td class="td-nomor">7.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Cukimai</p>
                            <small>84 Hadir, 10 Sakit, 2 Izin, 10 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat">#7</td>
                    </tr>
                    <tr>
                        <td class="td-nomor">8.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Simon Riley</p>
                            <small>82 Hadir, 10 Sakit, 2 Izin, 12 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat">#8</td>
                    </tr>
                
                    <tr>
                        <td class="td-nomor">9.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">John Price</p>
                            <small>80 Hadir, 10 Sakit, 4 Izin, 12 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat">#9</td>
                    </tr>
                    <tr>
                        <td class="td-nomor">10.</td>
                        <td class="td-nama">
                            <p class="nama-siswa">Dimitir Berbatov</p>
                            <small>78 Hadir, 10 Sakit, 6 Izin, 12 Absen</small>
                        </td>
                        <td class="td-kelas">XI RPL</td>
                        <td class="td-peringkat">#10</td>
                    </tr> --}}
                </table>
            </div>
        </div>
    </div>
@endsection