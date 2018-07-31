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
    add_settings_section("shiftpress-settings-tag-manager", __('Tag Manager','shiftpress'), 'shiftpress_tag_manager_option', "shiftpress_theme_panel");
    add_settings_field('google_tag_manager_id', __('Google Tag Manager ID: ', 'shiftpress'), 'show_field_google_tag_manager', 'shiftpress_theme_panel', 'shiftpress-settings-tag-manager');
    register_setting("shiftpress-settings-group", "google_tag_manager_id");
}