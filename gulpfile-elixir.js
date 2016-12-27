var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(function(mix) {
    // Copy all necesari from node_modules to resources
    mix.copy([
        './node_modules/foundation-sites/dist/js/foundation.js',
    ], 'resources/assets/js/vendor');

    // Compiled sass of assets to project
    mix.sass('shiftpress.scss');

    // Compiled all js from resources to project
    mix.scripts([
        'resources/assets/js/vendor/foundation.js',
        'resources/assets/js/shiftpress.js'
    ],'public/js/main.js');

    /**
    * [Mix for enables liverreload in server]
    * @type {String}
    */
    mix.browserSync({
        proxy: 'http://example.dev',
        host: 'example.dev',
        open: 'external',
        files: [
            './**/*.php',
            elixir.config.publicPath + '/**/*.js',
            elixir.config.publicPath + '/**/*.css'
        ]
    });
});
