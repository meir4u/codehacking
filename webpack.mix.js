let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js',                'public/js');
mix.scripts([
    'resources/assets/js/libs/jquery.js',
    'resources/assets/js/libs/bootstrap.js',
    'resources/assets/js/libs/metisMenu.js',
    'resources/assets/js/libs/sb-admin-2.js',
    'resources/assets/js/libs/scripts.js'
], 'public/js/libs.js');

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'resources/assets/css/bootstrap.css',
    'resources/assets/css/blog-post.css',
    'resources/assets/css/font-awesome.css',
    'resources/assets/css/metisMenu.css',
    'resources/assets/css/sb-admin-2.css',
    'resources/assets/css/styles.css',
    'resources/assets/css/custome.css'
  ], 'public/css/libs.css');
