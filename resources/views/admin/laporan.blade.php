@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminLaporan.css') . '?id=' . Str::random(16) }}">
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Laporan</h1>
            <div class="report">
                <div class="filter-tanggal">
                    <input type="date" name="tanggal" id="tanggalLaporan">
                    <div class="button-report">
                        <a href="{{ route('admin.laporan') }}?lihat=pdf" class="lihat--button">Lihat</a>
                        <a href="{{ route('admin.laporan') }}?cetak=pdf" class="cetak--button">Cetak</a>
                    </div>
                </div>
                <div class="table-report">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Jumlah Hadir</th>
                                <th>Tidak Hadir</th>
                                <th>Jumlah Siswa</th>
                                <th>Persentase</th>
                                <th>PKL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswaAbsensiCounts as $siswaAbsensiCount)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $siswaAbsensiCount->kelas }} - {{ $siswaAbsensiCount->alias_jurusan }}
                                        {{ $siswaAbsensiCount->variabel_kelas }}</td>
                                    <td>Belum Ada
                                    </td>
                                    <td>{{ $siswaAbsensiCount->jumlah_hadir }} / {{ $siswaCount }}</td>
                                    <td>0</td>
                                    <td>{{ $siswaCount }}</td>
                                    <td>
                                        Tidak Ada
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
