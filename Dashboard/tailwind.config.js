/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js}"],
  darkMode: 'class',
  theme: {
    extend: {},
  },
   plugins: [
        require('flowbite/plugin'),
        require('preline/plugin'),
    ],
     content: [
        "./node_modules/flowbite/**/*.js",
        'node_modules/preline/dist/*.js',
    ]
}
