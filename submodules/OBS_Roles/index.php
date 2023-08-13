<?php
error_log('loaded submodule');

add_action( 'admin_menu', 'OBSRolesCreateAdminMenu', 122);
//add_action('admin_menu', 'OBSRoles_enqueue_application');

function OBSRolesCreateAdminMenu(){
    add_menu_page('OBS Roles', 'OBS Roles', 'activate_plugins', 'obs-roles.php', 'obs_roles_settings_page', '', 82);
    
}

function obs_roles_settings_page(){
    //echo 'obs roles settings page';
    include_once 'views/MainPage.php';
}

function OBSRoles_enqueue_application(){
    wp_enqueue_script('OBSRoles', plugins_url( '/vue-project/src/main.js', __FILE__), null, '1.0', false);
}
