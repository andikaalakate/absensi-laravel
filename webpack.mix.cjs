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
)
.css(
    "resources/assets/login/css/style.css",
    "public/assets/login/css"
)
.js(
    "resources/assets/login/js/main.js",
    "public/assets/login/js"
)
;

