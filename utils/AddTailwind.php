<?php

add_action( 'wp_enqueue_scripts', 'obs_add_tailwind_css');
add_action( 'admin_menu', 'obs_add_tailwind_css' );

function obs_add_tailwind_css(){
    wp_enqueue_style( 'bootstrapcss', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', null, null );
    wp_enqueue_script('bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', null, '1.0', false);
}