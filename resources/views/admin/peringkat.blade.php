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
                    <form id="searchForm" action="{{ route('admin.peringkat') }}">
                        <label class="searchInput" for="cari">
                            <input type="text" class="filter-nama" placeholder="Cari siswa..." id="cari"
                                name="search" value="{{ request('search') }}" />
                            <i id="submitBtn" class="bx bx-search"></i>
                        </label>
                    </form>
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
                            $i = ($siswas->currentPage() - 1) * $siswas->perPage() + 1;
                            $sortedSiswas = $siswas->sortByDesc('percent_hadir');
                        @endphp

                        @foreach ($sortedSiswas as $siswa)
                            <tr>
                                <td class="td-nomor">{{ $i++ }}.</td>
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
                                @if ($loop->iteration <= 3)
                                    <td class="td-peringkat"><i class='bx bxs-medal'></i></td>
                                @else
                                    <td class="td-peringkat">#{{ $loop->iteration }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
                @if ($siswas->hasPages())
                    <div class="pagination">
                        @php
                            $currentPage = $siswas->currentPage();
                            $lastPage = $siswas->lastPage();
                            $startPage = max($currentPage - 2, 1);
                            $endPage = min($currentPage + 1, $lastPage);
                        @endphp

                        @if ($currentPage > 1)
                            <button onclick="window.location.href = '{{ $siswas->url(1) }}'">
                                <i class='bx bx-first-page'></i>
                            </button>
                            <button onclick="window.location.href = '{{ $siswas->previousPageUrl() }}'">
                                <i class='bx bx-chevron-left'></i>
                            </button>
                        @endif

                        @for ($i = $startPage; $i <= $endPage; $i++)
                            <button onclick="window.location.href = '{{ $siswas->url($i) }}'"
                                @if ($i === $currentPage) class="active" @endif>{{ $i }}</button>
                        @endfor

                        @if ($currentPage < $lastPage)
                            <button onclick="window.location.href = '{{ $siswas->nextPageUrl() }}'">
                                <i class='bx bx-chevron-right'></i>
                            </button>
                            <button onclick="window.location.href = '{{ $siswas->url($lastPage) }}'">
                                <i class='bx bx-last-page'></i>
                            </button>
                        @endif
                    </div>
                @endif
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
