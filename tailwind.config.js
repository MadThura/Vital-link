import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class', // Add this line to enable class-based dark mode
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
            },
        },
    },
    plugins: [
        require("tailwind-scrollbar-hide"), // ✅ hides scrollbars
    ],
};
