<?php

/**
 * Clean Up
 */
require_once(get_template_directory().'/core/cleanup.php');

/**
 * Enqueue scripts
 */
require_once(get_template_directory().'/core/enqueue-scripts.php');

/**
 * Theme Support
 */
require_once(get_template_directory().'/core/theme-support.php');

/**
 * Register Menus
 */
require_once(get_template_directory().'/core/register-menus.php');

/**
 * Register Widgets
 */
require_once(get_template_directory().'/core/register-widgets.php');

/**
 * Save contact form in database if plugin is active
 */
function shift_is_plugin_active( $plugin ) {

    return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );

}

if ( shift_is_plugin_active('contact-form-7/wp-contact-form-7.php') ) {
  require_once(get_template_directory().'/core/save-contact-form.php');
}

/**
 * Custom post type
 */
//require_once(get_template_directory().'/functions/custom-post-type.php');

/**
 * Register shortcodes
 */
//require_once(get_template_directory().'/functions/register-shortcodes.php');
