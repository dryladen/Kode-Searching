/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'coklat-100': '#C9A68D',
        'coklat-200': '#A17659',
      }
    },
  },
  plugins: [require('flowbite/plugin')],
}

