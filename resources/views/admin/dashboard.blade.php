@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminDashboard.css') . "?id=" . Str::random(16) }}" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Dashboard</h1>
            <div class="status-jumlah">
                <div class="jJurusan">
                    <h2>Jumlah Jurusan</h2>
                    <p>5</p>
                </div>
                <div class="jSiswa">
                    <h2>Jumlah Siswa</h2>
                    <p>1.000</p>
                </div>
                <div class="jKelas">
                    <h2>Jumlah Kelas</h2>
                    <p>25</p>
                </div>
                <div class="jUser">
                    <h2>Jumlah User</h2>
                    <p>6</p>
                </div>
                <div class="siswaHadir">
                    <h2>Siswa yang hadir hari ini</h2>
                    <p>6</p>
                </div>
            </div>
        </div>
    </div>
@endsection
