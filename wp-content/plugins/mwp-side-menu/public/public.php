<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	add_action( 'wp_footer', 'wow_show_fm');
	function wow_show_fm() { 
		$options = get_option('style_side_menu');   	
		global $wpdb;    
		$table_menu = $wpdb->prefix . "mwp_side_menu_free";
		$sSQL = "select * from $table_menu ORDER BY menu_order ASC";
		$arrresult = $wpdb->get_results($sSQL); 
		if (count($arrresult) > 0 && count($arrresult) < 4) {
			echo '<div class="wp-side-menu">';
			foreach ($arrresult as $key => $val) {
				if ($options['position'] == 'left'){			
					include( 'partials/left.php' );	
				}
				else {
					include( 'partials/right.php' );
				}
			}
			echo '</div>';
		}	
		return;
	}
		
	add_action( 'wp_head', 'wow_head_fm');
	function wow_head_fm() {
		wp_enqueue_script( WOW_FM_SLUG, plugin_dir_url( __FILE__ ) . 'js/side-menu.js', array('jquery'), WOW_FM_VERSION);
		wp_enqueue_style( WOW_FM_SLUG, plugin_dir_url( __FILE__ ) . 'css/style.css', array(), WOW_FM_VERSION);
		$options = get_option('style_side_menu');
		if ($options['position'] == 'left'){
			wp_enqueue_style( WOW_FM_SLUG. '-left', plugin_dir_url( __FILE__ ) . 'css/left.css', array(), WOW_FM_VERSION);
		}
		else {
			wp_enqueue_style( WOW_FM_SLUG. '-right', plugin_dir_url( __FILE__ ) . 'css/right.css', array(), WOW_FM_VERSION);
		}
		wp_enqueue_style( 'font-awesome-4.7', plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.min.css', array(), '4.7.0');
	}