const mix = require('laravel-mix');
const resetTimeSource = '23-12-25';


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

mix.sass(`resources/assets/sass/app.scss`, `public/HCMS-assets/css/app-${resetTimeSource}.css`);
mix.styles([
    `resources/assets/css/vendor/*.css`
], `public/HCMS-assets/css/vendor-${resetTimeSource}.css`);
mix.babel([
    `resources/assets/js/requirejs-config.js`,
    `resources/assets/js/settings.js`,
    `resources/assets/js/init.js`,
    `resources/assets/js/define/*.js`,
    `resources/assets/js/global.js`,
    `resources/assets/js/require/*.js`,
    `resources/assets/js/after.js`
], `public/HCMS-assets/js/all-${resetTimeSource}.js`);