module.exports = {
	content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
	darkMode: 'media', // or 'media' or 'class'
	theme: {
		extend: {
		},
	},
	variants: {
		extend: {
			border: ['hover'],
			weight: ['hover'],
			shadow: ['hover', 'focus'],
			font: ['hover', 'focus'],
      padding: ['hover']
		},
	},
	plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography')
  ],
};
