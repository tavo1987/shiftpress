<?php

/**
 * [Enable themes support: Title tag, automatic feed links, post thumbnails, custom backgrounds, logo]
 * @return [type] [description]
 */
function shiftpress_setup(){
    load_theme_textdomain('shiftpress', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ));


    global $content_width;
    if (! isset($content_width)) {
        $content_width = 640;
    }

/**
  * [Options array for add custom background theme]
  * @var array
  */
    $defaults = array(
        'default-color'          => '',
        'default-image'          => '',
        'wp-head-callback'       => '_custom_background_cb',
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support('custom-background', $defaults);

  /**
   * [Options array for add logo support theme]
   * @var array
   */
    $defaults = array(
        'random-default'         => false,
        'width'                  => 1200,
        'height'                 => 100,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support('custom-header', $defaults);
}
add_action('after_setup_theme', 'shiftpress_setup');

/**
 * [shiftpress_enqueue_comment_reply_script enqueue comments reply]
 * @return [type] [description]
 */
function shiftpress_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('comment_form_before', 'shiftpress_enqueue_comment_reply_script');

/**
 * [shiftpress_title halt de title post from database is null]
 * @param  [type] $title [description]
 * @return [type]        [description]
 */
function shiftpress_title($title)
{
    if ($title == '') {
        return '&rarr;';
    } else {
        return $title;
    }
}
add_filter('the_title', 'shiftpress_title');

/**
 * [shiftpress_filter_wp_title the title of page]
 * @param  [type] $title [description]
 * @return [type]        [description]
 */
function shiftpress_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}
add_filter('wp_title', 'shiftpress_filter_wp_title');

/**
 * [shiftpress_custom_pings get the ping comments]
 * @param  [type] $comment [description]
 * @return [type]          [description]
 */
function shiftpress_custom_pings($comment)
{
    $GLOBALS['comment'] = $comment;
    ?>
  <li <?php comment_class();
    ?> id="li-comment-<?php comment_ID();
    ?>"><?php echo comment_author_link();
    ?></li>
  <?php

}

/**
 * [shiftpress_comments_number get the number of comments]
 * @param  [type] $count [description]
 * @return [type]        [description]
 */
/*function shiftpress_comments_number( $count )
{
  if ( !is_admin() ) {
    global $id;
    $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}
add_filter( 'get_comments_number', 'shiftpress_comments_number' );*/

/**
 * [shiftpress_add_editor_styles Optional for asign custom style for tynced editor]
 * @return [type] [description]
 */
function shiftpress_add_editor_styles()
{
    add_editor_style('style.css');
}
//add_action('admin_init', 'shiftpress_add_editor_styles');

/**
 * Pagination function
 *
 */
function wp_corenavi() {
    global $wp_query, $wp_rewrite;
    $pages = "";
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;
    $a['type']= 'list';
    $total = 1; //1 – muestra el texto “Página N de N”, 0 – para no mostrar nada
    $a['mid_size'] = 1; //cuantos enlaces a mostrar a izquierda y derecha del actual
    $a['end_size'] = 1; //cuantos enlaces mostrar al comienzo y al fin
    $a['prev_text'] = '&laquo;'; //texto para el enlace “Página siguiente”
    $a['next_text'] = '&raquo;'; //texto para el enlace “Página anterior”
    //if ($max > 1) echo "<div class='navigation'>";
    if ($total == 1 && $max > 1) $pages = '<span class="pagination__info">Página ' . $current . ' de ' . $max . '</span>';
            echo  paginate_links($a);
    //if ($max > 1) echo '</div>';
}
