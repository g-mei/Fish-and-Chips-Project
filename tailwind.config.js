const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        colors:{
            blue: colors.blue,
            rose: colors.rose,
            slate: colors.slate,
            gray: colors.gray,
            red: colors.red,
            pink: colors.pink,
            yellow: colors.yellow,
            green: colors.green,
            white:'#fff',
            primary: '#288CD7',
            secondary:'#F3BAE5',
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
