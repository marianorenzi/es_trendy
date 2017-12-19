<?php $avaliable_settings = Es_Trendy_Options_Container::get_available_settings();?>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( "Main Theme Color", "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[theme_color]" class="js-colorpicker" value="<?php echo $es_trendy_options->theme_color?>"
		       data-default-color="<?php echo $avaliable_settings['theme_color']['default_value'];?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Logo', 'es-trendy' ); ?>:</span></label>
	<div class="es-image-uploader">
        <?php if ( !empty( $es_trendy_options->logo_attachment_id ) &&  wp_get_attachment_image( $es_trendy_options->logo_attachment_id, 'thumbnail' )) : ?>
            <div class="image_preview" style="background-color:<?php echo $es_trendy_options->theme_color;?>">
                <a href='#' class='remove-image'><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                <?php echo wp_get_attachment_image( $es_trendy_options->logo_attachment_id, 'thumbnail' ); ?>
            </div>
        <?php else:?>
            <a class='es-image-add button' href='#'>
                <?php _e( 'Select image', 'es-trendy' ); ?>
            </a>
        <?php endif; ?>
		<input type="hidden"
		       name="es_trendy_options[logo_attachment_id]" class="es-image-id"
		       value="<?php echo $es_trendy_options->logo_attachment_id; ?>"/>
	</div>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Favicon', 'es-trendy' ); ?>:</span></label>
	<div class="es-image-uploader favicon-upload">
		<?php if ( empty( $es_trendy_options->favicon_attachment_id ) ) : ?>
			<a class='es-image-add button' href='#'>
				<?php _e( 'Select image', 'es-trendy' ); ?>
			</a>
		<?php else: ?>
			<div class="image_preview">
				<a href='#' class='remove-image'><i class="fa fa-times-circle" aria-hidden="true"></i></a>
				<?php echo wp_get_attachment_image( $es_trendy_options->favicon_attachment_id, 'original' ); ?>
			</div>
		<?php endif; ?>
		<input type="hidden"
		       name="es_trendy_options[favicon_attachment_id]" class="es-image-id"
		       value="<?php echo $es_trendy_options->favicon_attachment_id; ?>"/>
	</div>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( "Custom CSS", "es-trendy" ); ?>:</span>
		<textarea name="es_trendy_options[option_css]"><?php echo stripcslashes( $es_trendy_options->option_css ); ?></textarea>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'News per page', 'es-trendy' ); ?>:</span>
		<input type="number" value="<?php echo $es_trendy_options->news_per_page; ?>" min="1" name="es_trendy_options[news_per_page]">
	</label>
</div>
<!--<div class="es-settings-field">
	<label><span class="es-settings-label"><?php /*_e( 'Show breadcrumbs', 'es-trendy' ); */?>:</span>
		<input type="hidden" name="es_trendy_options[show_breadcrumbs]" value="0"/>
		<input type="checkbox" <?php /*checked( (bool)$es_trendy_options->show_breadcrumbs, true ); */?> name="es_trendy_options[show_breadcrumbs]" value="1" class="es-trendy-switch-input">
	</label>
</div>-->
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Copyright', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[copyright]" value="<?php echo $es_trendy_options->copyright; ?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Google map API key:', "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[google_map_api_key]" value="<?php echo $es_trendy_options->google_map_api_key; ?>"/>
	</label>
	<span><i><a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank"><?php _e( 'How to get key', 'es-trendy ');?></a></i></span>
</div>
