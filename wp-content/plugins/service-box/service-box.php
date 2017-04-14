<?php
/**
 * Plugin Name: Service Box
 * Version: 1.1.2
 * Description:  Service Box plugin is manage your showcase of your services. Easily add unlimited services box with drag and drop builder Api.
 * Author: wpshopmart
 * Author URI: http://www.wpshopmart.com
 * Plugin URI: http://www.wpshopmart.com
 */
 
 /**
 * DEFINE PATHS
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit; 
define("wpshopmart_service_box_directory_url", plugin_dir_url(__FILE__));
define("wpshopmart_service_box_text_domain", "wpsm_servicebox");

/**
 * PLUGIN Install
 */
require_once("ink/install/installation.php");

function wpsm_servicebox_default_data() {
	
	//delete_option('servicebox_default_Settings');
	$Settings_Array = serialize( array(
		"service_acc_sec_title" 	 => "yes",
		"service_display_icon" 		 => "yes",
		"service_display_readmore"     => "yes",
		"service_title_clr"         => "#000000",
		"service_icon_clr" => "#636363",
		"service_icon_bg_clr" => "#dddddd",
		"service_des_clr" => "#7f7f7f",
		"service_readmore_clr"    => "#4c4c4c",
		"service_readmore_bg_clr"  => "#ffffff",
		"service_box_bg_clr_dsn2"  => "#e5e5e5",
		"service_title_font_size"     		 => "22",
		"service_des_font_size"     	 => "19",
		"service_readmore_font_size"     	 => "16",
		"custom_css"      =>"",
		"font_family"      =>"Open Sans",
		"sb_web_link_label"      =>"Read More",
		"sb_layout"      =>"6",
		"templates"      =>"1",
		) );

	add_option('servicebox_default_Settings', $Settings_Array);
		
}
register_activation_hook( __FILE__, 'wpsm_servicebox_default_data' );
 
/**
 * CPT CLASS
 */
require_once("ink/admin/menu.php");

/**
 * SHORTCODE
 */
require_once("template/shortcode.php"); 


?>