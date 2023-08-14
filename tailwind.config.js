/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./layout/**/*.{html,php,js}",
    "./views/**/*.{html,php,js}",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#ffc222',
        primary_hover: '#eeac00',
      },
      backgroundImage: {
        'baner': "url('../image/baner.jpg')",
        'splash': "url('../image/splash.jpg')",
        'shop': "url('../image/baner-shop.jpg')",
      },
    },
  },
  plugins: [],
}

