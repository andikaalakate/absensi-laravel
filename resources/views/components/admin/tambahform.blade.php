@if (Request::is('admin/siswa'))
    <h1 class="content-head">Tambah Siswa</h1>
    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data" class="form-add">
        @csrf
        @method('POST')
        <div class="input-data">
            <label for="nis">NIS</label>
            <input type="text" placeholder="Masukkan NIS" class="nis" required id="nis" name="nis" />
        </div>
        <div class="input-data">
            <label for="nama">Nama</label>
            <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama"
                name="nama_lengkap" />
        </div>
        <div class="input-data">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                @foreach ($kelas as $k)
                    @php
                        $angka_kelas = '';

                        $kelas_romaji_ke_angka = [
                            'X' => '10',
                            'XI' => '11',
                            'XII' => '12',
                        ];

                        if (array_key_exists($k->nama_kelas, $kelas_romaji_ke_angka)) {
                            $angka_kelas = $kelas_romaji_ke_angka[$k->nama_kelas];
                        } else {
                            $angka_kelas = 'Tidak Diketahui';
                        }
                    @endphp

                    <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }} / ({{ $angka_kelas }})</option>
                @endforeach
            </select>
        </div>
        <div class="input-data">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                @foreach ($jurusan as $j)
                    <option value="{{ $j->nama_jurusan }}">{{ $j->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-data">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10" required class="inputAlamat"></textarea>
        </div>
        <div class="input-data">
            <label for="notelp">No. Telepon</label>
            <input type="text" placeholder="Masukkan Nomor Telepon" required id="notelp" name="no_telp" />
        </div>
        <div class="input-data">
            <label for="jenisKelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenisKelamin" required>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="input-data">
            <label for="tanggalLahir">Tanggal Lahir</label>
            <input type="date" required id="tanggalLahir" name="tanggal_lahir" />
        </div>
        <div class="input-data">
            <label for="hobi">Hobi</label>
            <input type="text" placeholder="Masukkan Hobi" required id="hobi" name="hobi" />
        </div>
        <div class="input-data">
            <label for="email">Email</label>
            <input type="email" placeholder="Masukkan Email" required id="email" name="email" />
        </div>
        <div class="input-data">
            <label for="password">Password</label>
            <input type="password" placeholder="Masukkan Password" required id="password" name="password" />
        </div>
        <div class="input-data">
            <label for="conPassword">Konfirmasi Password</label>
            <input type="password" placeholder="Konfirmasi Password" required id="conPassword" />
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
            <input type="file" required style="display: none" id="inputFile" accept="image/*" multiple
                name="image" />
        </div>
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
        <div class="buttonForm">
            <button type="reset" class="reset buttonFormCon">Ulangi</button>
            <button class="buttonFormCon" id="submitButtonTambah" type="submit">Tambah</button>
        </div>
        <!-- Confirmation Changes -->
        {{-- <div id="confirm1">
            <div class="confirmPage">
                <span>Simpan ?</span>
                <div class="button">
                    <p class="buttonConfirmation" id="noButton">Tidak</p>
                    <button class="buttonConfirmation" type="submit">Ya</button>
                </div>
            </div>
        </div> --}}
    </form>
@endif

@if (Request::is('admin/user'))
    <h1 class="content-head">Tambah user</h1>
    <form action="{{ route('user.store') }}" method="post" class="form-add">
        @csrf
        @method('POST')
        <div class="input-data">
            <label for="nama">Nama</label>
            <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama"
                name="nama" />
        </div>
        <div class="input-data">
            <label for="username">Username</label>
            <input type="text" placeholder="Masukkan Username" class="username" required id="username"
                name="username" />
        </div>
        <div class="input-data">
            <label for="notelp">No. Telepon</label>
            <input type="text" placeholder="Masukkan Nomor Telepon" required id="notelp" name="no_telp" />
        </div>
        <div class="input-data">
            <label for="email">Email</label>
            <input type="email" placeholder="Masukkan Email" required id="email" name="email" />
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
            <input type="password" placeholder="Masukkan Password" required id="password" name="password" />
        </div>
        <div class="input-data">
            <label for="conPassword">Konfirmasi Password</label>
            <input type="password" placeholder="Konfirmasi Password" required id="conPassword" name="" />
        </div>
        <div class="buttonForm">
            <button type="reset" class="reset buttonFormCon">Ulangi</button>
            <button class="buttonFormCon" id="submitButtonTambah" type="submit">Tambah</button>
        </div>
        <!-- Confirmation Changes -->
        {{-- <div id="confirm1">
            <div class="confirmPage">
                <span>Simpan ?</span>
                <div class="button">
                    <p class="buttonConfirmation" id="noButton">Tidak</p>
                    <button class="buttonConfirmation" type="submit">Ya</button>
                </div>
            </div>
        </div> --}}
    </form>
@endif

@if (Request::is('admin/jurusan'))
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
            <input type="text" placeholder="Masukkan Alias Jurusan" required id="alias"
                name="alias_jurusan" />
        </div>
        <div class="input-data">
            <label for="namaKajur">Nama Kepala Jurusan</label>
            <input type="text" placeholder="Masukkan Nama Kepala Jurusan" required id="namaKajur"
                name="kepala_jurusan" />
        </div>
        <div class="buttonForm">
            <button type="reset" class="reset buttonFormCon">Ulangi</button>
            <button class="buttonFormCon" id="submitButtonTambah" type="submit">Tambah</button>
        </div>
        <!-- Confirmation Changes -->
        {{-- <div id="confirm1">
          <div class="confirmPage">
              <span>Simpan ?</span>
              <div class="button">
                  <p class="buttonConfirmation" id="noButton">Tidak</p>
                  <button class="buttonConfirmation" type="submit">ya</button>
              </div>
          </div>
      </div> --}}
    </form>
@endif
