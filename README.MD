# KIRBY 3 boilerplate

This is a minimal Kirby 3 local development scaffolding. It uses:

- [Docker](https://www.docker.com/) start a web server with [nginx](https://nginx.org/) & [php-fpm](https://php-fpm.org/)
- [Parcel](https://parceljs.org/) to transform css & js assets, including [Babel](https://babeljs.io/) and [postcss-preset-env](https://preset-env.cssdb.org/)
- [browser-sync](https://www.browsersync.io/) to automatically reload your site when files are changed

### Requirements
This setup requires:

- [node & npm](https://nodejs.org/en/)
- [composer](https://getcomposer.org/download/)
- [docker](https://www.docker.com/products/docker-desktop)

### Installation
Clone this repo, then from the root run the following commands:

```
 # Install node modules:
 npm install

 # Download Kirby 3:
 composer create-project getkirby/plainkit html/public
```

### Boot the dev environment
To start your local dev enviroment, run  
```
npm run serve
```

This starts a docker server instance at `localhost:4000`, then a browser-sync proxy at `localhost:3000` to automatically reload the browser on file changes.

To stop the server, hit `[ctrl] + c`, then do  
```
npm run stop
```
or  
```
docker-compose down
```

### Build for production
To build your assets for production:  
```
npm run build
```

This removes sourcemaps and minifies the assets.
