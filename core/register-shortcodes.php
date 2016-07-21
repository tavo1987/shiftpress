<?php

/**
 * Register here the shortcodes, for the theme
 */

/**
 * Formating all shortcodes scapping auto <p></p>
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );