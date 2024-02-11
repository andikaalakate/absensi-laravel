<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Laporan PDF</title>
    <link rel="stylesheet" href="{{ asset('assets/dashboardAdmin/css/adminLaporan.css') . '?id=' . Str::random(16) }}">
</head>

<body>
    <h1 class="content-head">Laporan</h1>
    <div class="report">
        <div class="table-report">
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Jumlah Hadir</th>
                        <th>Tidak Hadir</th>
                        <th>Jumlah Siswa</th>
                        <th>Persentase</th>
                        <th>PKL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswaAbsensiCounts as $siswaAbsensiCount)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswaAbsensiCount->kelas }} - {{ $siswaAbsensiCount->alias_jurusan }}
                                {{ $siswaAbsensiCount->variabel_kelas }}</td>
                            <td>Belum Ada
                            </td>
                            <td>{{ $siswaAbsensiCount->jumlah_hadir }} / {{ $siswaCount }}</td>
                            <td>0</td>
                            <td>{{ $siswaCount }}</td>
                            <td>
                                Tidak Ada
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
