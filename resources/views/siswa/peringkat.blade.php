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
                    <input class="filter-nama" type="text" placeholder="Cari..." id="cariNama" />
                    <select name="filter_kelas" id="filterKelas">
                        <option value="filter">Filter</option>
                        <option value="semua">Semua</option>
                        <option value="X">X (Sepuluh)</option>
                        <option value="XI">XI (Sebelas)</option>
                        <option value="XII">XII (Dua Belas)</option>
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
                                <p class="nama-siswa">{{ $siswa->siswaData->nama_lengkap }}</p>
                                <small>
                                    @if (isset($absensiCounts[$siswa->siswaData->nis]))
                                        {{ $absensiCounts[$siswa->siswaAbsensi->status]['Hadir'] }} Hadir,
                                        {{ $absensiCounts[$siswa->siswaAbsensi->status]['Sakit'] }} Sakit,
                                        {{ $absensiCounts[$siswa->siswaAbsensi->status]['Izin'] }} Izin,
                                        {{ $absensiCounts[$siswa->siswaAbsensi->status]['Alpha'] }} Alpha
                                    @else
                                        Belum ada data absensi
                                    @endif
                                </small>
                            </td>
                            <td class="td-kelas">{{ $siswa->siswaData->kelas }} - {{ $siswa->siswaJurusan->alias_jurusan }}
                            </td>
                            @if ($loop->iteration >= 4)
                                <td class="td-peringkat">#{{ $loop->iteration }}</td>
                            @else
                                <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                            @endif
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event listener untuk perubahan pada dropdown select
            $('#filterKelas').on('change', function() {
                var filterKelas = $(this).val();

                if (filterKelas === 'semua') {
                    // Redirect ke URL tanpa parameter filter_kelas
                    var url = "{{ route('siswa.peringkat') }}";
                    window.location.href = url;
                } else {
                    // Redirect ke URL dengan parameter filter_kelas
                    var url = "{{ route('siswa.peringkat') }}?filter_kelas=" + filterKelas;
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
