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
                @foreach ($users as $u)
                    <div class="tabel">
                        <table border="1" class="table-data-user" id="{{ $loop->iteration }}">
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td>{{ isset($u->id) ? $u->id : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ isset($u->nama) ? $u->nama : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{ isset($u->username) ? $u->username : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ isset($u->email) ? $u->email : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td>{{ isset($u->role) ? $u->role : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td class="passwordData"><input type="password" value="{{ isset($u->password) ? $u->password : '-' }}" readonly style="border: none;" disabled></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:</td>
                                <td>{{ isset($u->no_telp) ? $u->no_telp : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Interaksi</td>
                                <td>:</td>
                                <td class="aksiButton">
                                    <button id="editButton">Edit</button>
                                    <form action="{{ route('user.destroy', $u->id) }}" method="POST">
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
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <button onclick="window.location.href = '{{ $users->url($i) }}'">{{ $i }}</button>
                    @endfor
                </div>
            </div>
            <h1 class="content-head">Tambah user</h1>
            <form action="{{ route('user.store') }}" method="post" class="form-add">
                @csrf
                @method('POST')
                <div class="input-data">
                    <label for="nama">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama" name="nama"/>
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
                    <label for="role">Role</label>
                    <select name="role" id="role" required>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                        <option value="kepala_sekolah">Kepala Sekolah</option>
                    </select>
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
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @if ($loop->first)
                    <ul>
                        @foreach ($errors->get($loop->index) as $detailError)
                            <li>{{ $detailError }}</li>
                        @endforeach
                    </ul>
                @endif
            @endforeach
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
                    <label for="id1">ID</label>
                    <input type="text" value="210707" class="id" id="id1" name="id" disabled>
                </div>
                <div class="modal-input">
                    <label for="nama1">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama1" name="nama_lengkap"/>
                </div>
                <div class="modal-input">
                    <label for="username1">Username</label>
                    <input type="text" placeholder="Masukkan Username" class="username" required id="username1" name="username" />
                </div>
                <div class="modal-input">
                    <label for="notelp1">No. Telepon</label>
                    <input type="text" placeholder="Masukkan Nomor Telepon" required id="notelp1" name="no_telp"/>
                </div>
                <div class="modal-input">
                    <label for="email1">Email</label>
                    <input type="email" placeholder="Masukkan Email" required id="email1" name="email"/>
                </div>
                <div class="modal-input">
                    <label for="role1">Role</label>
                    <select name="role" id="role1" required>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                        <option value="kepala_sekolah">Kepala Sekolah</option>
                    </select>
                </div>
                <div class="modal-input">
                    <label for="password1">Password</label>
                    <input type="password" placeholder="Masukkan Password" required id="password1" name="password"/>
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
