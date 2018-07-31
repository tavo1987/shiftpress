<form role="search" method="get" id="searchform" class="searchform mb-4" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="flex">
        <label for="search"><?php _x( 'Search for:', 'label','shiftpress' ); ?></label>
        <input type="search" class="px-2 py-2 border-l border-t border-b" value="<?php echo get_search_query(); ?>" name="search" id="search" />
        <input type="submit" class="px-2 py-2 bg-blue text-white border border-blue" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button','shiftpress' ); ?>" />
    </ul>
</form>
