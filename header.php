<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php if (get_option('google_tag_manager_id') != ''): ?>
        <?php get_template_part( 'partials/code', 'tag-manager' ); ?>
    <?php endif ?>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php if (get_option('google_tag_manager_id') != ''): ?>
        <?php get_template_part( 'partials/code', 'tag-manager-noscript' ); ?>
    <?php endif ?>
    <div id="wrapper" class="hfeed">
        <header class="header" role="banner">
            <section class="branding">
                <div class="logo">
                <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
                        <?php if (function_exists('get_custom_logo')): ?>
                            <?php echo get_custom_logo(); ?>
                        <?php else: ?>
                        <?php endif ?>
                    <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
                </div>
            </section><!--END SECTION-->

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
