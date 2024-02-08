<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="e-Absensi siswa di SMK Swasta Jambi Medan" />
    <link rel="manifest" type="application/manifest+json" href="{{ asset('__manifest.json') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="{{ mix('assets/dashboard/js/main.js') . "?id=" . Str::random(16) }}" defer></script>
    <!-- BoxIcons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" media="all" />
    <!-- Style -->
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/style.css') . "?id=" . Str::random(16) }}" />
    @yield('head')
</head>

<body>
    <div class="container" id="container">
        @include('components.sidebar')
        @yield('content')
    </div>
    @include('components.preload')
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')
</body>

</html>