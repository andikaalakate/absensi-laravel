@if (Request::is('admin/siswa'))
    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeButton">&times;</span>
            <!-- Form edit -->
            <h2>Edit Data</h2>
            <form action="{{ route('siswa.update', ':nis') }}" method="POST" class="form-modal" id="form-update">
                @csrf
                @method('PUT')
                <div class="modal-input">
                    <label for="nama1">Nama:</label>
                    <input type="text" id="nama1" name="nama_lengkap" class="nama">
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
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Akuntansi Keuangan dan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                        <option value="Teknik Jaringan Komputer dan Telekomunikasi">Teknik Jaringan Komputer dan
                            Telekomunikasi</option>
                        <option value="Pemasaran">Pemasaran</option>
                        <option value="Manajemen Perkantoran dan Layanan Bisnis">Manajemen Perkantoran dan Layanan
                            Bisnis</option>
                    </select>
                </div>
                <div class="modal-input">
                    <label for="noTelepon1">Nomor Telepon:</label>
                    <input type="text" id="noTelepon1" name="no_telp">
                </div>
                <div class="modal-input">
                    <label for="jenisKelamin1">Jenis Kelamin:</label>
                    <select id="jenisKelamin1" name="jenis_kelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="modal-input">
                    <label for="kelas1">Kelas:</label>
                    {{-- <input type="text" id="kelas1" name="kelas"> --}}
                    <select id="kelas1" name="kelas">
                        <option value="X">X / (10)</option>
                        <option value="XI">XI / (11)</option>
                        <option value="XII">XII / (12)</option>
                    </select>
                </div>
                {{-- <div class="modal-input">
                    <label for="hobi1">Hobi:</label>
                    <input type="text" id="hobi1" name="hobi">
                </div> --}}
                <div class="modal-input">
                    <label for="tanggalLahir1">Tanggal Lahir:</label>
                    <input type="date" id="tanggalLahir1" name="tanggal_lahir">
                </div>
                <div class="modal-input">
                    <label for="password1">Password:</label>
                    <input type="password" id="password1" name="password">
                </div>
                <button type="submit" id="confirmButton">Simpan</button>
            </form>
        </div>
    </div>
@elseif (Request::is('admin/jurusan'))
    <!-- Edit Modal -->
    <div id="editModalJurusan" class="modal">
        <div class="modal-content">
            <span class="close" id="closeButton">&times;</span>
            <!-- Form edit -->
            <h2>Edit Data</h2>
            <form action="{{ route('jurusan.update', ':id') }}" method="POST" class="form-modal" id="form-update-jurusan">
                @csrf
                @method('PUT')
                <div class="modal-input">
                    <label for="id">ID Jurusan</label>
                    <input type="text" required id="id_jurusan1" name="id_jurusan" />
                </div>
                <div class="modal-input">
                    <label for="namaJurusan">Nama Jurusan</label>
                    <input type="text" id="nama_jurusan1" name="nama_jurusan">
                </div>
                <div class="modal-input">
                    <label for="alias">ALIAS Jurusan</label>
                    <input type="text" required id="alias_jurusan1" name="alias_jurusan" />
                </div>
                <div class="modal-input">
                    <label for="namaKajur">Nama Kepala Jurusan</label>
                    <input type="text" id="kepala_jurusan1" name="kepala_jurusan">
                </div>
                <button type="submit" id="confirmButton">Simpan</button>
            </form>
        </div>
    </div>
@elseif (Request::is('admin/user'))
    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeButton">&times;</span>
            <!-- Form edit -->
            <h2>Edit Data</h2>
            <form action="{{ route('user.update', ':id') }}" method="POST" class="form-modal" id="form-update-user">
                @csrf
                @method('PUT')
                <div class="modal-input">
                    <label for="id1">ID</label>
                    <input type="text" class="id" id="id1" name="id" disabled>
                </div>
                <div class="modal-input">
                    <label for="nama1">Nama</label>
                    <input type="text" placeholder="Masukkan Nama" class="nama" required id="nama1"
                        name="nama" />
                </div>
                <div class="modal-input">
                    <label for="username1">Username</label>
                    <input type="text" placeholder="Masukkan Username" class="username" required id="username1"
                        name="username" />
                </div>
                <div class="modal-input">
                    <label for="email1">Email</label>
                    <input type="email" placeholder="Masukkan Email" required id="email1" name="email" />
                </div>
                <div class="modal-input">
                    <label for="notelp1">No. Telepon</label>
                    <input type="text" placeholder="Masukkan Nomor Telepon" required id="notelp1"
                        name="no_telp" />
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
                    <input type="password" placeholder="Masukkan Password" required id="password1"
                        name="password" />
                </div>
                <button type="submit" id="confirmButton">Simpan</button>
            </form>
        </div>
    </div>
@endif
