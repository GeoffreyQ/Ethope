<?php
/**
 * Plugin Name:       Wow Side Menu
 * Plugin URI:        https://wordpress.org/plugins/mwp-side-menu/
 * Description:       Add fixed side menu buttons to your website!
 * Version:           2.2.1
 * Author:            Wow-Company
 * Author URI:        http://wow-company.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       floating-menu
  */
if ( ! defined( 'WPINC' ) ) {die;}
if ( ! defined( 'WOW_FM_NAME' ) ) {	
	define( 'WOW_FM_NAME', 'Wow Side Menu' );
	define( 'WOW_FM_SLUG', 'floating-menu' );
	define( 'WOW_FM_VERSION', '2.2' );
	define( 'WOW_FM_BASENAME', dirname(plugin_basename(__FILE__)) );
	define( 'WOW_FM_DIR', plugin_dir_path( __FILE__ ) );
	define( 'WOW_FM_URL', plugin_dir_url( __FILE__ ) );
	
}
function wow_plugin_activate_fm() {
	require_once plugin_dir_path( __FILE__ ) . 'include/activator.php';		
	}	
register_activation_hook( __FILE__, 'wow_plugin_activate_fm' );
function wow_plugin_deactivate_fm() {	
	require_once plugin_dir_path( __FILE__ ) . 'include/deactivator.php';
}
register_deactivation_hook( __FILE__, 'wow_plugin_deactivate_fm' );
if( !class_exists( 'JavaScriptPacker' )) {
	require_once plugin_dir_path( __FILE__ ) . 'include/class.JavaScriptPacker.php';
}
if( !class_exists( 'WOWWPClass' )) {
	require_once plugin_dir_path( __FILE__ ) . 'include/wowclass.php';
}
require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
require_once plugin_dir_path( __FILE__ ) . 'public/public.php';
function wow_row_meta_fm( $meta, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $meta;
	$meta[] = '<a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a> | <a href="https://wow-estore.com/" target="_blank">Wow-Estore</a>';
	return $meta; 
}
add_filter( 'plugin_row_meta', 'wow_row_meta_fm', 10, 4 );
function wow_action_links_fm( $actions, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $actions;
	$settings_link = '<a href="admin.php?page='.WOW_FM_SLUG.'">Settings</a>'; 
	array_unshift( $actions, $settings_link ); 
	return $actions; 
}
add_filter( 'plugin_action_links', 'wow_action_links_fm', 10, 2 );