module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {}
  },
  variants: {
    borderWidth: ['responsive', 'last', 'hover', 'focus'],
    opacity: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
  },
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
