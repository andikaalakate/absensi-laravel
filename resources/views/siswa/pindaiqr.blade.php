@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/scan-qr.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') . "?id=" . Str::random(16) }}">
    <script src="{{ mix('assets/dashboard/js/checkLocation.js') . "?id=" . Str::random(16) }}" defer></script>
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
            <div id="qrCodeReader" class="border-2 border-black shadow-md drop-shadow-md shadow-slate-700 bg-white rounded-md lg:w-[50rem] items center justify-center mx-auto text-center bg-center self-center flex w-full image-full" width="800px" style="display: none;">
            </div>
            <div class="border-2 border-black shadow-md drop-shadow-md shadow-slate-700 bg-white rounded-md p-5" id="qrcodeContainer">
              <div id="qrcode" title="QRCode"></div>
            </div>
            <input type="text" id="inputQR" value="{{ route('siswa.index') }}/{{ $siswas->siswaData->nis }}" readonly disabled hidden />
          </div>
        </div>
        {{-- <div id="swapCamera" onclick="swapKamera()"><i class='bx bxs-camera'></i></div> --}}
      </div>
    </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js" integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
  <script type="text/javascript">
    let inputQR = document.getElementById("inputQR");
    let qrcode = new QRCode(document.getElementById("qrcode"), {
      text: inputQR.value,
      width: window.innerWidth > 1280 ? 800 : 300,
      height: window.innerWidth > 1280 ? 800 : 300,
      colorDark: "#000000",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H
    });
  </script>
  <script src="{{ mix('assets/dashboard/js/qrCodeScanner.js') . "?id=" . Str::random(16) }}" defer></script>
@endsection