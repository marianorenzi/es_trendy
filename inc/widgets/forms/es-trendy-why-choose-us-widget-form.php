<?php

/**
 * Why Choose Us widget form.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Why_Choose_Us_Widget $this
 */


$background_id =  !empty( $instance['background_id'] ) ? $instance['background_id'] : null;

foreach ( $this::get_blocks_arr() as $key => $block ) {
	$page{$key}         = ! empty( $instance['page' . $key] )        ? $instance['page' . $key]          : null;
}

?>
<div class="es-image-uploader">
	<?php if ( empty( $background_id ) ) : ?>
		<a class='es-image-add button' href='#'>
			<?php _e( 'Select Background Image', 'es-trendy' ); ?>
		</a>
	<?php else:?>
		<div class="image_preview">
			<a href="#" class="remove-image"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
			<?php echo wp_get_attachment_image( $background_id, 'thumbnail' ); ?>
		</div>
	<?php endif;?>
	<input type="hidden" id="<?php echo $this->get_field_id( 'background_id' ); ?>"
	       name="<?php echo $this->get_field_name('background_id');?>" class="es-image-id"
	       value="<?php echo abs( $background_id ); ?>"/>
</div>
<?php if ( $pages = $this::get_block_pages() ) : ?>
	<?php foreach ($this::get_blocks_arr() as $key => $value):?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'page' . $key ) ); ?>"><?php _e( 'Select page for ' . $value . ' block', 'es-trendy' ); ?>:</label>
		<select name="<?php echo esc_attr( $this->get_field_name( 'page' . $key ) ); ?>" class="widefat">
			<?php foreach ( $pages as $id => $title ) : ?>
				<option <?php selected( $id, $page{$key} ); ?> value="<?php echo $id; ?>"><?php echo $title; ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<?php endforeach;?>
<?php endif; ?>
<div class="es-widget-wrap es-widget__wrap">
	<?php do_action( 'es_trendy_widget_' . $this->id_base . '_page_access_block', $instance ); ?>
</div>
