<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Page 404 background image', 'es-trendy' ); ?>:</span></label>
	<div class="es-image-uploader">
		<?php if ( empty( $es_trendy_options->not_found_background_id ) ) : ?>
			<a class='es-image-add button' href='#'>
				<?php _e( 'Select image', 'es-trendy' ); ?>
			</a>
		<?php else: ?>
			<div class="image_preview">
				<a href='#' class='remove-image'><i class="fa fa-times-circle" aria-hidden="true"></i></a>
				<?php echo wp_get_attachment_image( $es_trendy_options->not_found_background_id, 'thumbnail' ); ?>
			</div>
		<?php endif; ?>
		<input type="hidden"
		       name="es_trendy_options[not_found_background_id]" class="es-image-id"
		       value="<?php echo $es_trendy_options->not_found_background_id; ?>"/>
	</div>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( '404 Page title', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[not_found_title]" value="<?php echo $es_trendy_options->not_found_title; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( "404 Page text", "es-trendy" ); ?>:</span>
		<?php
		$settings = array( 'media_buttons' => false, 'wpautop' => false, 'textarea_name' => 'es_trendy_options[not_found_text]' );
		wp_editor( stripslashes( $es_trendy_options->not_found_text ), 'not_found_text', $settings );
		?>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( '404 Button label', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[not_found_button_label]" value="<?php echo $es_trendy_options->not_found_button_label; ?>"/>
	</label>
</div>