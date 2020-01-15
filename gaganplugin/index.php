<?php
/**
 * @package gaganplugin
 * @version 1.7.2
 */
/*
Plugin Name: Gaganplugin
Plugin URI: http://wordpress.org/plugins/gaganplugin/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Gagandeep
Version: 1.7.2
Author URI: http://gagan.tt/
*/


function wpb_adding_styles() {
wp_register_style('my_stylesheet', plugins_url('gaganplugin/styles.css', __FILE__));
wp_enqueue_style('my_stylesheet');
}
add_action( 'wp_enqueue_scripts', 'wpb_adding_styles' );  



add_action("admin_menu", "addmenu");
function addMenu()
{
  add_menu_page("Gagan Plugin", "Gagan Plugin", 4, "example-options", "exampleMenu" );
  add_submenu_page("example_options", "Option 1", "Option 1", 4, "example-option-1", "option1");

}
function exampleMenu(){
?>
       <div class="wrap">
       <h4> Gagan Plugin Coming Soon </h4>
       <table class="widefat">
        <thead>
    <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
  </thead>
</table>
</div>
<?php
}
