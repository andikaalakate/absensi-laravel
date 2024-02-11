@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/scan-qr.css') . '?id=' . Str::random(16) }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') . '?id=' . Str::random(16) }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    {{-- <script src="{{ mix('assets/dashboard/js/checkLocation.js') . '?id=' . Str::random(16) }}" defer></script> --}}
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
        <div class="dash-content" id="dashContent">
            <h1 class="content-head text-3xl text-black">
                Scan QR
                <p class="scan-nav" id="scanNav"><i class='bx bx-scan'></i></p>
            </h1>
            <div class="scan-qr mini:mt-8 lg:mt-16" id="scanQrContainer">
                <div id="btn-scan-qr">
                    <div id="qrCodeReader"
                        class="border-2 border-black shadow-md drop-shadow-md shadow-slate-700 bg-white rounded-md lg:w-[50rem] items center justify-center mx-auto text-center bg-center self-center flex w-full image-full"
                        width="800px" style="display: none;">
                    </div>
                    <div class="border-2 border-black shadow-md drop-shadow-md shadow-slate-700 bg-white rounded-md p-5 user-select-none"
                        id="qrcodeContainer">
                        <div id="qrcode" title="QRCode" draggable="false" (dragstart)="false;"></div>
                    </div>
                    <input type="text" id="inputQR" value="{{ route('siswa.absensi.store') }}" readonly disabled
                        hidden />
                    <form action="{{ route('siswa.absensi.store') }}" method="POST" id="form-submit" hidden>
                        @csrf
                        @method('POST')
                        <input type="text" name="nis" value="{{ $siswas->siswaData->nis }}" hidden />
                        <input type="text" name="lokasi_masuk" hidden />
                        <input type="text" name="status" value="Hadir" hidden />
                        <button type="submit" id="btn-submit" class="hidden">Submit</button>
                    </form>
                </div>
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
            {{-- <div id="swapCamera" onclick="swapKamera()"><i class='bx bxs-camera'></i></div> --}}
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js"
        integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" defer>
        var form = document.getElementById("form-submit");
        var nisInput = form.querySelector("input[name='nis']");
        let qrcode = new QRCode(document.getElementById("qrcode"), {
            text: nisInput.value,
            width: window.innerWidth > 1280 ? 800 : 300,
            height: window.innerWidth > 1280 ? 800 : 300,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // Menambahkan logo ke tengah QR code
        let canvas = document.getElementById("qrcode").getElementsByTagName("canvas")[0];
        let ctx = canvas.getContext("2d");
        let logo = new Image();
        logo.src = "{{ asset('images/siswa/' . $siswas->siswaBio->image) }}";
        logo.onload = function() {
            let logoSize = Math.min(canvas.width / 3, canvas.height /
                3); // Menentukan ukuran logo agar tidak terlalu besar
            let x = (canvas.width - logoSize) / 2;
            let y = (canvas.height - logoSize) / 2;

            // Menggambar logo dengan border radius 50% dan ukuran yang diperkecil
            ctx.beginPath();
            ctx.arc(x + logoSize / 2, y + logoSize / 2, logoSize / 2, 0, Math.PI * 2, true);
            ctx.closePath();
            ctx.clip();
            ctx.drawImage(logo, x, y, logoSize, logoSize);
        };
    </script>
    <script src="{{ mix('assets/dashboard/js/qrCodeScanner.js') . '?id=' . Str::random(16) }}" defer></script>
@endsection
