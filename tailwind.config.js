// const { colors } = require('tailwindcss/defaultTheme');
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
         colors: {
             transparent: 'transparent',
             current: 'currentColor',
             blue:colors.blue,
             black: colors.black,
             white: colors.white,
             gray: colors.coolGray,
             indigo: colors.indigo,
             rose: colors.rose,
             amber: colors.amber,
             red:colors.red,
             orange:colors.orange,
             yellow:colors.yellow,
             green:colors.green,
             purple:colors.purple

           },
      
        boxShadow: {
            sm: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
            DEFAULT: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
            md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
            lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
            xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
            '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
           '3xl': '0 35px 60px -15px rgba(0, 0, 0, 0.3)',
           '4xl': '0 40px 65px -20px rgba(0, 0, 0, 0.6)',
           '5xl': '0 35px 60px -20px rgba(0, 0, 0, 0.5)',
           '6xl': '0 35px 60px -20px rgba(0, 0, 0, 0.5)',
            inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
            none: 'none',
          },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            transitionProperty: {
                'height': 'height',
                'spacing': 'margin, padding',
                'width' : 'width',
                'display' : 'display',
                'minWidth' : 'minWidth',
                'display' : 'display',
               },
               animation: {
                'spin-slow': 'spin 3s linear infinite',
               }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            display: ['hover', 'focus','group-hover'],
            width: ['hover', 'focus','group-hover'],
            minWidth: ['hover', 'focus','group-hover'],
            visibility: ['hover', 'focus','group-hover'],
            transitionTimingFunction: ['hover', 'focus','group-hover',],
            transitionProperty: ['hover', 'focus','group-hover'],
            transitionDuration: ['hover', 'focus','group-hover'],
            zIndex: ['hover', 'active'],
        },
            animation: ['responsive', 'motion-safe', 'motion-reduce'],
          
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
