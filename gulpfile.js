import del                from    'del';
import gulp               from    'gulp';
import imagemin           from    'gulp-imagemin';
import sourcemaps         from    'gulp-sourcemaps';
import postcss            from    'gulp-postcss';
import postcssEasyImport  from    'postcss-easy-import/index.js';
import tailwind           from    'tailwindcss';
import nesting            from    'tailwindcss/nesting/index.js';
import autoprefixer       from    'autoprefixer';
import browserSync        from    'browser-sync';
import webpack            from    'webpack-stream';

const forProduction = process.env.NODE_ENV === 'production';

const baseUrl = 'http://k3-scaffold.test';

let postcssPlugins = [
  postcssEasyImport(),
  nesting(),
  tailwind(),
  autoprefixer(),
];

export function clean () {
  return del([
    './html/public/assets/css/*', 
    './html/public/assets/js/*', 
    './html/public/assets/maps/*'
  ]);
}

function cleanImages () {
  return del('./html/public/assets/images/*');
}

function imageMin () {
  return gulp.src('./src/images/*')
    .pipe(imagemin())
    .pipe(gulp.dest('./html/public/assets/images'));
}

export const images = gulp.series(cleanImages, imageMin);

function css () {
  return gulp.src([
    './src/css/main.css', 
    './src/css/print.css'
  ])
    .pipe(sourcemaps.init())
    .pipe(postcss(postcssPlugins))
    .pipe(sourcemaps.write('../maps'))
    .pipe(gulp.dest('./html/public/assets/css'))
    .pipe(browserSync.stream({once: true}));
}

function js () {
  const mode = forProduction ? 'production' : 'development';
  return gulp.src([
    './src/js/*'
  ])
    .pipe(webpack({
      mode: mode,
      module: {
        rules: [
          { 
            test: /\.js$/, 
            exclude: /node_modules/, 
            loader: "babel-loader" 
          },
          {
            test: /\.css$/,
            use: [
              'css-loader'
            ]
          }
        ],
      },
      entry: {
        main: './src/js/main.js',
      },
      output: {
        filename: '[name].js'
      }
    }))
    .pipe(gulp.dest('./html/public/assets/js'))
    .pipe(browserSync.stream());
}

function watch () {
  browserSync.init({
    proxy: {
      target: baseUrl,
      proxyReq: [
        function (req) {
          req.setHeader('Access-Control-Allow-Origin', '*');
        }
      ]
    },
    open: false
  });
  gulp.watch([
    './tailwind.config.js',
    './src/css/**/*',
    './html/site/**/*.php',
  ], {usePolling: true}, css);
  gulp.watch('./src/js/**/*', {usePolling: true}, js);
  gulp.watch([
    './html/site/**/*.yml',
  ], {usePolling: true}).on('change', browserSync.reload);
}

export const build = gulp.series(gulp.parallel(clean, images), gulp.parallel(css,js));
export const serve = gulp.series(gulp.parallel(css,js), watch)

export default serve;
