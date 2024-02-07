let mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix
.postCss(
    "resources/css/app.css", // File masukan (input file)
    "css", // Folder keluaran (output folder)
    [tailwindcss("tailwind.config.js")] // Plugin Tailwind CSS
)
.postCss(
    "resources/css/tailwind.css", // File masukan (input file)
    "css", // Folder keluaran (output folder)
    [tailwindcss("tailwind.config.js")] // Plugin Tailwind CSS
);

mix.css(
    "resources/assets/login/css/style.css",
    "assets/login/css"
)
.js(
    "resources/assets/login/js/main.js",
    "assets/login/js"
)
.css(
    "resources/assets/dashboard/css/style.css",
    "assets/dashboard/css"
)
.css(
    "resources/assets/dashboard/css/keamanan.css",
    "assets/dashboard/css"
)
.css(
    "resources/assets/dashboard/css/leaderboard.css",
    "assets/dashboard/css"
)
.css(
    "resources/assets/dashboard/css/profilSiswa.css",
    "assets/dashboard/css"
)
.css(
    "resources/assets/dashboard/css/statistik.css",
    "assets/dashboard/css"
)
.css(
    "resources/assets/dashboard/css/scan-qr.css",
    "assets/dashboard/css"
)
.css(
    "resources/assets/dashboard/css/tentang.css",
    "assets/dashboard/css"
)
.js(
    "resources/assets/dashboard/js/main.js",
    "assets/dashboard/js"
)
.js(
    "resources/assets/dashboard/js/qrCodeScanner.js",
    "assets/dashboard/js"
)
.js(
    "resources/assets/dashboard/js/instascan.min.js",
    "assets/dashboard/js"
)
.js(
    "resources/assets/dashboard/js/checkLocation.js",
    "assets/dashboard/js"
)
.js(
    "node_modules/html5-qrcode/html5-qrcode.min.js",
    "assets/dashboard/js"
)
.setPublicPath('public');
;

mix.disableSuccessNotifications();
