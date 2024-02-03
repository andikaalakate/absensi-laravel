@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/statistik.css') }}">
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Statistik</h1>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
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
        type: "bar",
        data: data,
        options: options,
    });
</script>
@endsection