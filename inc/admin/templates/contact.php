<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Send Message slug', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[send_message_slug]" value="<?php echo $es_trendy_options->send_message_slug; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'User notification header', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[message_sent_header]" value="<?php echo $es_trendy_options->message_sent_header; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( "User notification text", "es-trendy" ); ?>:</span>
		<?php
		$settings = array( 'media_buttons' => false, 'wpautop' => false, 'textarea_name' => 'es_trendy_options[message_sent_text]' );
		wp_editor( $es_trendy_options->message_sent_text, 'message_sent_text', $settings );
		?>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Tel Title', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[tel_title]" value="<?php echo $es_trendy_options->tel_title; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Tel Number', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[contact_tel]" value="<?php echo $es_trendy_options->contact_tel; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Email Title', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[email_title]" value="<?php echo $es_trendy_options->email_title; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Email', "es-trendy" ); ?>:</span>
		<input type="email" name="es_trendy_options[contact_email]" value="<?php echo $es_trendy_options->contact_email; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Address Title', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[address_title]" value="<?php echo $es_trendy_options->address_title; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Address', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[contact_address]" value="<?php echo $es_trendy_options->contact_address; ?>"/>
	</label>
</div>