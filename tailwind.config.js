const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
        
        backgroundImage: {
            "home-img": "url('../../public/mediterranean-cuisine-gef56f1866_1920.webp')",
            "result-img": "url('../../public/22973038.webp')",
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
