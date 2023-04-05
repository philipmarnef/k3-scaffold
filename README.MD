# KIRBY 3 scaffold

This is a minimal Kirby 3 local development scaffolding.

- [Gulp](https://gulpjs.com/) to transform css & js assets, including  [Webpack](https://webpack.js.org/) and [Babel](https://babeljs.io/)
- [TailwindCSS](https://tailwindcss.com/) as a CSS framework to speed up development
- [browser-sync](https://www.browsersync.io/) to automatically reload your site when files are changed

### Requirements

This setup requires:

- [node & npm](https://nodejs.org/en/)
- [composer](https://getcomposer.org/download/)
- A server running [Nginx](https://nginx.com) with root set to `html/public`. If you want to use Apache instead, download the [.htaccess file](https://github.com/getkirby/plainkit/blob/master/.htaccess) from the Kirby plainkit and put it in `html/public`

### Installation

Clone this repo:

```sh

git clone https://github.com/philipmarnef/k3-scaffold.git --depth 1 <project-folder>
```

- update the package.json file with your project info
- run `./install.zsh` OR manually
	- edit the `baseUrl` in `gulpfile.esm.js` to the url your local site is running on, like `http://my-site.test` or `http://localhost:4000`.
	- update the 'robots' conditional in `snippets/head.php` to the production url
	- install Node modules & Kirby composer packages:
		```sh
			# Install node modules:
			npm install

			# Install Kirby:
			cd html
			composer install
		```

- Run the Kirby installer at `http://my-site.test/panel`.


### Watch files

To start watching, run the `serve` task from the root directory:

```sh
npm run serve
```

This will start a proxy server with browsersync at `localhost:3000`, refreshing the browser page on file changes.

See `gulpfile.esm.js` for details.

### Build for production

To build your assets for production:  

```sh
npm run build
```

This removes sourcemaps and minifies the assets.
