<?php
/**
 * @package Gurpreet_Form
 * @version 1.7.2
 */
/*
Plugin Name: Gurpreet Form
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Gurpreet Kaur Bhamra
Version: 1.7.2
Author URI: http://ma.tt/
*/


define("PLUGIN_DIR_PATH",plugin_dir_path(__FILE__));
define("PLUGIN_URL",plugins_url());

add_action('wp_enqueue_scripts', 'fwds_styles');
function fwds_styles() {

wp_register_style('slidesjs_example', plugins_url('style.css', __FILE__));
wp_enqueue_style('slidesjs_example');

}


function add_my_custom_menu() {
    add_menu_page("gurpreetform", "Gurpreet Form", "manage_options", "gurpreetplugin","gurpreet_admin_view","dashicon-dashboard",11);
	
	}
add_action("admin_menu", "add_my_custom_menu");

function gurpreet_admin_view(){
	
	echo '<div class="container "> 
	<font size="24">
	<b><br><br>Welcome to Gurpreet Form<br><br> <b></font>
	<div class="wrap">
       <table class="widefat">
	   <thead>
	   <tr>
	   <th><b>Elements</b></th>
	   <th><b>Form</b></th>
	   <th><b>ShortCode</b></th>
	   </tr>
	   <td>
		<br><br>Form 1: 4 elements named: First Name, Last Name, Email, About.<br><br></td>
	  <td><form action="' . plugins_url( 'images/form1.jpg', __FILE__ ) . '" >
	  <input type="submit" name="submit" value="Form 1 - Demo"/></td> <td>[cf_gurpreet_form1]
	  </td></form>
	  <tr>
	  <td><br><br>Form 2: 5 elements named: First Name, Last Name, Phone, Email, Message.<br><br></td>
	  <td> <form action="' . plugins_url( 'images/form2.jpg', __FILE__ ) . '" >
	  <input type="submit" name="submit" value="Form 2 - Demo"/></td> <td>[cf_gurpreet_form2]
	  </td></tr></form>
	  </thead>
</table>
	</div>';
}
	


function processpage(){
    include_once PLUGIN_DIR_PATH."/.php";
}

add_action( 'admin_init', 'my_plugin_settings' );

function my_plugin_settings() {
	register_setting( 'my-plugin-settings-group', 'accountant_name' );
	register_setting( 'my-plugin-settings-group', 'accountant_phone' );
	register_setting( 'my-plugin-settings-group', 'accountant_email' );
}


class MyPlugin {
        static function install() {
           global $wpdb;
           $table_name = $wpdb->prefix . 'my_table';
 
 $charset_collate = $wpdb->get_charset_collate();
 
 $sql = "CREATE TABLE $table_name (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
     fname varchar(120) DEFAULT NULL,
	 lname varchar(120) DEFAULT NULL,
	 phone varchar(120) DEFAULT NULL,
	 email varchar(120) DEFAULT NULL,
	 bio varchar(500) DEFAULT NULL,
     UNIQUE KEY id (id)
 ) $charset_collate;";
 
 require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
 dbDelta( $sql );
        }
    }
 
    register_activation_hook(__FILE__, array( 'MyPlugin', 'install' ) );

function deactivate_table() {
	  global $wpdb;
	  $wpdb->query("DROP table IF Exists wp_my_table");
   }
	register_deactivation_hook(__FILE__,"deactivate_table");


function registration_form1( $fname, $lname, $email, $bio ) {
		include_once PLUGIN_DIR_PATH."/style.css";
		
function actionform() {
	include_once PLUGIN_DIR_PATH."/process.php";
}
 
    echo '
	<div class="container">
    <form method="post" action="' . plugins_url( 'process.php', __FILE__ ) . '" >


    <div>
    <label>First Name</label>
    <input type="text" name="fname" value="">
    </div>
     
    <div>
    <label>Last Name</label>
    <input type="text" name="lname" value="">
    </div>
     
    <div>
    <label>Email</label>
    <input type="email" name="email" value="">
    </div>
     
    <div>
    <label>About</label>
    <textarea name="bio"></textarea>
    </div>
    <input type="submit" name="submit" value="submit"/>
    </form></div>
    ';
}

function registration_form2( $fname, $lname, $phone, $email, $bio ) {
		include_once PLUGIN_DIR_PATH."/style1.css";
 
    echo '
		<div class="container">
   <form method="post" action="' . plugins_url( 'process.php', __FILE__ ) . '" >

    <div>
    <label>First Name</label>
    <input type="text" name="fname" value="">
    </div>
     
    <div>
    <label>Last Name</label>
    <input type="text" name="lname" value="">
    </div>
     
    <div>
    <label>Email</label>
    <input type="email" name="email" value="">
    </div> <div>
	
    <label>Phone</label>
    <input type="text" name="phone" value="">
    </div>
   
	 
    <div>
    <label>Message</label>
    <textarea name="bio"></textarea>
    </div>
    <input type="submit" name="submit" value="submit"/>
    </form>
		</div>
    ';
}
function custom_registration_shortcode() {
	ob_start();
	registration_form1( $fname, $lname, $email, $bio );
	return ob_get_clean();
	}
	add_shortcode( 'cf_gurpreet_form1', 'custom_registration_shortcode' );
	
function custom_registration_shortcode1() {
	ob_start();
	registration_form2( $fname, $lname, $phone, $email, $bio );
	return ob_get_clean();
	}
	add_shortcode( 'cf_gurpreet_form2', 'custom_registration_shortcode1' );