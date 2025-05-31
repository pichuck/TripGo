import forms from '@tailwindcss/forms';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#2563eb',
                secondary: '#f8fafc',
                accent: '#0ea5e9',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                helvetica: ['Helvetica Neue', 'sans-serif'],
                montserrat: ['Montserrat Alternates', 'sans-serif'],
                nunito: ['Nunito', 'sans-serif'],
                sans: ['Poppins', 'sans-serif'],
            },
            boxShadow: {
                card: '0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05)',
                input: '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05)',
            },
        },
    },

    plugins: [forms],
};
