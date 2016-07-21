
<div class="row collapse">
    <div class="small-12 columns">
        <?php get_header(); ?>
    </div>
</div>
<hr>
<div class="row">
    <section id="content" role="main" class="small-12 medium-12 large-9 columns">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'partials/entry' ); ?>
            <?php comments_template(); ?>
        <?php endwhile; endif; ?>
        <?php get_template_part( 'partials/nav', 'below' ); ?>
    </section>
    <div class="small-12 medium-12 large-3">
        <?php get_sidebar(); ?>
    </div>
</div>

<div class="row">
    <div class="small-12 columns">
        <?php get_footer(); ?>
    </div>
</div>
