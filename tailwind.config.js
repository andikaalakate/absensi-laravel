/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.jsx",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                color: {
                    whity: "#efefef",
                    primary: "#0059ff",
                    accent: "#ffc639",
                    secondary: "#393e46",
                    dark: "#222831",
                },
            },
            screens: {
                pc: "1920px",
                laptop: "1366px",
                "tablet-l": "992px",
                hp: "576px",
                hmin: "425px",
                minni: "375px",
                mini: "320px",
            },
        },
    },
    plugins: [require("daisyui")],
};
