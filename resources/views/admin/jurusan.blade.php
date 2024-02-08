@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminJurusan.css') . "?id=" . Str::random(16) }}" media="all" />
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
                @foreach ($jurusan as $juru)
                    <div class="tabel">
                    <table border="1" class="table-data-jurusan" id="{{ $loop->iteration }}">
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td>{{ $juru->id_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Alias</td>
                                <td>:</td>
                                <td>{{ $juru->alias_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td>{{ $juru->nama_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Kepala Jurusan</td>
                                <td>:</td>
                                <td>{{ $juru->kepala_jurusan }}</td>
                            </tr>
                            <tr>
                                <td>Interaksi</td>
                                <td>:</td>
                                <td class="aksiButton">
                                    <button id="editButtonJurusan">Edit</button>
                                        <form action="{{ route('jurusan.destroy', $juru->id_jurusan) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button id="hapusButton" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach
                <div class="pagination">
                    @for ($i = 1; $i <= $jurusan->lastPage(); $i++)
                        <button onclick="window.location.href = '{{ $jurusan->url($i) }}'">{{ $i }}</button>
                    @endfor
                </div>
            </div>
            <h1 class="content-head">Tambah Jurusan</h1>
            <form action="{{ route('jurusan.store') }}" method="post" class="form-add">
                @csrf
                @method('POST')
                <div class="input-data">
                    <label for="id">ID Jurusan</label>
                    <input type="text" placeholder="Masukkan ID Jurusan" required id="id" name="id_jurusan" />
                </div>
                <div class="input-data">
                    <label for="jurusan">Nama Jurusan</label>
                    <input type="text" placeholder="Masukkan Nama Jurusan" required id="jurusan" name="nama_jurusan" />
                </div>
                <div class="input-data">
                    <label for="alias">ALIAS Jurusan</label>
                    <input type="text" placeholder="Masukkan Alias Jurusan" required id="alias" name="alias_jurusan" />
                </div>
                <div class="input-data">
                    <label for="namaKajur">Nama Kepala Jurusan</label>
                    <input type="text" placeholder="Masukkan Nama Kepala Jurusan" required id="namaKajur" name="kepala_jurusan" />
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
                            <label for="id">ID Jurusan</label>
                            <input type="text" required id="id" name="id" />
                        </div>
                        <div class="modal-input">
                            <label for="namaJurusan">Nama Jurusan</label>
                            <input type="text" id="namaJurusan" name="nis">
                        </div>
                        <div class="modal-input">
                            <label for="alias">ALIAS Jurusan</label>
                            <input type="text" required id="alias" name="alias_jurusan" />
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
    <script src="{{ mix('assets/dashboardAdmin/js/jurusan.js') . "?id=" . Str::random(16) }}" defer></script>
@endsection

