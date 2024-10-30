/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,js,php}",  // Mencakup semua folder dan file yang relevan
  ],
  theme: {
    extend: {},
  },
  plugins: [
     require('flowbite/plugin')
  ],
}
