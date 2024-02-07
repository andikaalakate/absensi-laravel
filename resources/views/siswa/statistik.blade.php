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
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Keterangan</th>
                    </tr>
                    @foreach ($siswaAbsensi['data'] as $siswa)
                        <tr>
                            <!-- nomor -->
                            <td>{{ $loop->iteration }}.</td>
                            {{-- <td>1.</td> --}}
                            <!-- tanggal -->
                            <td>{{ \Carbon\Carbon::parse($siswa['created_at'])->format('Y-m-d') }}</td>
                            <!-- jam masuk -->
                            <td>{{ \Carbon\Carbon::parse($siswa['jam_masuk'])->format('H:i') }}</td>
                            <!-- jam pulang -->
                            <td>{{ \Carbon\Carbon::parse($siswa['jam_pulang'])->format('H:i') }}</td>
                            <!-- keterangan -->
                            <td>
                                {{ $siswa['status'] === 'Hadir' ? 'Hadir' : ($siswa['status'] === 'Sakit' ? 'Sakit' : ($siswa['status'] === 'Izin' ? 'Izin' : ($siswa['status'] === 'Alpha' ? 'Alpha' : '-'))) }}
                            </td>
                        </tr>
                    @endforeach
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

    let hadirCount = {{ $hadirCount }};
    let sakitCount = {{ $sakitCount }};
    let izinCount = {{ $izinCount }};
    let alphaCount = {{ $alphaCount }};

    var data = {
        labels: ["Hadir", "Sakit", "Izin", "Alpha"],
        datasets: [
            {
                data: [hadirCount, sakitCount, izinCount, alphaCount],
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
