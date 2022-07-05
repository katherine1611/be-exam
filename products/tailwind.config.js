/** @type {import('tailwindcss').Config} */
module.exports = {
 
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors : {
        'primary' : '#F08080',
        'primary-light' : '#F0808029',
        'light' : "#F5F5F5",
        'text-color' : '#464E5F',
        'nav-color' : '#697A8D',
        'bg-color' : '#F9FAFC',
        'card-color' : '#1E2875'
      },
      container : {
        padding : '3rem',
      }
    },
  },
  plugins: [],
}
