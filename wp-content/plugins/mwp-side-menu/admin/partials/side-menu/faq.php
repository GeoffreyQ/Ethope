<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<p style="color: #43cb83; font-size:36px; margin-top:0px; padding-top:0px;">Frequently Asked Questions</p>

<div class="wow-admin-col" style="font-size:18px;">
	<div class="wow-admin-col-12">
		<h4><span class="dashicons dashicons-editor-help"></span> How to open 'Modal Window' via a Side Menu?</h4>
		Install plugin <a href="https://wordpress.org/plugins/mwp-modal-windows/" target="_blank">Wow Modal Window</a>
		<ul>
			<li>Create a modal window</li>
			<li>In the option 'Show a modal window' select -> Click on a link (with id)</li>
			<li>Copy and paste the shortcode, such as [Wow-Modal-Windows id=1], to where you want the modal window to appear.</li>
			<li>Create Side Menu Item</li>
			<li>In the option 'Item type' select -> modal window</li>
			<li>Then enter which modal window to show. Enter Modal window ID such as <b>wow-modal-id-1</b></li>
			<li>Save Menu Item</li>			
		</ul>
		<h4><span class="dashicons dashicons-editor-help"></span> How to hide side menu on mobile?</h4>
		You can paste the code into a style for hide the side menu on mobile<p/>
		
		<code>
		@media screen and (max-width: 480px) { 
		.wp-side-menu {display:none;}
		}
		</code>		
		
		<h4><span class="dashicons dashicons-sos"></span> Support</h4>		
		Got something to say? Need help?<p />
		
		<a href="https://wordpress.org/support/plugin/mwp-side-menu" target="_blank" class="wow-btn">View support forum</a>	
		
		
		
		
		
	</div>
</div>