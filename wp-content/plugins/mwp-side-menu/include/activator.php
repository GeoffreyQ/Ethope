<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
global $wpdb;
    $table_menu = $wpdb->prefix . "mwp_side_menu_free";
    $MSQL = "show tables like '$table_menu'";
    if ($wpdb->get_var($MSQL) != $table_menu) {
        $sql = "CREATE TABLE IF NOT EXISTS $table_menu (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				title VARCHAR(200) NOT NULL,
				menu_type TEXT,
				menu_link TEXT,
				menu_id  TEXT,
				menu_icon  TEXT,
				menu_order  TEXT,				
				UNIQUE KEY id (id)
				) ";
        require_once(ABSPATH . "wp-admin/includes/upgrade.php");
        dbDelta($sql);
    }		
	$style_side_menu = array(
	    'position' => 'left'		
		);
	add_option('style_side_menu', $style_side_menu);
?>