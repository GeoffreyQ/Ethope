<div class="wowbox">
    <div class="inside wow-admin" style="display: block;">
		<form method="post" name="send_modal" action="options.php">
			<?php wp_nonce_field('update-options'); ?>
			<?php $options = get_option('style_side_menu'); ?> 
			<div class="wow-admin-col">	
				<div class="wow-admin-col-4"><?php esc_attr_e("Menu position", "wow-marketings") ?>: <br/>
					<select name='style_side_menu[position]' onchange="changetype();">        
						<option value="left" <?php if($options['position']=='left') { echo 'selected="selected"'; } ?>><?php esc_attr_e("right", "wow-marketings") ?></option>
						<option value="right" <?php if($options['position']=='right') { echo 'selected="selected"'; } ?>><?php esc_attr_e("left", "wow-marketings") ?></option>        
					</select>
				</div>
				
			</div>				
		</div>
	</div>
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="style_side_menu" />
	<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
</form>
