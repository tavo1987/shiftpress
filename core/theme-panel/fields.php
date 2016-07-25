<?php

function shiftpress_analytics_options()
{
    echo '<p>'.__('Add codes for convertions:', 'shiftpress').'</p>';
}
function show_field_analitycs(){
    echo '<input type="text" name="universal_analytics" id="universal_analytics" class="input" value="'.get_option('universal_analytics').'" />';
}

function show_field_facebook_pixel_code(){
    echo '<input type="text" name="facebook_pixel_code" id="facebook_pixel_code" class="input" value="'.get_option('facebook_pixel_code').'" />';
}
