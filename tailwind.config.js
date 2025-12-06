import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                takaful: {
                    blue: '#1D76BB',
                    green: '#8BC53F',
                    light: '#E8F5F1',
                    darkBlue: '#004A99',
                    darkGreen: '#008542',
                    lightBlue: '#E6F2FF',
                    lightGreen: '#E8F5F0'
                }
            },
        },
    },

    plugins: [forms],
};
