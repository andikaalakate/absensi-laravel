@extends('layouts.admin')

@section('head')
    <title>Admin - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboardAdmin/css/adminUser.css') . '?id=' . Str::random(16) }}">
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
                                <td>Nomor Telepon</td>
                                <td>:</td>
                                <td>{{ isset($u->no_telp) ? $u->no_telp : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td>{{ isset($u->role) ? $u->role : '-' }}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td class="passwordData">
                                    <input type="password" class="passwordInput"
                                    value="{{ isset($u->password) ? $u->password : '-' }}" readonly
                                    style="border: none;" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Interaksi</td>
                                <td>:</td>
                                <td class="aksiButton" >
                                    <button id="editButton"
                                    data-id="{{ $u->id }}" 
                                    data-nama="{{ $u->nama }}" 
                                    data-username="{{ $u->username }}"
                                    data-email="{{ $u->email }}"
                                    data-notelp="{{ $u->no_telp }}"
                                    data-role="{{ $u->role }}"
                                    data-password="{{ $u->password }}"
                                    >Edit</button>
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
            @include('components.admin.tambahform')
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

    @include('components.admin.editmodal')
@endsection

@section('script')
    <script src="{{ mix('assets/dashboardAdmin/js/user.js') . '?id=' . Str::random(16) }}" defer></script>
@endsection
