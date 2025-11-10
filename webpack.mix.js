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

// Set public path
mix.setPublicPath('public');

// Compile SASS files
mix.sass('resources/assets/sass/app.scss', 'public/assets/css/app.css')
   .sass('resources/assets/sass/skin-invoiceplane.scss', 'public/assets/css/skins/skin-invoiceplane.css');

// Bundle JavaScript dependencies
mix.js('resources/assets/js/dependencies.js', 'public/assets/js/dependencies.js')
   .sourceMaps();

// Copy fonts
mix.copy('node_modules/font-awesome/fonts', 'public/assets/fonts')
   .copy('node_modules/ionicons/dist/fonts', 'public/assets/fonts');

// Copy third-party assets
mix.copy('node_modules/chosen-js/chosen.css', 'public/assets/chosen-js/chosen.css')
   .copy('node_modules/chosen-js/chosen.jquery.js', 'public/assets/chosen-js/chosen.jquery.js')
   .copy('node_modules/chosen-js/chosen-sprite.png', 'public/assets/chosen-js/chosen-sprite.png')
   .copy('node_modules/chosen-js/chosen-sprite@2x.png', 'public/assets/chosen-js/chosen-sprite@2x.png');

mix.copy('node_modules/bootstrap-datepicker/dist/locales', 'public/assets/bs-datepicker/locales')
   .copy('node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js', 'public/assets/bs-datepicker/js/bootstrap-datepicker.min.js')
   .copy('node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css', 'public/assets/bs-datepicker/css/bootstrap-datepicker3.min.css');

mix.copy('node_modules/daterangepicker/daterangepicker.css', 'public/assets/daterangepicker/daterangepicker.css')
   .copy('node_modules/daterangepicker/daterangepicker.js', 'public/assets/daterangepicker/daterangepicker.js');

mix.copy('node_modules/typeahead.js/dist/typeahead.bundle.min.js', 'public/assets/typeahead/typeahead.bundle.min.js');

// Copy images from assets/img to public/assets/img
mix.copyDirectory('assets/img', 'public/assets/img');

// Options
mix.options({
    processCssUrls: false
});

// Production optimizations
if (mix.inProduction()) {
    mix.version();
}
