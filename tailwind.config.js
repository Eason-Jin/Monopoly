/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'brown': '#7c5606',
        'lightblue': '#22d3ee',
        'pink': '#f472b6',
        'orange': '#f59e0b',
        'red': '#ff0000',
        'yellow': '#ffff00',
        'green': '#00ff00',
        'darkblue': '#2563eb',
      }
    },
  },
  plugins: [],
}

