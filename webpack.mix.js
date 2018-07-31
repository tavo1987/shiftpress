let mix = require('laravel-mix');

mix.setPublicPath('./');

mix.sass('resources/assets/sass/shiftpress.scss', 'public/css/shiftpress.css')
    .js('resources/assets/js/shiftpress.js', 'public/js/shiftpress.js')
    .options({
        processCssUrls: false,
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

