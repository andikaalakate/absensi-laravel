@extends('layouts.siswa')

@section('head')
<title>Siswa - {{ $title }}</title>
<link rel="stylesheet" href="{{ mix('assets/dashboard/css/profilSiswa.css') }}" />
@endsection

@section('content')
<!-- Dashboard -->
<div class="dash" id="dashBoard">
    <div class="dash-content" id="dashContent">
        <div class="profil-card">
            <div class="img-profil">
                <img src="{{ asset($siswass->siswaBio->image) }}" alt="Avatar 1" />
            </div>
            <div class="data-profil">
                <h1 class="nama-profil">{{ auth()->user()->nama }}</h1>
                <table border="1" class="tabel-profile">
                    <tr>
                        <th>Kelas</th>
                        <th>:</th>
                        <th>{{ $siswas->siswaData->kelas }}</th>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <th>:</th>
                        <th>{{ $siswas->siswaData->jurusan }}</th>
                    </tr>
                </table>
            </div>
            <div class="waktu-profil">
                <div class="waktu-masuk">Masuk - 07.15</div>
                <div class="waktu-pulang">Pulang - 14.00</div>
            </div>
        </div>
        <div class="chart">
            <canvas id="myDoughnutChart" width="400" height="400"></canvas>
        </div>
        <div class="detail-data">
            <table class="tabel-data">
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Absen</th>
                </tr>
                <tr>
                    <td>1</td>
                    <!-- nomor -->
                    <td>01/01/2023</td>
                    <!-- tanggal-->
                    <td>Hadir</td>
                    <!-- hadir -->
                    <td>-</td>
                    <!-- sakit -->
                    <td>-</td>
                    <!-- izin -->
                    <td>-</td>
                    <!-- absen -->
                </tr>
            </table>
        </div>
        <div class="page-navigation">
            <button id="prevBtn">&laquo; Previous Page</button>
            <button id="nextBtn">Next Page &raquo;</button>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script defer>
    var ctx = document.getElementById("myDoughnutChart").getContext("2d");

    var data = {
        labels: ["Hadir", "Sakit", "Izin", "Absen"],
        datasets: [
            {
                data: [100, 5, 0, 1], //100 = Hadir, 5 = Sakit, 0 = Izin, 1 = Absen
                backgroundColor: [
                    "rgba(75, 192, 192, 0.7)",
                    "rgba(255, 99, 132, 0.7)",
                    "rgba(255, 206, 86, 0.7)",
                    "rgba(54, 162, 235, 0.7)",
                ],
                hoverBackgroundColor: [
                    "rgba(75, 192, 192, 1)",
                    "rgba(255, 99, 132, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(54, 162, 235, 1)",
                ],
                borderWidth: 1,
            },
        ],
    };

    var options = {
        cutout: 70,
        responsive: true,
        maintainAspectRatio: false,
    };

    var myDoughnutChart = new Chart(ctx, {
        type: "doughnut",
        data: data,
        options: options,
    });
</script>
@endsection