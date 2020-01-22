
<?php

/*
Plugin Name: custom plugin
Plugin URI: http://wordpress.org/plugins/gaganplugin/
Description:  This is my first Plugin in wordpress
Author: Gagandeep
Version: 1.0
Author URI: http://www.facebook.com
*/

// constants

define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());
define ("PLUGIN_VERSION","1.0");


function add_my_custom_menu(){
	add_menu_page(
	"customplugin", // parent slug
	"custom plugin", // page title
	"manage_options", // menu title
	"custom-plugin1", // capabitlity=user_level access
	"add_new_function", // menu slug
	"dashicons-dashboard", // callback function
	11);
	
	add_submenu_page(
	"custom-plugin1",
	"Add New",
	"Add New",
	"manage_options",
	"custom_plugin1",
	"add_new_function"
	);
	
	add_submenu_page(
	"custom-plugin1",
	"All Pages ",
	"All Pages",
	"manage_options",
	"all-pages",
	"all_page_function"
	);
}

add_action("admin_menu","add_my_custom_menu");



function add_new_function(){
	// this is add new function
	include_once PLUGIN_DIR_PATH. "/views/add-new.php";
	}
	
function all_page_function(){
	// this is all page function
	include_once PLUGIN_DIR_PATH. "/views/all-page.php";
	}
	
function custom_plugin_assets(){
	// css and js files
	wp_enqueue_style(
	"cp1_style",
	PLUGIN_URL. "/custom-plugin/assets/css/style.css", // css file path
	'', // dependency on other files
	PLUGIN_VERSION // plugin version number
	);
	
	wp_enqueue_script(
	"cp1_script",
	PLUGIN_URL. "/custom-plugin/assets/js/script.js",
	''.
	PLUGIN_VERSION,
	false
	);
	
	
	
	
	
	wp_localize_script("cp1_script","ajaxurl", admin_url("admin-ajax.php"));
}

add_action("init", "custom_plugin_assets");

if(isset($_REQUEST['action'])){  // it checks the action param is set or not
     switch($_REQUEST['action']){  // if set pass to switch method to match case
     case "custom_plugin_library" : 
    
    add_action("admin_init","add_custom_plugin_library");  // match case
      function add_custom_plugin_library(){  // function attached with the action hook
      global $wpdb;
      include_once PLUGIN_DIR_PATH."/library/custom-plugin-lib.php";  // ajax handler file within /library folder
      }
      
      break;
     
     }
  }
 


// table generating code
function custom_plugin_tables(){
	global $wpdb;
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	
	if (count($wpdb->get_var('SHOW TABLE LIKE "wp_custom_plugin"')) == 0 ) {
		
		$sql_query_to_create_table = "CREATE TABLE `wp_custom_plugin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(150) DEFAULT NULL,
 `email` varchar(150) DEFAULT NULL,
 `phone` varchar(150) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1";
 dbDelta($sql_query_to_create_table);
	}
		
}
register_activation_hook(__FILE__,'custom_plugin_tables');

function deactivate_table(){
	//uninstall mysql code or delete table from database or from phpmyadmin
	global $wpdb;
	$wpdb->query("DROP table IF Exists wp_custom_plugin");
	
	//1- we get the id of post means page
	// delete the post from table
	
	$the_post_id = get_option("custom_plugin_page_id");
	if(!empty($the_post_id)){
		wp_delete_post($the_post_id,true);
	}
}
register_deactivation_hook(__FILE__,"deactivate_table"); 

function create_page(){
	//code to create a page in pages section
	
		
	$page = array();
	$page['post_title']= "custom plugin online";
	$page['post_content'] = "learning platform";
	$page['post_status'] = "publish";
	$page['page_slug'] = "custom-plugin";
	$page['post_type'] = "page";
	
	$post_id = wp_insert_post($page);
	 
	
	add_option("custom_plugin_page_id",$post_id);  // wp_options table from the name of custom_plugin_page_id 
}
register_activation_hook(__FILE__,"create_page");

?>




