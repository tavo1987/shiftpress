let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

mix.setPublicPath('./');

mix.sass('resources/assets/sass/shiftpress.scss', 'public/css/shiftpress.css')
    .js('resources/assets/js/shiftpress.js', 'public/js/shiftpress.js')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.js')],
    });

if( !mix.inProduction() ) {
    mix.browserSync({
        proxy: 'wordpress.test',
        open: false,
        notify: false,
        files: [
            './**/*.php',
            './public/css/**/*.css',
            './public/js/**/*.js',
        ],
    }).webpackConfig({
        devtool: 'source-map'
    }).sourceMaps();
}

mix.disableNotifications();

