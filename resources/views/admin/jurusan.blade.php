@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminJurusan.css') . "?id=" . Str::random(16) }}" media="all" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Jurusan</h1>
            <div class="data-jurusan">
                <label class="searchInput" for="cari">
                    <input type="text" placeholder="Cari Jurusan..." id="cari" />
                    <i class="bx bx-search"></i>
                </label>
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
                                    <button 
                                    id="editButtonJurusan" 
                                    data-id_jurusan="{{ $juru->id_jurusan }}" 
                                    data-nama_jurusan="{{ $juru->nama_jurusan }}"
                                    data-alias_jurusan="{{ $juru->alias_jurusan }}"
                                    data-kepala_jurusan="{{ $juru->kepala_jurusan }}"
                                    >
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
                <div class="pagination">
                    @for ($i = 1; $i <= $jurusan->lastPage(); $i++)
                        <button onclick="window.location.href = '{{ $jurusan->url($i) }}'">{{ $i }}</button>
                    @endfor
                </div>
            </div>
            @include('components.admin.tambahform')
            @include('components.admin.editmodal')
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/jurusan.js') . "?id=" . Str::random(16) }}" defer></script>
@endsection

