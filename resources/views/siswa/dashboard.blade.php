<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Style -->
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/style.css') }}" />
    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <!-- Script -->
    <script src="{{ mix('assets/dashboard/js/main.js') }}" defer></script>
</head>
<body id="dashboard">
    <div class="container" id="container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="button-page">
                <div class="bukaTutupSidebar" id="bukaTutupSidebar">
                    <i class='bx bxs-chevron-right-circle panah-sidebar' id="panah-sidebar" ></i>
                </div>
                <a href="#" class="logo"><i class='bx bxs-dashboard'></i><h1 class="sidebar-head">Dashboard</h1></a>
                <ul class="sidebutton">
                    <li class="list-link"><a href="#" class="sidelink"><i class='bx bxs-user'></i>Profil Siswa</a></li>
                    <li class="list-link"><a href="#" class="sidelink"><i class='bx bxs-pie-chart-alt-2'></i>Statistik</a></li>
                    <li class="list-link"><a href="#" class="sidelink"><i class='bx bx-qr'></i>Pindai QR</a></li>
                    <li class="list-link"><a href="#" class="sidelink"><i class='bx bxs-trophy' ></i>Peringkat</a></li>
                    <li class="list-link"><a href="#" class="sidelink"><i class='bx bxs-info-circle'></i>Tentang</a></li>
                    <li class="list-link" id="dropdownSetting" onclick="dropdownSetting()">
                        <a href="#" class="sidelink"><i class='bx bxs-cog'></i>Pengaturan</a>
                        <ul class="setting-dropdown">
                            <li class="list-setting-dropdown">
                                <a href="" class="link-setting-dropdown sidelink"><i class='bx bxs-palette'></i>Tampilan</a>
                            </li>
                            <li class="list-setting-dropdown">
                                <a href="" class="link-setting-dropdown sidelink"><i class='bx bx-shield-quarter'></i>Keamanan</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href="#" class="exit-link"><i class='bx bxs-exit'></i>Keluar</a></div>
        </aside>
        <label class="bounceButton" for="bounce-button">
            <input type="checkbox" name="" id="bounce-button"/>
            <i class='bx bxs-cog'></i>
            <ul class="bounce-menu">
                <li class="bounce-list"><a href="" class="bounce-link"><i class='bx bxs-user'></i>Profil Siswa</a></li>
                <li class="bounce-list"><a href="" class="bounce-link"><i class='bx bxs-pie-chart-alt-2'></i>Statistik</a></li>
                <li class="bounce-list"><a href="" class="bounce-link"><i class='bx bx-qr'></i>Pindai QR</a></li>
                <li class="bounce-list"><a href="" class="bounce-link"><i class='bx bxs-trophy'></i>Peringkat</a></li>
                <li class="bounce-list"><a href="" class="bounce-link"><i class='bx bxs-palette'></i>Tampilan</a></li>
                <li class="bounce-list"><a href="" class="bounce-link"><i class='bx bx-shield-quarter'></i>Keamanan</a></li>
                <li class="bounce-list"><a href="" class="bounce-link"><i class='bx bxs-info-circle'></i>Tentang</a></li>
            </ul>
        </label>
        <!-- Dashboard -->
        <div class="dash" id="dashBoard">
            <div class="dash-content" id="dashContent">
                <div class="profil-card">
                    <div class="img-profil">
                        <img src="{{ asset('images/avatar1.png') }}" alt="Avatar 1">
                    </div>
                    <div class="data-profil"></div>
                    <div class="waktu-profil">
                        <div class="waktu-masuk"></div>
                        <div class="waktu-pulang"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</body>
</html>
