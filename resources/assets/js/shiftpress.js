import WebFont from 'webfontloader';

/**
 * Adding Jquery scripts the right way to avoid conflicts
 */
(function($) {
     //Jquery Partials
    require('./partials/jquery.menu.js');

    //Foundation
    require('foundation-sites/dist/js/plugins/foundation.core.js');
    require('foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js');

    //Example to include aditionals plugins
    // require('foundation-sites/dist/js/plugins/foundation.util.keyboard.js');
    // require('foundation-sites/dist/js/plugins/foundation.accordion.js');

    //Foundation Init
    $(document).foundation();
})( jQuery );

/**
 * Vanilla js partials
 */
require('./partials/example.js');

/**
 * WordPress Data
 *
 * If we need add new properties to WordPressData object please edit `core/enqueue-scripts.php` file
 */
console.log('WordPress site url: ', wordPressData.siteUrl);

/**
 * We'll load custom fonts with web font loader to improve page speed
 */
WebFont.load({
    google: {
        families: ['Open Sans:300,400,700']
    }
});
