var elixir = require('laravel-elixir');

require('laravel-elixir-vue');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');

    mix.scripts([
        //'../../../public/js/app.js',
        'forum.js'
    ], 'public/js/app.js');

    mix.version([
        'css/app.css',
        'js/app.js'
    ]);
});
