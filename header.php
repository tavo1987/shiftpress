<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php if (get_option('facebook_pixel_code') != ''): ?>
        <?php get_template_part( 'partials/code', 'facebook' ); ?>
    <?php endif ?>

    <?php if (get_option('universal_analytics') != ''): ?>
        <?php get_template_part( 'partials/code', 'analytics' ); ?>
    <?php endif ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed">
        <header id="header" role="banner">
            <section id="branding">
                <div id="site-title"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
                    <?php if (function_exists('get_custom_logo')): ?>
                        <?php echo get_custom_logo(); ?>
                    <?php endif ?>
                    <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
                </div>
            </section><!--END SECTION-->

            <section class="banner">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
                    <img  src="<?php header_image(); ?>"
                    height="<?php echo get_custom_header()->height; ?>"
                    width="<?php echo get_custom_header()->width; ?>"
                    alt="<?php bloginfo('name');?>"
                    title="<?php bloginfo('description')?>" />
                </a>
            </section>

            <div class="top-bar">
                <nav id="menu" role="navigation" class="top-bar-left">
                <?php wp_nav_menu([
                    'theme_location' => 'main',
                    'menu_class'     => ' dropdown menu',
                    'container'      => ''
                ])?>
                </nav><!--END NAV-->
                <?php get_search_form(); ?>
            </div>
        </header><!--END HEADER-->

        <div id="container">
