<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="e-Presensi siswa di SMK Swasta Jambi Medan" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="PWA">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" type="application/manifest+json" href="{{ asset('__manifest.json') }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- BoxIcons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" media="all" />
    <!-- Style -->
    <link rel="stylesheet" href="{{ mix('assets/dashboard/css/style.css') . '?id=' . Str::random(16) }}" />
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
    <script src="{{ mix('assets/dashboardAdmin/js/main.js') . '?id=' . Str::random(16) }}" defer></script>
    <script src="{{ mix('assets/dashboard/js/main.js') . '?id=' . Str::random(16) }}" defer></script>
    @yield('script')
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    // console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>

</body>

</html>
