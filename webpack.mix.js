let mix = require('laravel-mix');

mix.setPublicPath('./');

mix.sass('resources/assets/sass/shiftpress.scss', 'public/css/shiftpress.css')
    .js('resources/assets/js/shiftpress.js', 'public/js/main.js')
    .options({
        processCssUrls: false,
    })
    .browserSync({
        proxy: 'wordpress.dev',
        files: [
            './**/*.php',
            './public/css/**/*.css',
            './public/js/**/*.js',
        ],
        injectChanges: true,
    })

