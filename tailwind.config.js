module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        tg: {
          red: {
            100: '#FEF6F6',
            200: '#FDECED',
            300: '#FAC7C9',
            400: '#F58F92',
            500: '#F0565C',
            600: '#EB1C24',
            700: '#BB1117',
            800: '#830C10',
          },
          orange: '#F4B860',
          yellow: '#FFDD4A',
          green: '#08A045',
          blue: {
            DEFAULT: '#3A86FF',
            darker: '#1F75FF'
          },
          black: "#323133",
          gray: {
            100: '#FAFAFA',
            200: '#F5F5F5',
            300: '#EBEAEB',
            400: '#CCCBCD',
            500: '#AEACAF',
            600: '#8F8D91',
            700: '#716E72',
            800: '#525053',
          },
        }
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
