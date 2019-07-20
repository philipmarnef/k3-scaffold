const browserSync = require('browser-sync').create();
const bundler = require('./parcel.config');
const del = require('del');

(async () => {
  // remove current assets
  const clean = await del(['./html/public/assets/main.*']); 

  // watch files & browsersync if not building for production
  if(process.env.NODE_ENV !== 'production') {
    // reload when parcel builds
    bundler.on('buildEnd', () => {
      browserSync.reload();
    });
    // reload when changing Kirby site config
    browserSync.watch("./html/public/site/**/*").on("change", browserSync.reload);
    // launch browser-sync proxying the dev server
    browserSync.init({
      proxy: "localhost:4000"
    });
  }

  // fire off parcel
  bundler.bundle();
})();
