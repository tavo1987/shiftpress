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
<body <?php body_class('font-sans antialiased text-black leading-tight'); ?>>
    <?php if (get_option('google_tag_manager_id') != ''): ?>
        <?php get_template_part( 'partials/code', 'tag-manager-noscript' ); ?>
    <?php endif ?>

    <header class="lg:flex bg-grey-lighter text-center lg:items-center lg:justify-between py-4" role="banner">
        <div class="container mx-auto">
            <div class="mb-4">
                <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
                    <?php if (function_exists('get_custom_logo')): ?>
                        <?= get_custom_logo() ? get_custom_logo() : get_bloginfo(); ?>
                    <?php else: ?>
                    <?php endif ?>
                <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
            </div><!-- / End section -->

            <div class="flex justify-between">
                <nav role="navigation" class="flex">
                    <?php wp_nav_menu([
                        'theme_location' => 'main',
                        'menu_class'     => 'list-reset flex',
                        'container'      => ''
                    ])?>
                </nav><!-- /end nav -->
                <?php get_search_form(); ?>
            </div>
        </div><!-- / End container--->
    </header><!-- / End heaer-->

    <div class="container mx-auto">