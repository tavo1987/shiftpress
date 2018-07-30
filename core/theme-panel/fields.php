<?php

function shiftpress_tag_manager_option()
{
    echo '<p>'.__('Google Tag Manager configuration:', 'shiftpress').'</p>';
}

function show_field_google_tag_manager(){
    echo '<input type="text" placeholder="GTM-XXXXXXX" name="google_tag_manager_id" id="google_tag_manager_id" class="input" value="'.get_option('google_tag_manager_id').'" />';
}
