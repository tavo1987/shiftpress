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
 * Theme options
*/
require_once(get_template_directory().'/core/shiftpress-admin.php');

/**
 * Register Menus
 */
require_once(get_template_directory().'/core/register-menus.php');

/**
 * Register Widgets
 */
require_once(get_template_directory().'/core/register-widgets.php');

/**
 * Custom post type
 */
//require_once(get_template_directory().'/functions/custom-post-type.php');

/**
 * Register shortcodes
 */
//require_once(get_template_directory().'/functions/register-shortcodes.php');
