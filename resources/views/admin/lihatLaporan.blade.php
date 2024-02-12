<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="e-Absensi siswa di SMK Swasta Jambi Medan" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PWA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" type="application/manifest+json" href="{{ asset('__manifest.json') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <title>Admin - Laporan PDF</title>
    <!-- Style -->
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/lihatLaporan.css') . '?id=' . Str::random(16) }}" media="all">
</head>

<body>
    <div class="data-sekolah">
        <div class="img-sekolah sekolah">
            <img src="{{ asset('images/avatar1.webp') }}" alt="Yayasan Pendidikan SMK Swasta Jambi Medan">
        </div>
        <div class="data">
            <p>Yayasan Pendidikan Jambi Medan</p>
            <p>Sekolah Menengah Kejuruan</p>
            <p>SMK Swasta Jambi Medan</p>
            <p>Status Terakreditasi A (amat baik)</p>
            <div class="link-sekolah">
                <a href="http://smkjambimedan.sch.id/web/" target="_blank"> Website : smkjambimedan.sch.id</a>
                <a href="">E-mail : smkjambi<span>@gmail.com</span></a>
            </div>
        </div>
        <div class="img-dinas sekolah">
            <img src="{{ asset('images/avatar1.webp') }}" alt="Yayasan Pendidikan SMK Swasta Jambi Medan">
        </div>
    </div><br>
    <p class="rekapKehadiran"><span>Rekapitulasi Pembelajaran Semester Genap</span> <span>TP. 2023/24</span> </p>
    <h1 class="content-head">Laporan</h1>
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
                <tr>
                    <td>1</td>
                    <td>X MPLB 1</td>
                    <td>Melintika Sinaga S,Pd.</td>
                    <td>37</td>
                    <td>0</td>
                    <td>37</td>
                    <td>100%</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>X MPLB 2</td>
                    <td>Irmayanti Batubara S,Pd.</td>
                    <td>38</td>
                    <td>0</td>
                    <td>38</td>
                    <td>100%</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>X MPLB 3</td>
                    <td>Ernawati Naibaho S,Pd.</td>
                    <td>38</td>
                    <td>0</td>
                    <td>38</td>
                    <td>100%</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>X AKL</td>
                    <td>Kristina Simamarta S,Pd.</td>
                    <td>36</td>
                    <td>0</td>
                    <td>36</td>
                    <td>100%</td>
                    <td></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>XI RPL</td>
                    <td>Yosefina Simamora S,Pd.</td>
                    <td>17</td>
                    <td>0</td>
                    <td>17</td>
                    <td>100%</td>
                    <td></td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>XII AKL</td>
                    <td>Sondang M. Banjarnahor S,Pd.</td>
                    <td>37</td>
                    <td>0</td>
                    <td>37</td>
                    <td>100%</td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <td >Total</td>
                    <td>203</td>
                    <td>0</td>
                    <td>203</td>
                    <td>100%</td>
                    <td>-</td>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <td >Rata-Rata Persentase Kehadiran</td>
                    <th></th>
                    <th></th>
                    <th></th>
                    <td>100%</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="tanggal-laporan">
        <p>Medan, 02 <span>Februari</span> 2024</p>
    </div>
    <div class="tandaTangan">
        <div class="wakaKesiswaan">
            <p>Manci Tiurida Situmorang, S.Pd</p>
        </div>
        <div class="guruBP-BK">
            <p>Fathur Rahman, S.Hi</p>
            <p>Nurhalimah Nasution, S.Pd.i</p>
        </div>
    </div>
</body>

</html>