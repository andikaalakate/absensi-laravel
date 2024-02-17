<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>e-Presensi - GADAK</title>
    <meta name="keywords" content="ePresensi GADAK">
    <meta name="description" content="e-Presensi Siswa di SMK Swasta Jambi Medan" />
    <link rel="manifest" type="application/manifest+json" href="{{ asset('__manifest.json') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Font Awesome if you need it
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
 -->

    <link rel="stylesheet" href="{{ mix('css/app.css') . '?id=' . Str::random(16) }}" />
    <!--Replace with your tailwind.css once created-->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">

</head>

<body class="leading-normal tracking-normal text-gray-900 bg-white" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="h-screen bg-cover min-h-screen bg-no-repeat bg-bottom"
        style="background-image:url('/assets/home/img/background.jpg');">
        <div class="w-full container justify-center flex mx-auto min-h-screen items-center">
            <div class="gap-6 flex flex-col sm:flex-row m-16">
                <button class="btn text-white bg-blue-500 border-none hover:bg-blue-700">
                    <a href="{{ route('login') }}">Login Siswa</a>
                </button>
                <button class="btn text-white bg-blue-500 border-none hover:bg-blue-700">
                    <a href="{{ route('admin.login') }}">Login Admin</a>
                </button>
                <button class="btn text-white bg-blue-500 border-none hover:bg-blue-700">
                    <a href="#">Login Wali Kelas</a>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
