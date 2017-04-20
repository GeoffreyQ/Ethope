<?php if ( ! defined( 'ABSPATH' ) ) exit;
$wow = (isset($_REQUEST["wow"])) ? sanitize_text_field($_REQUEST["wow"]) : '';
include_once( 'side-menu/menu.php' );
if ($wow == "add"){
	include_once( 'side-menu/add.php' );
	return;	
}
if ($wow == ""){
	include_once( 'side-menu/list.php' );
	return;
}

if ($wow == "discount"){
	include_once( 'side-menu/discount.php' );	
	return;
}

if ($wow == "style"){
	include_once( 'side-menu/style.php' );	
	return;
}
if ($wow == "items"){
	include_once( 'side-menu/items.php' );	
	return;
}
if ($wow == "faq"){
	include_once( 'side-menu/faq.php' );	
	return;
}

?>
</div>