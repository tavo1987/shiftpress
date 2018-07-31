<?php get_header(); ?>
    <div class="grid-x">
        <section id="content" role="main" class="py-4 small-12 medium-12 large-9 cell">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'partials/entry' ); ?>
                <?php comments_template(); ?>
            <?php endwhile;?>
                <div class="pagination">
                    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
                </div>
            <?php endif; ?>
            <?php get_template_part( 'partials/nav', 'below' ); ?>
        </section>
        <div class="cell small-12 medium-12 large-3 py-6 bg-grey-lightest px-6">
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>