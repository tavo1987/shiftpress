var elixir = require('laravel-elixir');

elixir(function(mix) {
  // Copy all necesari from node_modules to resources
  mix.copy([
    './node_modules/what-input/what-input.js',
    './node_modules/foundation-sites/dist/foundation.js'
    ], 'resources/assets/js/vendor');

  // Compiled sass of assets to project
  mix.sass('main.scss');

  // Compiled all js from resources to project
  mix.scripts([
    'resources/assets/js/vendor/what-input.js',
    'resources/assets/js/vendor/foundation.js',
    'resources/assets/js/site.js'
    ],'public/js/main.js');

  /**
   * [Mix for enables liverreload in server]
   * @type {String}
   */
  mix.browserSync({
    proxy: 'http://your_url_poject_here',
    host: 'your_url_poject_here',
    open: 'external',
    files: [
      './**/*.php',
      elixir.config.publicPath + '/**/*.js',
      elixir.config.publicPath + '/**/*.css'
    ]
  });
});