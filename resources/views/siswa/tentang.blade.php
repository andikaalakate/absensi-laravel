@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/tentang.css') }}" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
                <h1 class="content-head">Tentang <span><i class='bx bx-info-circle'></i></span></h1>
                <div class="content--tentang">
                    <h1 class="tentang--title">Absensi Digital SMK Swasta Jambi Medan</h1><br>
                    <p>Absensi Digital <span>(e-Absensi)</span> merupakan sebuah teknologi untuk mempermudah proses
                        absensi kepada para Guru, Murid dan kepada para Pegawai yang berada di <a href="http://smkjambimedan.sch.id/web/"
                            class="nama-sekolah"> SMK Swasta Jambi Medan</a> membuat proses kehadiran lebih praktis,
                        efisien dan lebih transparan. Menyediakan akses yang mudah untuk digunakan dengan akurasi yang
                        tepat mendapat keterangan. </p><br>
                    <h1 class="tentang--title">Fitur Utama</h1><br>
                    <ul class="menu-fitur menu">
                        <li class="list-fitur list">
                            <h2>Absensi Siswa Secara Real-Time</h2>
                            <ul>
                                <li>- Sistem Absensi yang memastikan kehadiran siswa tercatat akurat dan tepat.</li>
                            </ul>
                        </li>
                        <li class="list-fitur list">
                            <h2>Pemantauan Kehadiran Pegawai</h2>
                            <ul>
                                <li>- Pengelolaan kehadiran pegawai sekolah dengan mudah dan efisien. </li>
                                <li>- Laporan kehadiran yang dapat diakses oleh pihak berwenang. </li>

                            </ul>
                        </li>
                        <li class="list-fitur list">
                            <h2>Riwayat Absensi</h2>
                            <ul>
                                <li>- Dapat mengakses riwayat absensi kapan saja. </li>
                                <li>- Memudahkan pemantauan dan evaluasi kehadiran kapan saja dan dimana saja. </li>
                            </ul>
                        </li>
                    </ul><br>
                    <h1 class="tentang--title">Cara Penggunaan</h1><br>
                    <ul class="menu-penggunaan menu">
                        <li class="list">
                            <h2>Login ke masing - masing Akun</h2>
                            <ul>
                                <li>- Setiap Murid, Guru dan Pegawai akan diberi masing-masing satu akun oleh Admin /
                                    yang berwenang, sebagai salah satu syarat penggunaan.</li>
                            </ul>
                        </li>
                        <li class="list">
                            <h2>Absensi Harian</h2>
                            <ul>
                                <li>- Siswa akan melakukan absensi ketika saat disekolah dengan melakukan Scan QR dan
                                    juga dengan syarat hanya saat berada dalam radius sekolah baru bisa mengakses Scan
                                    QR</li>
                            </ul>

                        </li>
                        <li class="list">
                            <h2>Laporan dan Statistik</h2>
                            <ul>
                                <li>- Pihak sekolah dapat melihat total kehadiran siswa saat sudah memasuki dashboard
                                    khusus Pihak Sekolah. </li>
                            </ul>
                        </li>
                    </ul><br>
                    <h1 class="tentang--title">Pengembang</h1><br>
                    <div class="menu-pengembang menu">
                        <div class="pengembang1">
                            <div class="img-pengembang">
                                <img src="{{ asset('images/tentang/pengembangAndika.webp') }}" alt="Andika Pratama" aria-label="pengembang">
                            </div>
                            <h2 class="pengembang--name">Andika Pratama</h2>
                        </div>
                        <div class="pengembang2">
                            <div class="img-pengembang">
                                <img src="{{ asset('images/tentang/pengembangGilang.webp') }}" alt="M. Gilang Chandrawinata" aria-label="pengembang">
                            </div>
                            <h2 class="pengembang--name">M. Gilang Chandrawinata</h2>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection