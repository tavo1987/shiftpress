<?php

/**
 * [Enable themes support: Title tag, automatic feed links, post thumbnails, custom backgrounds, logo]
 * @return [type] [description]
 */
function shiftpress_setup()
{
    load_theme_textdomain('shiftpress', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');

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
        'default-image'          => get_template_directory_uri().'/public/images/logo.png',
        'random-default'         => false,
        'width'                  => 196,
        'height'                 => 78,
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
add_action('admin_init', 'shiftpress_add_editor_styles');
