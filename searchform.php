<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <ul class="menu">
        <li><label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label','shiftpress' ); ?></label></li>
        <li><input type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" /></li>
        <li><input type="submit" id="searchsubmit" class="button"  value="<?php echo esc_attr_x( 'Search', 'submit button','shiftpress' ); ?>" /></li>
    </ul>
</form>
