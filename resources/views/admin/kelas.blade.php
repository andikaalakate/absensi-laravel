@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminKelas.css') }}">
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Kelas</h1>
            <div class="data-kelas">
                <label class="searchInput" for="cari">
                    <input type="text" placeholder="Cari Kelas..." id="cari" />
                    <i class="bx bx-search"></i>
                </label>
                <div class="tabel">
                    <table border="1" class="table-data-kelas" id="1">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>X <span>Sepuluh</span></td>
                        </tr>
                        <tr>
                            <td>Jumlah Siswa</td>
                            <td>:</td>
                            <td>
                                450 Orang
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tabel">
                    <table border="1" class="table-data-kelas" id="2">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>XI <span>Sebelas</span> </td>
                        </tr>
                        <tr>
                            <td>Jumlah Siswa</td>
                            <td>:</td>
                            <td>
                                500 Orang
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tabel">
                    <table border="1" class="table-data-kelas" id="3">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>XII <span>Dua Belas</span></td>
                        </tr>
                        <tr>
                            <td>Jumlah Siswa</td>
                            <td>:</td>
                            <td>
                                400 Orang
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/kelas.js') }}" defer></script>
@endsection
