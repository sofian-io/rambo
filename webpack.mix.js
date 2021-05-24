const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableSuccessNotifications()
  .js('resources/js/index.js', 'public/js')
  .sass('resources/css/app.scss', '../../../public/vendor/rambo/css');
  // .sass('resources/css/app.scss', 'public/css');

if (mix.inProduction()) {
  mix.version();
}
