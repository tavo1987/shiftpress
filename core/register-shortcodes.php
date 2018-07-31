<?php

/**
 * Register here the shortcodes, for the theme
 */

 /*
    ==================================================================
        ROW
    ==================================================================
*/
    function row($atts, $content=null)
    {
        $attributes = shortcode_atts(
            [
                'class'      => '',
            ], $atts);
        extract($attributes);

        $output  = '<div class="grid-x '.$class.'">';
        $output .=  do_shortcode($content);
        $output .= '</div>';
        return $output;
    }
    add_shortcode('sp_row', 'row');

/*
    ==================================================================
        COLUMN
    ==================================================================
*/
    function column($atts, $content=null)
    {
        $attributes = shortcode_atts(
            [
                'class' => '',
            ], $atts);
        extract($attributes);

        $output  = '<div class="cell '.$class.'">'.do_shortcode($content).'</div>';
        return $output;
    }
    add_shortcode('sp_column', 'column');


/**
 * Formating all shortcodes scapping auto <p></p>
 */
    add_filter( 'the_content', 'shortcode_unautop',100 );
    remove_filter ('acf_the_content', 'wpautop');
