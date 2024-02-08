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
                @foreach ($kelas as $k)
                    <div class="tabel">
                        <table border="1" class="table-data-kelas" id="{{ $loop->iteration }}">
                            <tr>
                                <td>ID Kelas</td>
                                <td>:</td>
                                <td>{{ $k->id_kelas }}</td>
                            </tr>
                            <tr>
                                @php
                                    $angka_kelas = '';

                                    $kelas_romaji_ke_angka = [
                                        'I' => 'Satu',
                                        'II' => 'Dua',
                                        'III' => 'Tiga',
                                        'IV' => 'Empat',
                                        'V' => 'Lima',
                                        'VI' => 'Enam',
                                        'VII' => 'Tujuh',
                                        'VIII' => 'Delapan',
                                        'IX' => 'Sembilan',
                                        'X' => 'Sepuluh',
                                        'XI' => 'Sebelas',
                                        'XII' => 'Dua Belas'
                                    ];

                                    if (array_key_exists($k->nama_kelas, $kelas_romaji_ke_angka)) {
                                        $angka_kelas = $kelas_romaji_ke_angka[$k->nama_kelas];
                                    } else {
                                        $angka_kelas = 'Tidak Diketahui';
                                    }
                                    
                                    // Hitung jumlah siswa dalam kelas
                                    $jumlahSiswa = $siswas->where('siswaData.kelas', $k->nama_kelas)->count();
                                @endphp
                                <td>Nama Kelas</td>
                                <td>:</td>
                                <td>{{ $k->nama_kelas }} <span>{{ $angka_kelas }}</span></td>
                            </tr>
                            <tr>
                                <td>Jumlah Siswa</td>
                                <td>:</td>
                                <td>
                                    {{ $jumlahSiswa }} Orang
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/kelas.js') }}" defer></script>
@endsection
