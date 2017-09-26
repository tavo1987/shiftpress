import WebFont from 'webfontloader';

/**
 * We'll load jQuery and the Foundation framework which provides support
 * for JavaScript based foundation features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.$ = window.jQuery = jQuery;
    require('foundation-sites/dist/js/plugins/foundation.core.js');
    require('foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js');
    //Example to include aditionals plugins
    // require('foundation-sites/dist/js/plugins/foundation.util.keyboard.js');
    // require('foundation-sites/dist/js/plugins/foundation.accordion.js');
} catch (e) {}


/**
 * Init foundation
 */
$(document).foundation();

/**
 * We'll load custom fonts with web font loader to improve page speed
 */
WebFont.load({
    google: {
        families: ['Open Sans:300,400,700']
    }
});
