const mix = require('laravel-mix');



mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
     .mix.copyDirectory('resources/plugin', 'public/plugin');
