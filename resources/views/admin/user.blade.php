@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminUser.css') . "?id=" . Str::random(16) }}">
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data User</h1>
            <div class="data-user">
                <label class="searchInput" for="cari">
                    <input type="text" placeholder="Cari User..." id="cari" />
                    <i class="bx bx-search" onclick="search()"></i>
                </label>
                <div class="tabel">
                    <table border="1" class="table-data-user" id="1">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>210707</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>Andika</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>gilangchan</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>gilangchan2107@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td class="passwordData">alanipogos</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>+6285762647933</td>
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
                    <table border="1" class="table-data-user" id="1">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>210707</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>M. Gilang Chandrawinata</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>gilangchan</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>gilangchan2107@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td class="passwordData">alanipogos</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td>+6285762647933</td>
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
                <div class="pagination">
                    <button>1</button>
                    <button>2</button>
                </div>
            </div>
            <h1 class="content-head">Tambah user</h1>
            <form action="{{ route('siswa.store') }}" method="post" class="form-add">
                <div class="input-data">
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama" name="nama_lengkap"/>
                </div>
                <div class="input-data">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Masukkan Username" class="username" required id="username" name="username" />
                </div>
                <div class="input-data">
                    <label for="notelp">No. Telepon</label>
                    <input type="text" placeholder="Masukkan Nomor Telepon" required id="notelp" name="no_telp"/>
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
                    <label for="id">ID</label>
                    <input type="text" value="210707" class="id" id="id" name="id" disabled>
                </div>
                <div class="modal-input">
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama" name="nama_lengkap"/>
                </div>
                <div class="modal-input">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Masukkan Username" class="username" required id="username" name="username" />
                </div>
                <div class="modal-input">
                    <label for="notelp">No. Telepon</label>
                    <input type="text" placeholder="Masukkan Nomor Telepon" required id="notelp" name="no_telp"/>
                </div>
                <div class="modal-input">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Masukkan Email" required id="email" name="email"/>
                </div>
                <div class="modal-input">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Masukkan Password" required id="password" name="password"/>
                </div>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/user.js') . "?id=" . Str::random(16) }}" defer></script>
@endsection
