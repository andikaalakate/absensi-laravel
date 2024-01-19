const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.postCss(
    "resources/css/app.css", // File masukan (input file)
    "public/css", // Folder keluaran (output folder)
    [tailwindcss("tailwind.config.js")] // Plugin Tailwind CSS
).css("resources/css/style.css", "public/css");

