@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminLaporan.css') . '?id=' . Str::random(16) }}">
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Laporan</h1>
            <div class="report">
                <div class="filter-tanggal">
                    <input type="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" name="tanggal"
                        id="tanggalLaporan">
                </div>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
