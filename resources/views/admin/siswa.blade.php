@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminSiswa.css') . "?id=" . Str::random(16) }}" media="all" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Siswa</h1>
            <div class="data-siswa">
                <label class="searchInput" for="cari">
                    <input type="text" placeholder="Cari siswa..." id="cari" />
                    <i class="bx bx-search" onclick="search()"></i>
                </label>
                <div class="tabel">
                    <table border="1" class="table-data-siswa" id="1">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>M. Gilang Chandrawinata</td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>XI</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td>Rekayasa Perangkat Lunak</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>+6285762647933</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>Jln. Makmur Dusun VI Kenanga</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>Laki-laki</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>21 Juli 2007</td>
                        </tr>
                        <tr>
                            <td>Interaksi</td>
                            <td>:</td>
                            <td>
                                <button id="editButton">Edit</button>
                                <button type="submit">Hapus</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tabel">
                    <table border="1" class="table-data-siswa" id="2">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>Andika Pratama</td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>456</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>XI</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td>Rekayasa Perangkat Lunak</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>+6289515929090</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>Jln. Utama 1 Desa Kolam</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>Laki-laki</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td>26 Desember 2006</td>
                        </tr>
                        <tr>
                            <td>Interaksi</td>
                            <td>:</td>
                            <td class="aksiButton">
                                <button id="editButton">Edit</button>
                                <button type="submit">Hapus</button>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="pagination">
                    <button>1</button>
                    <button>2</button>
                </div>
            </div>
            <h1 class="content-head">Tambah Siswa</h1>
            <form action="{{ route('siswa.store') }}" method="post" class="form-add">
                <div class="input-data">
                    <label for="nis">NIS</label>
                    <input type="text" placeholder="Masukkan NIS" class="nis" required id="nis" name="nis" />
                </div>
                <div class="input-data">
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama" name="nama_lengkap"/>
                </div>
                <div class="input-data">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="X RPL">X / (10)</option>
                        <option value="xi">XI / (11)</option>
                        <option value="xii">XII / (12)</option>
                    </select>
                </div>
                <div class="input-data">
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan">
                        <option value="akl">Akuntansi Keuangan dan Lembaga</option>
                        <option value="pm">Pemasaran</option>
                        <option value="mplb">
                            Manajemen Perkantoran dan Layanan Bisnis
                        </option>
                        <option value="rpl">Rekayasa Perangkat Lunak</option>
                        <option value="tjkt">
                            Teknik Jaringan Komputer dan Telekomunikasi
                        </option>
                    </select>
                </div>
                <div class="input-data">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" required class="inputAlamat"></textarea>
                </div>
                <div class="input-data">
                    <label for="notelp">No. Telepon</label>
                    <input type="text" placeholder="Masukkan Nomor Telepon" required id="notelp" name="no_telp"/>
                </div>
                <div class="input-data">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenisKelamin" required>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="input-data">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" required id="tanggalLahir" name="tanggal_lahir" />
                </div>
                <div class="input-data">
                    <label for="hobi">Hobi</label>
                    <input type="text" placeholder="Masukkan Hobi" required id="hobi" name="hobi"/>
                </div>
                <div class="input-data">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Masukkan Email" required id="email" name="email"/>
                </div>
                <div class="input-data">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Masukkan Password" required id="password" name="password"/>
                </div>
                <div class="input-data">
                    <label for="conPassword">Konfirmasi Password</label>
                    <input type="password" placeholder="Konfirmasi Password" required id="conPassword" name="" />
                </div>
                <div class="input-data">
                    <label for="inputFile">Foto Diri</label>
                    <label for="inputFile" class="buttonUpload">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 3H12H8C6.34315 3 5 4.34315 5 6V18C5 19.6569 6.34315 21 8 21H11M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V11.8125"
                                    stroke="#fffffff" stroke-width="2"></path>
                                <path d="M17 15V18M17 21V18M17 18H14M17 18H201" stroke="#fffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            ADD FILE
                        </div>
                    </label>
                    <input type="file" required style="display: none" id="inputFile" accept="image/*" name="image" />
                </div>
                <div class="buttonForm">
                    <button type="reset" class="reset buttonFormCon">Ulangi</button>
                    <a class="confirm buttonFormCon" id="buttonFormCon">
                        Tambah
                    </a>
                </div>
                <!-- Confirmation Changes -->
                <div id="confirm">
                    <div class="confirmPage">
                        <span>Simpan ?</span>
                        <div class="button">
                            <p class="buttonConfirmation" id="noButton">Tidak</p>
                            <button class="buttonConfirmation" type="submit">Ya</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeButton">&times;</span>
            <!-- Form edit -->
            <h2>Edit Data</h2>
            <form action="#" method="post" class="form-modal">
                <div class="modal-input">
                    <label for="nama1">Nama:</label>
                    <input type="text" id="nama1" name="nama" class="nama">
                </div>
                <div class="modal-input">
                    <label for="nis1">NIS:</label>
                    <input type="text" id="nis1" name="nis" class="nis">
                </div>
                <div class="modal-input">
                    <label for="alamat1">Alamat:</label>
                    <textarea id="alamat1" name="alamat"></textarea>
                </div>
                <div class="modal-input">
                    <label for="jurusan1">Jurusan:</label>
                    <select id="jurusan1" name="jurusan">
                        <option value="rpl">Rekayasa Perangkat Lunak</option>
                        <option value="akl">Akuntansi Keuangan dan Lembaga</option>
                        <option value="tjkt">Teknik Jaringan Komputer dan Telekomunikasi</option>
                        <option value="pm">Pemasaran</option>
                        <option value="mplb">Manajemen Perkantoran dan Layanan Bisnis</option>
                    </select>
                </div>
                <div class="modal-input">
                    <label for="noTelepon1">Nomor Telepon:</label>
                    <input type="text" id="noTelepon1" name="noTelepon">
                </div>
                <div class="modal-input">
                    <label for="jenisKelamin1">Jenis Kelamin:</label>
                    <select id="jenisKelamin1" name="jenisKelamin">
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="modal-input">
                    <label for="kelas1">Kelas:</label>
                    {{-- <input type="text" id="kelas1" name="kelas"> --}}
                    <select id="kelas1" name="kelas">
                        <option value="x">X / (10)</option>
                        <option value="xi">XI / (11)</option>
                        <option value="xii">XII / (12)</option>
                    </select>
                </div>
                <div class="modal-input">
                    <label for="hobi1">Hobi:</label>
                    <input type="text" id="hobi1" name="hobi">
                </div>
                <div class="modal-input">
                    <label for="tanggalLahir1">Tanggal Lahir:</label>
                    <input type="date" id="tanggalLahir1" name="tanggalLahir">
                </div>
                <div class="modal-input">
                    <label for="password1">Password:</label>
                    <input type="password" id="password1" name="password">
                </div>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
