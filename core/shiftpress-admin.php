<?php

function shiftpress_admin_page(){
    add_menu_page( __('Shiftpress', 'shiftpress'),'Shiftpress', 'manage_options', 'shiftpress_theme_panel', 'shiftpress_create_page', 'dashicons-admin-generic',110 );
    add_submenu_page( 'shiftpress_theme_panel', __('Shiftpress','shiftpress'), 'General', 'manage_options', 'shiftpress_theme_panel', 'shiftpress_create_page' );
    add_action("admin_init", "display_theme_panel_options");
}

add_action('admin_menu', 'shiftpress_admin_page');

function shiftpress_create_page(){
    require_once get_template_directory().'/core/theme-panel/form.php';
}


function display_theme_panel_options(){

    require_once get_template_directory().'/core/theme-panel/fields.php';

    add_settings_section("shiftpress-settings-analitycs", __('Opciones de Analítica','shiftpress'), 'shiftpress_analytics_options', "shiftpress_theme_panel");

    register_setting("shiftpress-settings-group", "universal_analytics");
    register_setting("shiftpress-settings-group", "facebook_pixel_code");

    add_settings_field('universal_analytics', __('UA Analitycs: ', 'shiftpress'), 'show_field_analitycs', 'shiftpress_theme_panel', 'shiftpress-settings-analitycs');
    add_settings_field('facebook_pixel_code', __('Facebook ID: ', 'shiftpress'), 'show_field_facebook_pixel_code', 'shiftpress_theme_panel', 'shiftpress-settings-analitycs');
}


