const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix
.postCss(
    "resources/css/app.css", // File masukan (input file)
    "public/css", // Folder keluaran (output folder)
    [tailwindcss("tailwind.config.js")] // Plugin Tailwind CSS
)
.postCss(
    "resources/css/tailwind.css", // File masukan (input file)
    "public/css", // Folder keluaran (output folder)
    [tailwindcss("tailwind.config.js")] // Plugin Tailwind CSS
);

mix.css(
    "resources/assets/login/css/style.css",
    "public/assets/login/css"
)
.js(
    "resources/assets/login/js/main.js",
    "public/assets/login/js"
)
.css(
    "resources/assets/dashboard/css/style.css",
    "public/assets/dashboard/css"
)
.js(
    "resources/assets/dashboard/js/main.js",
    "public/assets/dashboard/js"
)
;

