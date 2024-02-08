@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminJurusan.css') }}" media="all" />
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Data Jurusan</h1>
            <div class="data-jurusan">
                <label class="searchInput" for="cari">
                    <input type="text" placeholder="Cari Jurusan..." id="cari" />
                    <i class="bx bx-search"></i>
                </label>
                <div class="tabel">
                    <table border="1" class="table-data-jurusan" id="1">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td>Rekayasa Perangkat Lunak</td>
                        </tr>
                        <tr>
                            <td>Kepala Jurusan</td>
                            <td>:</td>
                            <td>Indra Swanto Ritonga S,Kom.</td>
                        </tr>
                        <tr>
                            <td>Interaksi</td>
                            <td>:</td>
                            <td>
                                <button id="editButtonJurusan">Edit</button>
                                <button type="submit">Hapus</button>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tabel">
                    <table border="1" class="table-data-jurusan" id="1">
                        <tr>
                            <td>ID</td>
                            <td>:</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td>Teknik Jaringan Komputer dan Telekomunikasi</td>
                        </tr>
                        <tr>
                            <td>Kepala Jurusan</td>
                            <td>:</td>
                            <td>Jakub Sembiring S,Kom.</td>
                        </tr>
                        <tr>
                            <td>Interaksi</td>
                            <td>:</td>
                            <td>
                                <button id="editButtonJurusan">Edit</button>
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
            <h1 class="content-head">Tambah Jurusan</h1>
            <form action="" method="post" class="form-add">
                <div class="input-data">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" placeholder="Masukkan Jurusan" required id="jurusan" />
                </div>
                <div class="input-data">
                    <label for="namaKajur">Nama Kepala Jurusan</label>
                    <input type="text" placeholder="Masukkan Nama Kepala Jurusan" required id="namaKajur" />
                </div>
                <div class="buttonForm">
                    <button type="reset" class="reset buttonFormCon">Ulangi</button>
                    <a class="confirm buttonFormCon" id="buttonFormCon">Tambah</a>
                </div>
                <!-- Confirmation Changes -->
                <div id="confirm1">
                    <div class="confirmPage">
                        <span>Simpan ?</span>
                        <div class="button">
                            <p class="buttonConfirmation" id="noButton">Tidak</p>
                            <button class="buttonConfirmation" type="submit">ya</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Edit Modal -->
            <div id="editModalJurusan" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeButton">&times;</span>
                    <!-- Form edit -->
                    <h2>Edit Data</h2>
                    <form action="#" method="post" class="form-modal">
                        <div class="modal-input">
                            <label for="namaJurusan">Nama Jurusan</label>
                            <input type="text" id="namaJurusan" name="nis">
                        </div>
                        <div class="modal-input">
                            <label for="namaKajur">Nama Kepala Jurusan</label>
                            <input type="text" id="namaKajur" name="nama">
                        </div>
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/jurusan.js') }}" defer></script>
@endsection

