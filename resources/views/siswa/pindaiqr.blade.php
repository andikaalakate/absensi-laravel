@extends('layouts.siswa')

@section('head')
    <title>Siswa - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/scan-qr.css') }}">
    <script src="https://cdn.rawgit.com/cozmo/jsQR/master/dist/jsQR.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection

@section('content')
    <!-- Dashboard -->
    <div class="dash" id="dashBoard">
      <div class="dash-content" id="dashContent">
        <h1 class="content-head">
          Scan QR
          <p class="scan-nav" id="scanNav" onclick="scan()"><i class='bx bx-scan'></i></p>
        </h1>
        <div class="scan-qr">
          <div id="btn-scan-qr">
            <video id="previewKamera"></video>
            <img src="{{ asset('images/qrcode_93682767_5d1c86d03ada3290f75c255ad21b5475.png') }}" alt="qrLink M. Gilang Chandrawinata">
          </div>
        </div>
        <div id="swapCamera" onclick="swapKamera()"><i class='bx bxs-camera'></i></div>
      </div>
    </div>
@endsection

@section('script')
  <script src="{{ mix('assets/dashboard/js/qrCodeScanner.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/grid.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/version.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/detector.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/formatinf.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/errorlevel.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/bitmat.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/datablock.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/bmparser.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/datamask.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/rsdecoder.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/gf256poly.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/gf256.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/decoder.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qrcode.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/findpat.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/alignpat.js"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/databr.js"></script>
@endsection