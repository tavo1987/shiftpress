<?php

function shiftpress_enqueue_scripts()
{
    //Css
    wp_enqueue_style('shiftpress-css', get_template_directory_uri() . '/public/css/shiftpress.css', array(), '', 'all');

    //Scripts
    wp_enqueue_script('jquery', true);
    wp_enqueue_script('shiftpress-js', get_template_directory_uri() . '/public/js/shiftpress.js', array('jquery'), '', true);

    //Add support to pass data from WordPress to shiftpress.js
    $wordPressData = [
        'siteUrl' => get_site_url(),
        'postType' => get_post_type()
    ];
    wp_localize_script('shiftpress-js', 'wordPressData', $wordPressData);
}
add_action('wp_enqueue_scripts', 'shiftpress_enqueue_scripts', 999);
