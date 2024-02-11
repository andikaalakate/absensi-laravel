@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/statistik.css') . '?id=' . Str::random(16) }}">
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Statistik</h1>
            <div class="chart-card">
                <div class="chart">
                    <canvas id="myDoughnutChart" width="400" height="400"></canvas>
                </div>
            </div>
            @php
                if (isset($siswaAbsensi['data'][0]['lokasi_masuk'])) {
                    $lokasiMasuk = json_decode($siswaAbsensi['data'][0]['lokasi_masuk'], true);
                    $latitude = $lokasiMasuk['latitude'];
                    $longitude = $lokasiMasuk['longitude'];
                } else {
                    $latitude = 0;
                    $longitude = 0;
                }
            @endphp

            <div class="current-location">
                <h1><i class='bx bx-current-location'></i>Lokasi Absensi Terbaru</h1>
                <div class="maps" id="location">
                    <iframe width="100%" height="100%" frameborder="0" style="border:0"
                        src="https://www.google.com/maps?q={{ $latitude }},{{ $longitude }}&output=embed"
                        allowfullscreen></iframe>
                </div>
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
                    @if ($siswaData === null)
                        <tr>
                            <td colspan="5">Tidak ada data</td>
                        </tr>
                    @else
                        @php
                            $i = $siswaData['from'] ?? 1;
                        @endphp
                        @foreach ($siswaData['data'] as $index => $siswa)
                            <tr>
                                <td>{{ $i + $index }}.</td>
                                {{-- <td>1.</td> --}}
                                <!-- tanggal -->
                                <td>{{ \Carbon\Carbon::parse($siswa['created_at'])->format('d F Y') }}</td>
                                <!-- jam masuk -->
                                <td>{{ \Carbon\Carbon::parse($siswa['jam_masuk'])->format('H:i') }}</td>
                                <!-- jam pulang -->
                                <td>
                                    {{ $siswa['jam_pulang'] === null ? 'Belum Pulang' : \Carbon\Carbon::parse($siswa['jam_pulang'])->format('H:i') }}
                                </td>
                                <!-- keterangan -->
                                <td>
                                    {{ $siswa['status'] === 'Hadir' ? 'Hadir' : ($siswa['status'] === 'Sakit' ? 'Sakit' : ($siswa['status'] === 'Izin' ? 'Izin' : ($siswa['status'] === 'Alpha' ? 'Alpha' : '-'))) }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
            @if (!empty($siswaAbsensi['links']))
                <div class="page-navigation">
                    @foreach ($siswaAbsensi['links'] as $item)
                        @if ($item['label'] == 'Previous' || $item['label'] == 'Next')
                            @if (isset($item['url2']))
                                <button
                                    onclick="window.location.href = '{{ $item['url2'] }}'">{{ $item['label'] }}</button>
                            @else
                                <button>{{ $item['label'] }}</button>
                            @endif
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script defer>
        var ctx = document.getElementById("myDoughnutChart").getContext("2d");

        let hadirCount = {{ $hadirCount }};
        let sakitCount = {{ $sakitCount }};
        let izinCount = {{ $izinCount }};
        let alphaCount = {{ $alphaCount }};

        var data = {
            labels: ["Hadir", "Sakit", "Izin", "Alpha"],
            datasets: [{
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
            }, ],
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
