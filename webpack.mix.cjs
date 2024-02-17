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
.css(
    "resources/assets/dashboardAdmin/css/adminSiswa.css",
    "assets/dashboardAdmin/css"
)
.css(
    "resources/assets/dashboardAdmin/css/adminJurusan.css",
    "assets/dashboardAdmin/css"
)
.css(
    "resources/assets/dashboardAdmin/css/adminKelas.css",
    "assets/dashboardAdmin/css"
)
.css(
    "resources/assets/dashboardAdmin/css/adminUser.css",
    "assets/dashboardAdmin/css"
)
.css(
    "resources/assets/dashboardAdmin/css/adminPeringkat.css",
    "assets/dashboardAdmin/css"
)
.css(
    "resources/assets/dashboardAdmin/css/adminDashboard.css",
    "assets/dashboardAdmin/css"
)
.css(
    "resources/assets/dashboardAdmin/css/adminLaporan.css",
    "assets/dashboardAdmin/css"
)
.css(
    "resources/assets/dashboardAdmin/css/lihatLaporan.css",
    "assets/dashboardAdmin/css"
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
    "resources/assets/dashboard/js/userLocation.js",
    "assets/dashboard/js"
)
.js(
    "resources/assets/dashboardAdmin/js/main.js",
    "assets/dashboardAdmin/js"
)
.js(
    "resources/assets/dashboardAdmin/js/jurusan.js",
    "assets/dashboardAdmin/js"
)
.js(
    "resources/assets/dashboardAdmin/js/kelas.js",
    "assets/dashboardAdmin/js"
)
.js(
    "resources/assets/dashboardAdmin/js/user.js",
    "assets/dashboardAdmin/js"
)
.js(
    "resources/assets/dashboardAdmin/js/peringkat.js",
    "assets/dashboardAdmin/js"
)
.js(
    "resources/assets/dashboardAdmin/js/editSiswa.js",
    "assets/dashboardAdmin/js"
)
.setPublicPath('public');
;

mix.disableSuccessNotifications();
