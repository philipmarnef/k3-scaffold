const Bundler = require('parcel-bundler');
const Path = require('path');

// entrypoints
const entryFiles = Path.join(__dirname, './src/**/main.*');

// Bundler options
let options;

if(process.env.NODE_ENV === 'production') {
  options = {
    outDir: './html/public/assets',
    minify: true,
    sourceMaps:  false,
    watch: false
  }
} else {
  options = {
    outDir: './html/public/assets',
    minify: false,
    sourceMaps: true,
    watch: true
  }
}

const bundler = new Bundler(entryFiles, options);

module.exports = bundler;
