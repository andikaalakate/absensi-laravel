@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminJurusan.css') . '?id=' . Str::random(16) }}"
        media="all" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Jurusan</h1>
            <div class="data-jurusan">
                <form id="searchForm" action="{{ route('admin.jurusan') }}">
                    <label class="searchInput" for="cari">
                        <input type="text" placeholder="Cari jurusan..." id="cari" name="search" value="{{ request('search') }}" />
                        <i id="submitBtn" class="bx bx-search"></i>
                    </label>
                </form>
                @foreach ($jurusan as $juru)
                    <div class="tabel">
                        <table border="1" class="table-data-jurusan" id="{{ $loop->iteration }}">
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td>{{ $juru->id_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Alias</td>
                                <td>:</td>
                                <td>{{ $juru->alias_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td>{{ $juru->nama_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Kepala Jurusan</td>
                                <td>:</td>
                                <td>{{ $juru->kepala_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Interaksi</td>
                                <td>:</td>
                                <td class="aksiButton">
                                    <button id="editButtonJurusan" data-id_jurusan="{{ $juru->id_jurusan }}"
                                        data-nama_jurusan="{{ $juru->nama_jurusan }}"
                                        data-alias_jurusan="{{ $juru->alias_jurusan }}"
                                        data-kepala_jurusan="{{ $juru->kepala_jurusan }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('jurusan.destroy', $juru->id_jurusan) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button id="hapusButton" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach
                @if ($jurusan->hasPages())
                    <div class="pagination">
                        @php
                            $currentPage = $jurusan->currentPage();
                            $lastPage = $jurusan->lastPage();
                            $startPage = max($currentPage - 2, 1);
                            $endPage = min($currentPage + 1, $lastPage);
                        @endphp

                        @if ($currentPage > 1)
                            <button onclick="window.location.href = '{{ $jurusan->url(1) }}'">
                                <i class='bx bx-first-page'></i>
                            </button>
                            <button onclick="window.location.href = '{{ $jurusan->previousPageUrl() }}'">
                                <i class='bx bx-chevron-left'></i>
                            </button>
                        @endif

                        @for ($i = $startPage; $i <= $endPage; $i++)
                            <button onclick="window.location.href = '{{ $jurusan->url($i) }}'"
                                @if ($i === $currentPage) class="active" @endif>{{ $i }}</button>
                        @endfor

                        @if ($currentPage < $lastPage)
                            <button onclick="window.location.href = '{{ $jurusan->nextPageUrl() }}'">
                                <i class='bx bx-chevron-right'></i>
                            </button>
                            <button onclick="window.location.href = '{{ $jurusan->url($lastPage) }}'">
                                <i class='bx bx-last-page'></i>
                            </button>
                        @endif
                    </div>
                @endif
            </div>
            @include('components.admin.tambahform')
            @include('components.admin.editmodal')
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/jurusan.js') . '?id=' . Str::random(16) }}" defer></script>
@endsection
