

<?php
/**
 * @package gurpreetplugin
 * @version 1.0
 */
/*
Plugin Name: Gurpreet Plugin
Plugin URI: http://wordpress.org/plugins/gaganplugin/
Description:  This is my first Plugin
Author: Gurpreet Kaur
Version: 1.7.2
Author URI: http://gurpreet.tt/
*/



define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());


function add_my_custom_menu() {
    add_menu_page("gurpreetplugin", "Gurpreet Plugin", "manage_options", "gurpreetplugin","gurpreet_admin_view","dashicon-dashboard",11);
    add_submenu_page("gurpreetplugin", "Add New", "Add New", "manage_options","add_new","add_new_function");
    add_submenu_page("gurpreetplugin", "All Pages", "All Pages", "manage_options","all_pages","all_pages_function");
}
add_action("admin_menu", "add_my_custom_menu");

function gurpreet_admin_view(){

    echo "Gurpreet Plugin Coming Soon";
}
function add_new_function(){
    include_once PLUGIN_DIR_PATH."/view/new-page.php";
}

function all_pages_function(){
    include_once PLUGIN_DIR_PATH."/view/all-page.php";

}

add_shortcode("1wd_slider", "fwds_display_slider");
    function fwds_display_slider() {

$plugins_url = plugins_url();
 
include_once PLUGIN_DIR_PATH."/view/new-page.php";
    }