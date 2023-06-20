/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // all php files in the theme
    './*.php',
    // all php files in the theme
    './**/*.php',
    // all js files in the theme
    './*.js',
    // all js files in the theme
    './**/*.js',
    
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  mode: 'jit',
  darkMode: 'class',
}
