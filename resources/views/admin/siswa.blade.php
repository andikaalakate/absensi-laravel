@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminSiswa.css') . '?id=' . Str::random(16) }}"
        media="all" />
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
                @foreach ($siswas as $siswa)
                    <div class="tabel">
                        <table border="1" class="table-data-siswa" id="{{ $loop->iteration }}">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="nama">
                                    {{ isset($siswa->siswaData->nama_lengkap) ? $siswa->siswaData->nama_lengkap : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td class="nis" id="nis"
                                    data-nis="{{ isset($siswa->siswaData->nis) ? $siswa->siswaData->nis : '-' }}">
                                    {{ isset($siswa->siswaData->nis) ? $siswa->siswaData->nis : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td class="kelas">
                                    {{ isset($siswa->siswaData->kelas) ? $siswa->siswaData->kelas : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td class="jurusan">
                                    {{ isset($siswa->siswaData->jurusan) ? $siswa->siswaData->jurusan : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:</td>
                                <td class="noTelepon">
                                    {{ isset($siswa->siswaData->siswaLogin->no_telp) ? $siswa->siswaData->siswaLogin->no_telp : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td class="alamat">
                                    {{ isset($siswa->siswaData->siswaBio->alamat) ? $siswa->siswaData->siswaBio->alamat : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td class="jenisKelamin">
                                    {{ isset($siswa->siswaData->jenis_kelamin) ? $siswa->siswaData->jenis_kelamin : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td class="tanggalLahir">
                                    {{ isset($siswa->siswaData->tanggal_lahir) ? \Carbon\Carbon::parse($siswa->siswaData->tanggal_lahir)->format('d F Y') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <td>QRCode</td>
                                <td>:</td>
                                <td>
                                    <div class="qrlihat">
                                        <button class="lihatQRCode" data-nis="{{ $siswa->siswaData->nis }}">Lihat
                                            QRCode</button>
                                        <div class="qrcode-container" id="qrcode_{{ $loop->iteration }}"
                                            style="display: none;">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Interaksi</td>
                                <td>:</td>
                                <td class="aksiButton">
                                    <button id="editButton" data-nama={{ isset($siswa->siswaData->nama_lengkap) ? $siswa->siswaData->nama_lengkap : '-' }} data-kelas="{{ isset($siswa->siswaData->kelas) ? $siswa->siswaData->kelas : '-' }}" data-jurusan="{{ isset($siswa->siswaData->jurusan) ? $siswa->siswaData->jurusan : '-' }}" data-no_telp="{{ isset($siswa->siswaData->siswaLogin->no_telp) ? $siswa->siswaData->siswaLogin->no_telp : '-' }}" data-alamat="{{ isset($siswa->siswaData->siswaBio->alamat) ? $siswa->siswaData->siswaBio->alamat : '-' }}" data-jk="{{ isset($siswa->siswaData->jenis_kelamin) ? $siswa->siswaData->jenis_kelamin : '-' }}" data-tglahir="{{ isset($siswa->siswaData->tanggal_lahir) ? \Carbon\Carbon::parse($siswa->siswaData->tanggal_lahir)->format('Y-m-d') : '-' }}" data-nis="{{ $siswa->siswaData->nis }}">Edit</button>
                                    <form action="{{ route('siswa.destroy', $siswa->siswaData->nis) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endforeach

                <div class="pagination">
                    @for ($i = 1; $i <= $siswas->lastPage(); $i++)
                        <button onclick="window.location.href = '{{ $siswas->url($i) }}'">{{ $i }}</button>
                    @endfor
                </div>
            </div>
            @include('components.admin.tambahform')
        </div>
    </div>
    @include('components.admin.editmodal')
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"
        integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" defer>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.lihatQRCode').forEach((button, index) => {
                button.addEventListener('click', function() {
                    let nis = this.dataset.nis;
                    let qrcodeContainer = document.getElementById(`qrcode_${index + 1}`);
                    if (qrcodeContainer) {
                        if (qrcodeContainer.style.display === 'none') {
                            let qrcode = new QRCode(qrcodeContainer, {
                                text: nis,
                                width: 128,
                                height: 128,
                                colorDark: "#000000",
                                colorLight: "#ffffff",
                                correctLevel: QRCode.CorrectLevel.H
                            });
                            qrcodeContainer.style.display = 'block';
                            button.innerText =
                                'Tutup QRCode';
                        } else {
                            qrcodeContainer.style.display = 'none';
                            button.innerText =
                                'Lihat QRCode';
                            qrcodeContainer.innerHTML = '';
                        }
                    }
                });
            });
        });
    </script>
    <script src="{{ mix('assets/dashboardAdmin/js/editSiswa.js') . '?id=' . Str::random(16) }}" defer></script>
@endsection
