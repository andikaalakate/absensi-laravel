<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login RPL</title>
    <!-- Style -->
    <link rel="stylesheet" href="{{ mix('assets/login/css/style.css') }}" />

    <script src="{{ mix('assets/login/js/main.js') }}" defer></script>

    <!-- BoxIcons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="login--container">
        <h1 class="login--head">
            <span></span>
            login rpl
            <span></span>
        </h1>
        @php
            $messageWarning = session()->get('warning');
        @endphp
        @if (Session::get('warning'))
            <p class="warning">{{ $messageWarning }}</p>
        @endif

        <form action="/proseslogin" class="form-login" method="POST" autocomplete="off">
            @csrf
            <div class="nisInput-login">
                <label for="nis">NIS :</label>
                <label class="input-nis" for="nis">
                    <input type="text" id="nis" name="nis" required />
                    <i class="bx bxs-key"></i>
                </label>
            </div>
            <div class="passwordInput-login">
                <label for="password">Password :</label>
                <label class="input-password" for="password">
                    <input type="password" id="password" name="password" required />
                    <i class="bx bxs-lock"></i>
                </label>
            </div>

            <div class="button">
                <button type="submit" class="cssbuttons-io">
                    <span>
                        Masuk
                    </span>
                </button>
            </div>
        </form>
    </div>
</body>

</html>
