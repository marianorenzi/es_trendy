
<?php
/**
 * @var Es_Trendy_Options_Container $es_trendy_options
 */

$i = 0;
?>

<?php if ( $data = $es_trendy_options::get_setting_values( 'search_style' ) ) : $name = 'search_style'; ?>
	<div class="es-layout-wrap">
		<div><?php _e( 'Search box style', 'es-trendy' ); ?>:</div>
		<?php foreach ( $data as $value => $label ) : $i++; ?>
			<div class="es-search-box">
				<label>
					<span class="es-sprite es-sprite-<?php echo $value; ?><?php echo $es_trendy_options->{$name} == $value ? ' es-sprite-active' : ''; ?>">
						<img src="<?php echo ES_TRENDY_ADMIN_IMAGES_URL . $value . '.jpg';?>"
					</span>
					<input type="radio" <?php checked( $value, $es_trendy_options->{$name} ); ?>
					       name="es_trendy_options[<?php echo $name; ?>]"
					       value="<?php echo $value; ?>"
					       class="js-es-layout-checkbox radio" id="es-radio-<?php echo $name . $i; ?>"/>
					<label for="es-radio-<?php echo $name . $i; ?>"><?php echo $label;?></label>
				</label>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( "Big Slogan", "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[top_big_slogan]" value="<?php echo $es_trendy_options->top_big_slogan;?>"
		       data-default-color="<?php echo $es_trendy_options->top_big_slogan;?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( "Small Slogan", "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[top_small_slogan]" value="<?php echo $es_trendy_options->top_small_slogan;?>"
		       data-default-color="<?php echo $es_trendy_options->top_small_slogan?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( "Slogan Color", "es-trendy" ); ?>:</span>
		<input type="text" name="es_trendy_options[top_slogan_color]" class="js-colorpicker" value="<?php echo $es_trendy_options->top_slogan_color;?>"
		       data-default-color="<?php echo $es_trendy_options->top_slogan_color?>"/>
	</label>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Background image', 'es-trendy' ); ?>:</span></label>
	<div class="es-image-uploader">
		<?php if ( empty( $es_trendy_options->top_background_id ) ) : ?>
			<a class='es-image-add button' href='#'>
				<?php _e( 'Select image', 'es-trendy' ); ?>
			</a>
		<?php else: ?>
			<div class="image_preview">
				<a href='#' class='remove-image'><i class="fa fa-times-circle" aria-hidden="true"></i></a>
				<?php echo wp_get_attachment_image( $es_trendy_options->top_background_id, 'thumbnail' ); ?>
			</div>
		<?php endif; ?>
		<input type="hidden"
		       name="es_trendy_options[top_background_id]" class="es-image-id"
		       value="<?php echo $es_trendy_options->top_background_id; ?>"/>
	</div>
</div>
<div class="es-settings-field">
	<label><span class="es-settings-label"><?php _e( 'Search Form Background Image', 'es-trendy' ); ?>:</span></label>
	<div class="es-image-uploader">
		<?php if ( empty( $es_trendy_options->search_background_id ) ) : ?>
			<a class='es-image-add button' href='#'>
				<?php _e( 'Select image', 'es-trendy' ); ?>
			</a>
		<?php else: ?>
			<div class="image_preview">
				<a href='#' class='remove-image'><i class="fa fa-times-circle" aria-hidden="true"></i></a>
				<?php echo wp_get_attachment_image( $es_trendy_options->search_background_id, 'thumbnail' ); ?>
			</div>
		<?php endif; ?>
		<input type="hidden"
		       name="es_trendy_options[search_background_id]" class="es-image-id"
		       value="<?php echo $es_trendy_options->search_background_id; ?>"/>
	</div>
</div>
