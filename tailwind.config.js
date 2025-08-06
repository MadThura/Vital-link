import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // from request info
                primary: {
                    light: "#6b7280",
                    DEFAULT: "#4b5563",
                    dark: "#374151",
                },
                secondary: {
                    light: "#9ca3af",
                    DEFAULT: "#6b7280",
                    dark: "#4b5563",
                },
                accent: {
                    light: "#f87171",
                    DEFAULT: "#ef4444",
                    dark: "#dc2626",
                },
                background: "#f9fafb",
                // from donor home page
                //blood: "#e11d48",
                dark: {
                    950: "#0a0a0a",
                    900: "#171717",
                    800: "#262626",
                    700: "#404040",
                },
                ice: {
                    400: "#a5f3fc",
                    500: "#67e8f9",
                },
                //from welcome  
                blood: {
                    DEFAULT: "#e11d48", // this will work as 'text-blood' or 'bg-blood'
                    50: "#fff5f5",
                    100: "#fed7d7",
                    200: "#feb2b2",
                    300: "#fc8181",
                    400: "#f56565",
                    500: "#e53e3e",
                    600: "#c53030",
                    700: "#9b2c2c",
                    800: "#822727",
                    900: "#63171b",
                },

                dark: {
                    800: "#1a1a1a",
                    900: "#0d0d0d",
                },
            },
            animation: {
                //from donor home page
                "pulse-slow": "pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite", //included also welcome
                float: "float 6s ease-in-out infinite",

                //from welcome
                heartbeat: "heartbeat 1.5s ease-in-out infinite",
            },
            keyframes: {
                //from donor home page
                float: {
                    "0%, 100%": { transform: "translateY(0)" },
                    "50%": { transform: "translateY(-10px)" },
                },
                //from welcome
                heartbeat: {
                    "0%, 100%": {
                        transform: "scale(1)",
                    },
                    "50%": {
                        transform: "scale(1.1)",
                    },
                },
            },
        },
    },
    plugins: [],
};
