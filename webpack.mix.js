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
// backend scripts
mix.styles([
    'resources/scripts/css/style.min.css',
    'resources/scripts/css/custom.css',
    'resources/scripts/css/toastr.css',
    'resources/scripts/css/pages/floating-label.css'
], 'public/css/app.css');

mix.js('resources/js/app.js', 'public/js/laravel-echo.js');

mix.scripts([
    'resources/scripts/js/jquery-3.2.1.min.js',
    'resources/scripts/js/toastr.js',
    'resources/scripts/js/popper.min.js',
    'resources/scripts/js/bootstrap.min.js',
    'resources/scripts/js/perfect-scrollbar.jquery.min.js',
    'resources/scripts/js/waves.js',
    'resources/scripts/js/sidebarmenu.js',
    'resources/scripts/js/custom.min.js'
], 'public/js/app.js');

//end backend scripts

//start frontend scripts

mix.styles([
    'resources/scripts/frontend/css/vendor/plugins.min.css',
    'resources/scripts/frontend/css/style.min.css',
    'resources/scripts/frontend/css/responsive.min.css',
    'resources/scripts/css/toastr.css'
], 'public/frontend/css/style.min.css');


mix.scripts([
    'resources/scripts/frontend/js/vendor/jquery-3.5.1.min.js',
    'resources/scripts/frontend/js/vendor/modernizr-3.7.1.min.js',
    'resources/scripts/frontend/js/plugins.min.js',
    'resources/scripts/frontend/js/main.js',
    'resources/scripts/js/toastr.js',
], 'public/frontend/js/app.js');

//end frontend


if(mix.inProduction()){
	mix.version();
}