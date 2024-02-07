<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ mix('assets/login/css/style.css') . "?id=" . Str::random(16) }}" media="all">

    <!-- boxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' media="all">

    <!-- Toast Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" media="all">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</head>

<body>
    <div class="login-container">
        <form action="{{ Request::is('admin/login') ? '/admin/proseslogin' : '/proseslogin' }}" method="POST" class="form-login" autocomplete="off">
            @csrf
            <h1 class="login-head">
                Login Absensi
            </h1>
            <div class="login-input">
                <div class="nis-input input">
                    <label for="{{ Request::is('admin/login') ? 'username' : 'nis' }}">{{ Request::is('admin/login') ? 'Username' : 'NIS' }}</label>
                    <div class="input-text">
                        <input type="text" placeholder="{{ Request::is('admin/login') ? 'Masukkan Username...' : 'Masukkan NIS...' }}" id="{{ Request::is('admin/login') ? 'username' : 'nis' }}" name="{{ Request::is('admin/login') ? 'username' : 'nis' }}" required>
                        <label for="{{ Request::is('admin/login') ? 'username' : 'nis' }}">
                            <i class='bx bx-user-circle'></i>
                        </label>
                    </div>
                </div>
                <div class="password-input input">
                    <label for="password">Password</label>
                    <div class="input-text">
                        <input type="password" placeholder="Masukkan Password..." id="password" name="password" required>
                        <label for="password">
                            <i class='bx bx-lock-alt'></i> </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="button-login">
                Masuk
            </button>
        </form>
    </div>
    <div class="creator">
        <img src="{{ asset('images/icon.png') }}" alt="GADAK Studio">
        <hr>
        <h1 class="detail-creator">
            Made by <a href="https://gadakstd.my.id/">GADAK Studio</a>
        </h1>
    </div>
    <script src="{{ mix('assets/login/js/main.js') . "?id=" . Str::random(16) }}" defer></script>
</body>

</html>
