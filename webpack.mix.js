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

mix.js("resources/js/site.js", "public/js")
    .js("resources/js/panel.js", "public/js")
    .js("resources/js/header_site.js", "public/js")
    .js("resources/js/header_panel.js", "public/js")
    .sass("resources/sass/site.scss", "public/css")
    .sass("resources/sass/panel.scss", "public/css")
    .options({
        processCssUrls: false,
    });
