# KIRBY 3 scaffold

This is a minimal Kirby 3 local development scaffolding.

- [Gulp](https://gulpjs.com/) to transform css & js assets, including  [Webpack](https://webpack.js.org/), [Babel](https://babeljs.io/) and [postcss-preset-env](https://preset-env.cssdb.org/)
- [browser-sync](https://www.browsersync.io/) to automatically reload your site when files are changed

### Requirements

This setup requires:

- [node & npm](https://nodejs.org/en/)
- [composer](https://getcomposer.org/download/)
- A server running [Nginx](https://nginx.com) with root set to `html/public`. If you want to use Apache instead, download the [.htaccess file](https://github.com/getkirby/plainkit/blob/master/.htaccess) from the Kirby plainkit and put it in `html/public`

### Installation

Clone this repo, then from your project folder run the following commands:

```sh
 # Install node modules:
 npm install

 # Install Kirby:
 cd html
 composer install
```

Edit the `baseUrl` in `gulpfile.esm.js` to the url your local site is running on, like `http://my-site.test` or `http://localhost:4000`.

### Watch files

To start watching, run the watch task from the root directory:

```sh
npm run watch
```

This will run gulp in watch mode, proxying the server via `localhost:3000` and reloading on any relevant file changes. 

See `gulpfile.esm.js` for details.

### Build for production

To build your assets for production:  

```sh
npm run build
```

This removes sourcemaps and minifies the assets.
