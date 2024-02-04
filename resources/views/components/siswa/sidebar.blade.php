@if(auth('siswa')->check())
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
        <a href="/siswa/profil/" class="sidelink {{ Request::is('siswa/profil') ? 'active' : '' }}"><i
            class="bx bxs-user"></i>Profil Siswa</a>
      </li>
      <li class="list-link">
        <a href="/siswa/statistik/" class="sidelink {{ Request::is('siswa/statistik') ? 'active' : '' }}"><i
            class="bx bxs-pie-chart-alt-2"></i>Statistik</a>
      </li>
      <li class="list-link">
        <a href="/siswa/pindai-qr/" class="sidelink {{ Request::is('siswa/pindai-qr') ? 'active' : '' }}"><i
            class="bx bx-qr"></i>Pindai QR</a>
      </li>
      <li class="list-link">
        <a href="/siswa/peringkat/" class="sidelink {{ Request::is('siswa/peringkat') ? 'active' : '' }}"><i
            class="bx bxs-trophy"></i>Peringkat</a>
      </li>
      <li class="list-link" id="dropdownSetting">
        <a href="#" class="sidelink {{ Request::is('siswa/tampilan') ? 'active' : '' }} {{ Request::is('siswa/keamanan')  ? 'active'
          : '' }}"><i class="bx bxs-cog"></i>Pengaturan</a>
        <ul class="setting-dropdown">
          <li class="list-setting-dropdown">
            <a href="/siswa/tampilan/" class="link-setting-dropdown sidelink {{ Request::is('siswa/tampilan') ? 'active' : ''
              }}"><i class="bx bxs-palette"></i>Tampilan</a>
          </li>
          <li class="list-setting-dropdown">
            <a href="/siswa/keamanan/" class="link-setting-dropdown sidelink {{ Request::is('siswa/keamanan') ? 'active' : ''
              }}"><i class="bx bx-shield-quarter"></i>Keamanan</a>
          </li>
        </ul>
      </li>
      <li class="list-link">
        <a href="/siswa/tentang/" class="sidelink {{ Request::is('siswa/tentang') ? 'active' : '' }}"><i
            class="bx bxs-info-circle"></i>Tentang</a>
      </li>
    </ul>
    <form action="/logout">
      @csrf
      <button type="submit" class="sidelink btnExit"><i class="bx bxs-exit"></i>Keluar</button>
    </form>
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
      <a href="/siswa/statistik/" class="bounce-link"><i class="bx bxs-pie-chart-alt-2"></i>Statistik</a>
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
    <li class="bounce-list">
      <form action="/logout" class="bounce-link">
        @csrf
        <button type="submit" class="bounce-link"><i class="bx bxs-exit"></i>Keluar</button>
      </form>
    </li>
  </ul>
</label>
@endif