const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

if (mix.inProduction()) mix.version();

mix.js('resources/js/app.js', 'public/js');

mix.browserSync({
  ui: false,
  injectChanges: true,
  notify: false,
  proxy: '127.0.0.1:8000',
});
    
mix.postCss('resources/css/app.css', 'public/css', [
  require('tailwindcss')
]);

mix.disableSuccessNotifications();


