
<?php get_header(); ?>

<div class="row">
    <section id="content" role="main" class="small-12 medium-12 large-9 columns">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'partials/entry' ); ?>
            <?php comments_template(); ?>
        <?php endwhile;?>
            <!-- post navigation -->
            <div class="pagination">
                <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
            </div>
        <?php endif; ?>
        <?php get_template_part( 'partials/nav', 'below' ); ?>
    </section>
    <div class="small-12 medium-12 large-3">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
