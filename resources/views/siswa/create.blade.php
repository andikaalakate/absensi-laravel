@extends('layouts.siswa')

@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="dash" id="dashBoard">
    <div class="dash-content" id="dashContent">
        <h1 class="text-2xl font-bold mb-4">Create Siswa</h1>
        <div class="container mx-auto mt-8 text-white">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-4">
                    <label for="nis" class="block mb-2">NIS:</label>
                    <input type="text" id="nis" name="nis" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="nama_lengkap" class="block mb-2">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block mb-2">Jenis Kelamin:</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jurusan" class="block mb-2">Jurusan:</label>
                    <select id="jurusan" name="jurusan" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="kelas" class="block mb-2">Kelas:</label>
                    <select id="kelas" name="kelas" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block mb-2">Tanggal Lahir:</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block mb-2">Alamat:</label>
                    <textarea id="alamat" name="alamat" class="border border-gray-300 rounded px-4 py-2 w-full" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="biografi" class="block mb-2">Biografi:</label>
                    <textarea id="biografi" name="biografi" class="border border-gray-300 rounded px-4 py-2 w-full" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="hobi" class="block mb-2">Hobi:</label>
                    <input type="text" id="hobi" name="hobi" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block mb-2">Image URL:</label>
                    <input type="text" id="image" name="image" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="no_telp" class="block mb-2">Nomor Telepon:</label>
                    <input type="text" id="no_telp" name="no_telp" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2">Password:</label>
                    <input type="password" id="password" name="password" class="border border-gray-300 rounded px-4 py-2 w-full" required>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
