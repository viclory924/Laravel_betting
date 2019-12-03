let mix = require('laravel-mix');
let webpack = require('webpack');

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
mix.copy('resources/assets/js/pace.min.js', 'public/js')
    .copy('resources/assets/css/style.css', 'public/css')
    .copy('resources/assets/css/custom.css', 'public/css')
    .copy('resources/assets/fonts/','public/fonts', false)
    .copy('resources/assets/img/','public/img', false)

    .copy('resources/assets/js/main.js', 'public/js')
    .copy('resources/assets/js/jquery-3.3.1.min.js', 'public/js')
    .copy('resources/assets/js/jquery.cookie.js', 'public/js')
    .copy('resources/assets/js/iframeResizer.min.js', 'public/js')
    .copy('resources/assets/js/jquery.date-dropdowns.js', 'public/js')
    .copy('resources/assets/js/jquery.responsImg.min.js', 'public/js')
    .copy('resources/assets/js/sticky.min.js', 'public/js')
    .copy('resources/assets/js/swiper.min.js', 'public/js')
    .copy('resources/assets/js/tabs.min.js', 'public/js')
    .copy('resources/assets/js/modernizr.custom.js', 'public/js')
    .copy('resources/assets/js/select2.full.min.js', 'public/js')
    .copy('resources/assets/js/jquery.validate.js', 'public/js')
    .copy('resources/assets/js/jquery.validate.messages_ru.js', 'public/js')
    .copy('resources/assets/js/validation.js', 'public/js')
    .copy('resources/assets/js/depo.js', 'public/js')
;
//.js('resources/assets/js/validation.js', 'public/js')
    //.extract(['jquery', 'bootstrap', 'isotope-layout'])
    //.sass('resources/assets/sass/app.scss', 'public/css');
