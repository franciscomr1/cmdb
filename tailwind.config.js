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
                    color:{
                        neutral:{
                            primary:'#262626',
                            secondary:'#525252'

                        },
                        accent :'#0A78D5',
                    },
                    bgcolor:{
                        level1: '#FDFDFD',  //#F4F4F4
                        level2: '#F4F4F4',   //#FCFCFC
                        level3:'#ECECEC',  //#EFEFEF
                        level4:'#DDDDDD',  //#EFEFEF
                    },
                    button:{
                        primary:{
                            background:'#0A78D5',
                            hover:'#0C6FBE',
                            active:'#1891F3'
                        }
                    }
                },
                dark:{
                    color:{
                        neutral:{
                            primary:'#e5e5e5',
                            secondary:'#a3a3a3'

                        },
                        accent :'#6CB8F7',
                    },
                    bgcolor:{
                        level1:'#353535',   //#363636
                        level2:'#2C2C2C',   //#363636
                        level3: '#1F1F1F',  //#2E2E2E
                        level4: '#111111',   //#1D1D1D
                    },
                    button:{
                        primary:{
                            background:'#6CB8F7',
                            hover:'#3AA1F5',
                            active:'#055A9D'
                        }
                    }
                }
            }
        },
    },

    plugins: [forms, typography],
};
