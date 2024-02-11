@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminPeringkat.css') . '?id=' . Str::random(16) }}" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Peringkat</h1>
            <div class="detail-leaderboard">
                <div class="filter">
                    <label class="searchInput" for="cariNama">
                        <input type="text" class="filter-nama" placeholder="Cari Siswa..." id="cariNama" />
                        <i class="bx bx-search" id="cari-icon"></i>
                    </label>
                    <select name="filter_kelas" id="filterKelas">
                        <option value="semua" {{ request('filter_kelas') == 'semua' ? 'selected' : '' }}>Semua</option>
                        <option value="X" {{ request('filter_kelas') == 'X' ? 'selected' : '' }}>X (Sepuluh)</option>
                        <option value="XI" {{ request('filter_kelas') == 'XI' ? 'selected' : '' }}>XI (Sebelas)</option>
                        <option value="XII" {{ request('filter_kelas') == 'XII' ? 'selected' : '' }}>XII (Dua Belas)
                        </option>
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
                            $sortedSiswas = $siswas->sortByDesc('percent_hadir');
                        @endphp

                        @foreach ($sortedSiswas as $siswa)
                            <tr>
                                <td class="td-nomor">{{ $loop->iteration }}.</td>
                                <td class="td-nama">
                                    <p class="nama-siswa">{{ $siswa->siswaData->nama_lengkap }}</p>
                                    <small>
                                        {{ $siswa->jumlah_hadir }} Hadir,
                                        {{ $siswa->jumlah_sakit }} Sakit,
                                        {{ $siswa->jumlah_izin }} Izin,
                                        {{ $siswa->jumlah_alpha }} Alpha
                                    </small>
                                </td>
                                <td class="td-kelas">{{ $siswa->siswaData->kelas }} -
                                    {{ $siswa->siswaJurusan->alias_jurusan }}
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
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/peringkat.js') . '?id=' . Str::random(16) }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event listener untuk perubahan pada dropdown select
            $('#filterKelas').on('change', function() {
                var filterKelas = $(this).val();

                if (filterKelas === 'semua') {
                    // Redirect ke URL tanpa parameter filter_kelas
                    var url = "{{ route('admin.peringkat') }}";
                    window.location.href = url;
                } else {
                    // Redirect ke URL dengan parameter filter_kelas
                    var url = "{{ route('admin.peringkat') }}?filter_kelas=" + filterKelas;
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
