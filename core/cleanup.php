<?php

// Fire all our initial functions at the start
add_action('after_setup_theme', 'core_theme_start', 16);

function core_theme_start()
{
    // launching operation cleanup
    add_action('init', 'shiftpress_head_cleanup');
    // remove pesky injected css for recent comments widget
    add_filter('wp_head', 'shiftpress_remove_wp_widget_recent_comments_style', 1);
    // clean up comment styles in the head
    add_action('wp_head', 'shiftpress_remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter('gallery_style', 'shiftpress_gallery_style');
    // cleaning up excerpt
    add_filter('excerpt_length', 'long_excerpt', 999);
    add_filter('excerpt_more', 'new_excerpt');
} /* end shiftpress start */
//The default wordpress head is a mess. Let's clean it up by removing all the junk we don't need.
function shiftpress_head_cleanup()
{
    // Remove category feeds
    remove_action('wp_head', 'feed_links_extra', 3);
    // Remove post and comment feeds
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'rsd_link');
    // Remove Windows live writer
    remove_action('wp_head', 'wlwmanifest_link');
    // Remove index link
    remove_action('wp_head', 'index_rel_link');
    // Remove previous link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    // Remove start link
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    // Remove links for adjacent posts
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    // Remove WP version
    remove_action('wp_head', 'wp_generator');
    // remove WP version from css
    add_filter('style_loader_src', 'remove_wp_ver_css_js', 9999);
    // remove Wp version from scripts
    add_filter('script_loader_src', 'remove_wp_ver_css_js', 9999);
} /* end cleanup */


/**
 * Remove jquery Migrate for users
 */
add_action('wp_default_scripts', function ($scripts) {
    if (! current_user_can('administrator')) {
        if (! empty($scripts->registered['jquery'])) {
            $jquery_dependencies = $scripts->registered['jquery']->deps;
            $scripts->registered['jquery']->deps = array_diff($jquery_dependencies, array( 'jquery-migrate' ));
        }
    }
});

// remove WP version from scripts
function remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Remove injected CSS for recent comments widget
function shiftpress_remove_wp_widget_recent_comments_style()
{
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

// Remove injected CSS from recent comments widget
function shiftpress_remove_recent_comments_style()
{
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
}

// Remove injected CSS from gallery
function shiftpress_gallery_style($css)
{
    return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/*----------------------------------------------------------------------*/
/* funciones para modificar el excerp
/*-----------------------------------------------------------------------*/
function long_excerpt($length)
{
    return 15;//numero de palabras a mostrar en el excerpt
}
function new_excerpt($more)
{
    global $post;
    return '<a class="bt-more" href="'. get_permalink($post->ID) . '"> Ver mas...</a>';
}

//  Stop WordPress from using the sticky class (which conflicts with Foundation), and style WordPress sticky posts using the .wp-sticky class instead
function remove_sticky_class($classes)
{
    $classes = array_diff($classes, array("sticky"));
    $classes[] = 'wp-sticky';
    return $classes;
}
add_filter('post_class', 'remove_sticky_class');

//This is a modified the_author_posts_link() which just returns the link. This is necessary to allow usage of the usual l10n process with printf()
function shiftpress_get_the_author_posts_link()
{
    global $authordata;
    if (!is_object($authordata)) {
        return false;
    }
    $link = sprintf(
        '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
        get_author_posts_url($authordata->ID, $authordata->user_nicename),
        esc_attr(sprintf(__('Posts by %s', 'shiftpress'), get_the_author())), // No further l10n needed, core will take care of this one
        get_the_author()
    );
    return $link;
}
