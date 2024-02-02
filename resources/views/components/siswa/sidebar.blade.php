    <aside class="sidebar" id="sidebar">
        <div class="button-page">
            <div class="bukaTutupSidebar" id="bukaTutupSidebar">
                <i class="bx bxs-chevron-right-circle panah-sidebar" id="panah-sidebar"></i>
            </div>
            <a href="/siswa/profil/" class="logo"><i class="bx bxs-dashboard"></i>
                <h1 class="sidebar-head">Dashboard</h1>
            </a>
            <ul class="sidebutton">
                <li class="list-link">
                    <a href="/siswa/profil/" class="sidelink {{ ($title === "Profil") ? 'active' : '' }}"><i class="bx bxs-user"></i>Profil Siswa</a>
                </li>
                <li class="list-link">
                    <a href="/siswa/statistik/" class="sidelink {{ ($title === "Statistik") ? 'active' : '' }}"><i
                            class="bx bxs-pie-chart-alt-2"></i>Statistik</a>
                </li>
                <li class="list-link">
                    <a href="/siswa/pindai-qr/" class="sidelink {{ ($title === "Pindai QR") ? 'active' : '' }}"><i class="bx bx-qr"></i>Pindai QR</a>
                </li>
                <li class="list-link">
                    <a href="/siswa/peringkat/" class="sidelink {{ ($title === "Peringkat") ? 'active' : '' }}"><i class="bx bxs-trophy"></i>Peringkat</a>
                </li>
                <li class="list-link" id="dropdownSetting">
                    <a href="#" class="sidelink {{ ($title === "Tampilan") ? 'active' : '' }} {{ ($title === "Keamanan") ? 'active' : '' }}"><i class="bx bxs-cog"></i>Pengaturan</a>
                    <ul class="setting-dropdown">
                        <li class="list-setting-dropdown">
                            <a href="/siswa/tampilan/" class="link-setting-dropdown sidelink {{ ($title === "Tampilan") ? 'active' : '' }}"><i
                                    class="bx bxs-palette"></i>Tampilan</a>
                        </li>
                        <li class="list-setting-dropdown">
                            <a href="/siswa/keamanan/" class="link-setting-dropdown sidelink {{ ($title === "Keamanan") ? 'active' : '' }}"><i
                                    class="bx bx-shield-quarter"></i>Keamanan</a>
                        </li>
                    </ul>
                </li>
                <li class="list-link">
                    <a href="/siswa/tentang/" class="sidelink {{ ($title === "Tentang") ? 'active' : '' }}"><i class="bx bxs-info-circle"></i>Tentang</a>
                </li>
            </ul>
            <a href="/logout" class="exit-link"><i class="bx bxs-exit"></i>Keluar</a>
        </div>
    </aside>
    <label class="bounceButton" for="bounce-button">
        <input type="checkbox" name="" id="bounce-button" />
        <i class="bx bxs-cog"></i>
        <ul class="bounce-menu">
            <li class="bounce-list">
                <a href="/siswa/profil/" class="bounce-link"><i class="bx bxs-user"></i>Profil Siswa</a>
            </li>
            <li class="bounce-list">
                <a href="/siswa/statistik/" class="bounce-link"><i
                        class="bx bxs-pie-chart-alt-2"></i>Statistik</a>
            </li>
            <li class="bounce-list">
                <a href="/siswa/pindai-qr/" class="bounce-link"><i class="bx bx-qr"></i>Pindai QR</a>
            </li>
            <li class="bounce-list">
                <a href="/siswa/peringkat/" class="bounce-link"><i class="bx bxs-trophy"></i>Peringkat</a>
            </li>
            <li class="bounce-list">
                <a href="/siswa/tampilan/" class="bounce-link"><i class="bx bxs-palette"></i>Tampilan</a>
            </li>
            <li class="bounce-list">
                <a href="/siswa/keamanan/" class="bounce-link"><i class="bx bx-shield-quarter"></i>Keamanan</a>
            </li>
            <li class="bounce-list">
                <a href="/siswa/tentang/" class="bounce-link"><i class="bx bxs-info-circle"></i>Tentang</a>
            </li>
        </ul>
    </label>