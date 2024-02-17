<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PWA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" type="application/manifest+json" href="{{ asset('__manifest.json') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>e-Presensi - Offline</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .lostConnection {
            font-size: 20px;
            max-width: 1000px;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 0 3px;
            color: white;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            background: linear-gradient(35deg, rgb(90, 181, 241), rgb(0, 100, 167));
        }

        .repeat {
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            width: 150px;
            background-color: rgb(90, 180, 241);
            margin: 10px auto;
            border-radius: 10px;
            color: white;
            transition: .4s;
        }

        .repeat:hover {
            background-color: rgb(0, 100, 167);
        }

        @media screen and (max-width:768px) {
            .lostConnection {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="lostConnection">
        <h1>Hilang Koneksi...</h1>
        <p class="detail-lostConnection">
            Silahkan periksa jaringan anda dan ulangi sekali lagi!
        </p>
        <a href="." class="repeat">Ulangi</a>
    </div>
</body>

</html>
