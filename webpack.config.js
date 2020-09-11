const path = require('path');

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
  }
};