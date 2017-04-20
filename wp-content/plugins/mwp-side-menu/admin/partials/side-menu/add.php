<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php include ('include/data.php'); ?>
<form action="admin.php?page=<?php echo WOW_FM_SLUG; ?>" method="post" id="addtag">
	<div class="wowcolom">
		<div id="wow-leftcol">
			<div class="wow-admin">
				<input placeholder="Name for menu Item" type='text' name='title' value="<?php echo $title; ?>" class="input-100 wow-title"/>
			</div>
			<div class="tab-box wow-admin">
				<ul class="tab-nav">
					<li><a href="#t1"><i class="fa fa-cog" aria-hidden="true"></i> <?php esc_attr_e("Settings", "floating-menu") ?></a></li>		
					<li><a href="#t2"><i class="fa fa-product-hunt" aria-hidden="true"></i> <?php esc_attr_e("Pro version", "floating-menu") ?></a></li>					
				</ul>
				<div class="tab-panels">
					<div id="t1">			
						<div class="wow-admin-col">
							<div class="wow-admin-col-4"><?php esc_attr_e("Icon", "floating-menu") ?>:<br/>
								<select name="menu_icon" id="font_icon">									
									<?php
										include_once ('icon.php');										
									?>
								</select>
								<input type="hidden" value="<?php echo $menu_icon; ?>" id="menu_icon">
							</div>
							<div class="wow-admin-col-4"><?php esc_attr_e("Order", "floating-menu") ?>:<br/>
								<input  placeholder="" type='text' name='menu_order' value="<?php if($menu_order == ''){ echo '0';} else{ echo $menu_order;} ?>" onkeyup="return proverka(this);" onchange="return proverka(this);" />
							</div>
						</div>
						<div class="wow-admin-col">
							<div class="wow-admin-col-4"><?php esc_attr_e("Item type", "floating-menu") ?>:<br/>
								<select name='menu_type' onchange="changetype();">        
									<option value="link" <?php if($menu_type=='link') { echo 'selected="selected"'; } ?>><?php esc_attr_e("link", "floating-menu") ?></option>
									<option value="block" <?php if($menu_type=='block') { echo 'selected="selected"'; } ?>><?php esc_attr_e("modal window", "floating-menu") ?></option>
								</select><br/>
								<div id="block_text" style="width:80%;"><?php esc_attr_e("Make sure to set modal window to 'Click on a link or button' and 'All posts and pages'", "floating-menu") ?></div>
							</div>
							<div class="wow-admin-col-4" id="menu_type_link"><?php esc_attr_e("Link", "floating-menu") ?>:<br/>
								<input  placeholder="" type='text' name='menu_link' value="<?php echo $menu_link; ?>" />
							</div>
							<div class="wow-admin-col-4" id="menu_type_block"><?php esc_attr_e("Modal window ID", "floating-menu") ?>:<br/>
								<input  placeholder="" type='text' name='menu_id' value="<?php echo $menu_id; ?>" /><br/>
								(<b><?php esc_attr_e("e.g.", "floating-menu") ?></b>: wow-modal-id-1)
							</div>
						</div>
					</div>
					<div id="t2">
						<div class="wow-admin-col">
							<h3>Get more from the Pro version:</h3>
							<div class="wow-admin-col-12">
								<ul>
									<li>Unlimited amount of menu items</li>
									<li>Powerful styling</li>
									<li>Custom icons</li>
									<li>Powerful page-level placement</li>
									<li>Built-in social share buttons</li>
									<li>Built-in print & back-to-top buttons</li>
									<li>Show menu items depending on language (allows creating multi-language side menues)</li>
									<li>Show menu item depending on user (for all users, only for logged-in users, only for not logged-in users)</li>
									<li><a href="https://wow-estore.com/en/wow-side-menus-pro/" target="_blank">And more...</a></li>
								</ul>
							</div>	
						</div>
					</div>		
				</div>
			</div>
		</div>	
		<div id="wow-rightcol">
			<div class="wowbox">
				<h3><?php esc_attr_e("Publish", "floating-menu") ?></h3>
				<div class="wow-admin" style="display: block;">
					<div class="wowcolom">
						<div style="float:left;">
							<?php if ($id != ""){ echo '<p class="wowdel"><a href="admin.php?page='.WOW_FM_SLUG.'&info=del&did='.$id.'">Delete</a></p>';}; ?>
						</div>
						<div style="float:right;">
							<p/>
							<input name="submit" id="submit" class="button button-primary" value="<?php echo $btn; ?>" type="submit">
						</div>
					</div>
					<div class="wow-col">
						<div class="wow-col-12">
							<b><?php esc_attr_e("Item", "floating-menu") ?>: <?php echo $id; ?></b>
						</div>
					</div>
				</div>
			</div>
			<div class="wowbox">
				<h3><i class="fa fa-plug" aria-hidden="true"></i> <?php esc_attr_e("Well use with", "wow-fp-lang") ?>:</h3>
				<div class="wow-admin wow-plugins">
					<ul>						
						<li><a href="https://wordpress.org/plugins/mwp-modal-windows/" target="_blank">Popups</a></li>
						<li><a href="https://wordpress.org/plugins/mwp-forms/" target="_blank">Forms</a></li>
						<li><a href="https://wordpress.org/plugins/mwp-countdown/" target="_blank">Countdowns</a></li>	
						<li><a href="https://wordpress.org/plugins/mwp-herd-effect/" target="_blank">Herd Effect</a></li>
						<li><a href="https://wordpress.org/plugins/wow-facebook-login/" target="_blank">Facebook Login</a></li>	
					</ul>
				</div>
			</div>
			<div class="wowbox">
				<div class="wow-admin">
					<div class="wow-admin-col-12">
						<center><a href='http://wow-company.com/' target="_blank"><img src="<?php echo plugin_dir_url(__FILE__). 'img/icon.png' ?>"></a></center>
					</div>
					<div class="wow-admin-col-12 wowicon">						
						<a href='https://www.facebook.com/wowaffect/' title="Join Us on Facebook" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>												
						<a href='https://wpbiker.com/' target="_blank" title="Blog"><img src="<?php echo plugin_dir_url(__FILE__). 'img/wpbiker.png' ?>"></a>
						<a href='https://wow-estore.com' target="_blank" title="Wow-Estore"><img src="<?php echo plugin_dir_url(__FILE__). 'img/estore.png' ?>"></a>
						<a href='https://wpcalc.com/' target="_blank" title="Online Calculators"><img src="<?php echo plugin_dir_url(__FILE__). 'img/wpcalc.png' ?>"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" name="addwow" value="<?php echo $hidval; ?>" />    
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	<input type="hidden" name="wowpage" value="<?php echo WOW_FM_SLUG; ?>" />
	<input type="hidden" name="wowtable" value="<?php echo $table_menu; ?>" />	
	<input type="hidden" name="plugdir" value="<?php echo WOW_FM_BASENAME; ?>" />	
	<?php wp_nonce_field('wow_action','wow_nonce_field'); ?>
</form> 