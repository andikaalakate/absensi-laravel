@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/keamanan.css') }}">
    {{-- <script defer>
        document.addEventListener('DOMContentLoaded', function () {
            let formModified = false;
            const formElements = document.querySelectorAll('.input-secure, textarea');
            formElements.forEach(function (element) {
                element.addEventListener('input', function () {
                    formModified = true;
                });
            });
            window.addEventListener('beforeunload', function (event) {
                if (formModified) {
                    const confirmationMessage = 'Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman?';
                    (event || window.event).returnValue = confirmationMessage;
                    return confirmationMessage;
                }
            });
            window.confirmSubmit = function () {
                formModified = false;
            };
        });
    </script> --}}
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head">Keamanan</h1>
            <form action="{{ route('siswa.update', ['nis' => $siswas->siswaData->nis]) }}" class="secure-form" method="PUT" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="ubah-profilePic">
                    <div class="profile-img">
                        <img src="{{ asset($siswas->siswaBio->image) }}" alt="{{ asset('images/avatar1.webp') }}"
                            aria-label="profile-picture" />
                        <p>Ubah Foto Profil</p>
                    </div>
                    <label for="changeProfile" class="tombolUbah">Ubah</label>
                    <input type="file" name="image" id="changeProfile" multiple style="display: none"
                        accept="image/*" />
                </div>
                <div class="nama-profil profile-secure">
                    <label for="nama">Nama :</label>
                    <input type="text" value="{{ $siswas->siswaData->nama_lengkap }}" readonly disabled class="input-secure" id="nama"
                        name="nama_lengkap" />
                </div>
                <div class="jKelamin-profil profile-secure">
                    <label for="jenis-kelamin">Jenis Kelamin :</label>
                    <select class="input-secure" id="jenis-kelamin" name="jenis_kelamin" disabled>
                        <option value="{{ $siswas->siswaData->jenis_kelamin }}">{{ $siswas->siswaData->jenis_kelamin }}</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="jurusan profile-secure">
                    <label for="jurusan">Jurusan :</label>
                    <select class="input-secure" id="jurusan" name="jurusan" disabled>
                        <option value="rpl">{{ $siswas->siswaData->jurusan }}</option>
                        <option value="pm">Pemasaran</option>
                        <option value="akl">Akuntansi dan Keuangan Lembaga</option>
                        <option value="mplb">
                            Manajemen Perkantoran dan Layanan Bisnis
                        </option>
                        <option value="tjkt">
                            Teknik Jaringan Komputer dan Telekomunikasi
                        </option>
                    </select>
                </div>
                <div class="nis-profil profile-secure">
                    <label for="nis">Nis :</label>
                    <input type="text" value="{{ $siswas->siswaData->nis }}" readonly disabled class="input-secure" id="nis" name="nis" />
                </div>
                <div class="no-hp-profil profile-secure">
                    <label for="noHp">Nomor Hp :</label>
                    <input type="text" class="input-secure" id="noHp" name="no_telp" value="{{ $siswas->siswaLogin->no_telp }}" />
                </div>
                <div class="no-hp-profil profile-secure">
                    <label for="eMail">Email :</label>
                    <input type="email" class="input-secure" id="eMail" name="email" value="{{ $siswas->siswaLogin->email }}" />
                </div>
                <div class="password-profil profile-secure">
                    <label for="password">Password :</label>
                    <input type="password" class="input-secure" id="password" name="password" />
                </div>
                <div class="con-password-profil profile-secure">
                    <label for="conPassword">Konfirmasi Password :</label>
                    <input type="password" class="input-secure" id="conPassword" name="confirm-password" />
                </div>
                <div class="alamat-profil profile-secure">
                    <label for="alamat">Alamat :</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10">{{ $siswas->siswaBio->alamat }}</textarea>
                </div>
                <div class="button-confirm">
                    <button class="resetButton" type="reset">Batal</button>
                    <a href="#" class="submitButton" id="submitButton">Simpan</a>
                </div>
                <!-- Confirmation Popup -->
                <div id="overlay"></div>
                <div id="confirmationPopup">
                    <p>Anda yakin ingin menyimpan perubahan?</p>
                    <div class="buttonConfirmation">
                        <p id="cancelButton">Tidak</p>
                        <button id="confirmButton" type="submit">Ya</button>
                    </div>
                </div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </div>
    </div>
@endsection