<?php

/**
 * @package com.yigitozdemir.wpvue
 * @version 0.0.1
 */
/*
Plugin Name: Charity Manager for Wordpress
Plugin URI: http://yigitnot.wordpress.com/
Description: A plugin for charities to manage their projects
Author: Yigit Ozdemir
Version: 0.0.1
Author URI: http://yigitnot.wordpress.com/
*/

/**
 * Includes
 */
include __DIR__ . '/utils/AddTailwind.php';
/**
 * Definitons
 */
$OBSEnabledModules = array();
add_action( 'init', 'OBSCharityManagerInit' );

function OBSCharityManagerInit(){
    OBSEnableSubmodule('OBS_Roles');
}

/**
 * load a submodule
 */
function OBSEnableSubmodule( $submoduleName ){
    include __DIR__ . '/submodules/' . $submoduleName . '/index.php';
    $OBSEnabledModules[] = $submoduleName ;
}


/*
add_action('admin_menu', 'wpvue_add_test_menu');
function wpvue_add_test_menu()
{
    add_menu_page('WP Vue Settings', 'WP Vue Settings', 'activate_plugins', 'wp-vue.php', 'wpvue_render_settings_page', '', 81);
    add_submenu_page('wp-vue.php', 'WP Vue Test Page', 'Wp Vue Test Page', 'activate_plugins', 'wp-vue-test.php', 'wpvue_render_test_page', 1);
}

function wpvue_render_settings_page()
{
    $wpvue_distribution = get_option('wpvue_distribution');
    if (FALSE == get_option('wpvue_distribution')) {
        add_option('wpvue_distribution', 'Development');
        $wpvue_distribution = get_option('wpvue_distribution');
    }

    if ($wpvue_distribution != 'Production' && $wpvue_distribution != 'Development') {
        $wpvue_distribution = 'Development';
    }

    if (isset($_POST['wpvue_distribution'])) {
        update_option('wpvue_distribution', $_POST['wpvue_distribution']);
        echo $_POST['wpvue_distribution'];
        echo 'Settings saved';
    }
?>
    <form method="POST" action="">
        <select name="wpvue_distribution" id="wpvue_distribution">
            <option value="Development" <?php if ($wpvue_distribution == "Development") echo "selected"; ?>>Development</option>
            <option value="Production" <?php if ($wpvue_distribution == "Production") echo "selected"; ?>>Production</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>
<?php

}


function wpvue_render_test_page()
{
?>

    <div id="app">{{ message }}</div>

    <script>
        const {
            createApp,
            ref
        } = Vue

        createApp({
            setup() {
                const message = ref('vue is working! Hello vue!')
                return {
                    message
                }
            }
        }).mount('#app')
    </script>
<?php
}
*/