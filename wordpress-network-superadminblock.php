<?php
/*
Plugin Name: WordPress Network Super Admin blocker
Plugin URI:
Description: Block certain Super Admins from WordPress Network access
Author: Jimmy Sjunfors / Swapi AB
Version: 1.0
Author URI: https://swapi.se
*/

defined('ABSPATH') or die();


/*
    ADD YOUR INFO HERE
*/
$wpnsa_allowed_superusers = array(); // usernames, ie. "admin"
$wpnsa_block_plugin_access = true; // true or false
$wpnsa_block_theme_access = true; // true or false



add_action('admin_init', 'wpnsa_check_block_superuser', 1);

function wpnsa_check_block_superuser() {
    $info = wp_get_current_user();

    if (!in_array($info->data->user_login, $wpnsa_allowed_superusers)) { 
        add_filter('manage_network', 'wpnsa_block_user', 1); 
        add_filter('can_edit_network', 'wpnsa_block_user', 1); 
        add_filter('redirect_network_admin_request', 'wpnsa_block_user', 1);
        add_filter('update_wpmu_options', 'wpnsa_block_user', 1);
        add_filter('wpmu_options', 'wpnsa_block_user', 1);

        if ($wpnsa_block_plugin_access) {
            add_filter('all_plugins', 'wpnsa_block_user', 1); 
            add_filter('activate_plugin', 'wpnsa_block_user', 1);
            add_filter('deactivate_plugin', 'wpnsa_block_user', 1);
        }

        if ($wpnsa_block_theme_access) {
            add_filter('switch_themes', 'wpnsa_block_user', 1);
            add_filter('edit_theme_options', 'wpnsa_block_user', 1);
        }

        /*
            ADD YOUR OWN SPECIFIC BLOCKS HERE
        */
    }

}

function wpnsa_block_user() {
    wp_die (__('Request failed, your user does not have access to: '.current_filter()));
}
