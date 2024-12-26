/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "tw-",
  content: ["./**/*.php"],
  theme: {
    extend: {},
  },
  plugins: [require("@tailwindcss/typography"), require("@tailwindcss/forms")],
};
