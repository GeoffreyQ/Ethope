<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
	function wow_admin_menu_fm() {
		/* Adding  Menus */
		add_menu_page(WOW_FM_NAME, __( WOW_FM_NAME, "floating-menu"), 'manage_options', WOW_FM_SLUG, 'wow_page_fm', 'dashicons-menu', null);		
	}
	add_action('admin_menu', 'wow_admin_menu_fm');
	function wow_page_fm() {
		global $wow_plugin_free;	
		$wow_plugin_free = true;
		include_once( 'partials/side-menu.php' );
		wp_enqueue_style('wow-style', plugin_dir_url(__FILE__) . 'css/style.css');
		wp_enqueue_script('jquery-add-side-menu', plugin_dir_url(__FILE__) . 'js/add.js', array('jquery'));
		wp_enqueue_style( 'side-menu-font-awesome', plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.min.css');
		wp_enqueue_script('fonticonpicker', plugin_dir_url(__FILE__) . 'fonticonpicker/jquery.fonticonpicker.min.js', array('jquery'));
		wp_enqueue_style('fonticonpicker', plugin_dir_url(__FILE__) . 'fonticonpicker/css/jquery.fonticonpicker.min.css');
		wp_enqueue_style('fonticonpicker-darkgrey', plugin_dir_url(__FILE__) . 'fonticonpicker/jquery.fonticonpicker.darkgrey.min.css');
	}
	
	
	if ( ! function_exists ( 'wow_nonce_chek' ) ) {
		function wow_nonce_chek() {
			if (isset($_POST['wow_nonce_field'])) {
				if ( !empty($_POST) && wp_verify_nonce($_POST['wow_nonce_field'],'wow_action') && current_user_can('manage_options'))
				{
					wow_run_wowwpclass();
				}
			}
		}
		add_action( 'plugins_loaded', 'wow_nonce_chek' );
		
		function wow_run_wowwpclass(){
			$objItem = new WOWWPClass();
			$addwow = (isset($_REQUEST["addwow"])) ? sanitize_text_field($_REQUEST["addwow"]) : '';
			$table_name = sanitize_text_field($_REQUEST["wowtable"]);
			$wowpage = sanitize_text_field($_REQUEST["wowpage"]);
			$id = sanitize_text_field($_POST['id']);
			/*  Save and update Record on button submission */
			if (isset($_POST["submit"])) {	
				if (sanitize_text_field($_POST["addwow"]) == "1") {
					$objItem->addNewItem($table_name, $_POST);			
					header("Location:admin.php?page=".$wowpage."&info=saved");
					exit;		
					} else if (sanitize_text_field($_POST["addwow"]) == "2") {
					$objItem->updItem($table_name, $_POST);				
					header("Location:admin.php?page=".$wowpage."&wow=add&act=update&id=".$id."&info=update");		
					exit;
				}
			}
		}
	}
	
	if ( ! function_exists ( 'wow_plugins_admin_footer_text' ) ) {
		function wow_plugins_admin_footer_text( $footer_text ) {
			global $wow_plugin_free;
			if ( $wow_plugin_free == true ) {
				$rate_text = sprintf( '<span id="footer-thankyou">Developed by <a href="http://wow-company.com/" target="_blank">Wow-Company</a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a> | <a href="https://wow-estore.com/" target="_blank">Wow-Estore</a></span>'
				);
				return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
			}
			else {
				return $footer_text;
			}	
		}
		add_filter( 'admin_footer_text', 'wow_plugins_admin_footer_text' );
	}		