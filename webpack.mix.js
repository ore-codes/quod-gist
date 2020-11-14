const mix = require('laravel-mix');
const path = require('path');

require('laravel-mix-remove-flow-types');

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

mix.webpackConfig({
    devServer: {
        contentBase: path.resolve(__dirname, 'public'),
    },
});

mix.removeFlowTypes()
    .copy('node_modules/microlight/microlight.js', 'public/js/microlight.js')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/chats.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]);
