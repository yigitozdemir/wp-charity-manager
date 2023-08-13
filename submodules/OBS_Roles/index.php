<?php
error_log('loaded submodule');

add_action( 'admin_menu', 'OBSRolesCreateAdminMenu' );
add_action('admin_menu', 'OBSRoles_enqueue_application');

function OBSRolesCreateAdminMenu(){
    add_menu_page('OBS Roles', 'OBS Roles', 'activate_plugins', 'obs-roles.php', 'obs_roles_settings_page', '', 82);
}

function obs_roles_settings_page(){
    echo 'obs roles settings page';
}

function OBSRoles_enqueue_application(){
    wp_enqueue_script('OBSRoles', plugins_url( '/vue-project/src/main.js', __FILE__), null, '1.0', false);
}
function make_scripts_modules( $tag, $handle, $src ) {
    
    if ( 'OBSRoles' !== $handle ) {
        return $tag;
    }

    $id = $handle . '-js';

    $parts = explode( '</script>', $tag ); // Break up our string

    foreach ( $parts as $key => $part ) {
        if ( false !== strpos( $part, $src ) ) { // Make sure we're only altering the tag for our module script.
            $parts[ $key ] = '<script type="module" src="' . esc_url( $src ) . '" id="' . esc_attr( $id ) . '">';
        }
    }

    $tags = implode( '</script>', $parts ); // Bring everything back together

    return $tags;
}
add_filter('script_loader_tag', 'make_scripts_modules' , 242, 3);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vite App</title>
  </head>
  <body>
    <script type="importmap">
  {
    "imports": {
      "vue": "https://unpkg.com/vue@3/dist/vue.esm-browser.js"
    }
  }
</script>
    <div id="app"></div>
    <script type="module" src="/src/main.js"></script>
  </body>
</html>
