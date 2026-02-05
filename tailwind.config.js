import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                // On définit une palette "Restaurant" personnalisée
                restaurant: {
                    gold: '#C5A059',
                    dark: '#121212',
                    card: '#1A1A1A',
                    accent: '#EAB308',
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', 'serif'], // Ajout de la police de luxe
            },
        },
    },

    plugins: [forms],
};