<?php
	global $wpdb;
	$table_menu = $wpdb->prefix . "mwp_side_menu_free";
	$info = (isset($_REQUEST["info"])) ? $_REQUEST["info"] : '';
	if ($info == "saved") {
		echo "<div class='updated' id='message'><p><strong>". __("Item Add", "floating-menu")."</strong>.</p></div>";
	}
	if ($info == "update") {
		echo "<div class='updated' id='message'><p><strong>". __("Record Updated", "floating-menu")."</strong>.</p></div>";
	}
	if ($info == "del") {
		$delid = $_GET["did"];
		$wpdb->query("delete from " . $table_menu . " where id=" . $delid);
		echo "<div class='updated' id='message'><p><strong>". __("Record Deleted", "floating-menu")."</strong>.</p></div>";
	}
	$resultat = $wpdb->get_results("SELECT * FROM " . $table_menu . " order by id asc");
	$count = count($resultat);
?>
<div class="wow">
	<h1><?php echo WOW_FM_NAME; ?> <a href='https://www.facebook.com/wowaffect/' target="_blank" title="Join us on Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></h1>
	<ul class="wow-admin-menu">
		<li><a href='admin.php?page=<?php echo WOW_FM_SLUG; ?>'><?php esc_attr_e("List", "floating-menu") ?></a></li>
		<li>
			<?php if($count<3){?>
				<a href='admin.php?page=<?php echo WOW_FM_SLUG; ?>&wow=add' ><?php esc_attr_e("Add New", "floating-menu") ?></a>
			<?php } ?>
		</li>
		<li><a href='admin.php?page=<?php echo WOW_FM_SLUG; ?>&wow=style'><?php esc_attr_e("Style", "floating-menu") ?></a></li>
		<li><a href='admin.php?page=<?php echo WOW_FM_SLUG; ?>&wow=discount'><b><?php esc_attr_e("Pro version", "floating-menu") ?></b></a></li>
		<li><a href='admin.php?page=<?php echo WOW_FM_SLUG; ?>&wow=items'><b><?php esc_attr_e("Free Plugins", "floating-menu") ?></b></a></li>
		<li><a href='admin.php?page=<?php echo WOW_FM_SLUG; ?>&wow=faq'><b><?php esc_attr_e("FAQ", "floating-menu") ?></b></a></li>
		
	</ul>		