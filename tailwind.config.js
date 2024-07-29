import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                light:{
                    text:'#404040',
                    accent :'#0A78D5',
                    bgcolor:{
                        level1: '#F4F4F4',
                        level2: '#FCFCFC',
                        level3:'#EFEFEF',
                    },
                    button:{
                        background:'#0A78D5',
                        hover:'#0C6FBE',
                        active:'#1891F3'
                    }
                },
                dark:{
                    text:'#d4d4d4',
                    accent :'#6CB8F7',
                    bgcolor:{
                        level1: '#1D1D1D',
                        level2: '#2E2E2E',
                        level3:'#2E2E2E',
                    },
                    button:{
                        background:'#6CB8F7',
                        hover:'#3AA1F5',
                        active:'#055A9D'
                    }
                }
            }
        },
    },

    plugins: [forms, typography],
};
