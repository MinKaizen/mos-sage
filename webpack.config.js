const path = require('path');
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
  mode: 'development',
  entry: './resources/assets/scripts/main.js',
  output: {
    path: path.resolve(__dirname, 'dist/scripts'),
    filename: 'main.js'
  },
  watch: true,
  watchOptions: {
    aggregateTimeout: 200,
    poll: 1000
  },
  plugins: [
    new CopyPlugin({
      patterns: [
        {
          from: path.resolve(__dirname, 'resources/assets/fonts'),
          to: path.resolve(__dirname, 'dist/fonts'),
          globOptions: {
            dot: false,
            gitignore: true,
          },
        },
      ],
    }),
  ],
};