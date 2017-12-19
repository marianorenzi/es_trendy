<?php

/**
 * Join Us widget form.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Why_Choose_Us_Widget $this
 */

$page = ! empty( $instance['page'] ) ? $instance['page'] : null;
$attachment_id =  !empty( $instance['attachment_id'] ) ? $instance['attachment_id'] : null;
?>
<?php if ( $pages = $this::get_block_pages() ) : ?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'page' ) ); ?>"><?php _e( 'Select page for block', 'es-trendy' ); ?>:</label>
		<select name="<?php echo esc_attr( $this->get_field_name( 'page' ) ); ?>" class="widefat">
			<?php foreach ( $pages as $id => $title ) : ?>
				<option <?php selected( $id, $page ); ?> value="<?php echo $id; ?>"><?php echo $title; ?></option>
			<?php endforeach; ?>
		</select>
	</p>
<?php endif; ?>
<div class="es-image-uploader">
	<?php if ( empty($instance['attachment_id']) ) : ?>
		<a class='es-image-add button' href='#'>
			<?php _e( 'Select Background Image', 'es-trendy' ); ?>
		</a>
	<?php else:?>
		<div class="image_preview">
			<a href="#" class="remove-image"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
			<?php echo wp_get_attachment_image( $attachment_id, 'thumbnail' ); ?>
		</div>
	<?php endif;?>
	<input type="hidden" id="<?php echo $this->get_field_id( 'attachment_id' ); ?>"
	       name="<?php echo $this->get_field_name('attachment_id');?>" class="es-image-id"
	       value="<?php echo abs( $attachment_id ); ?>"/>
</div>
<div class="es-widget-wrap es-widget__wrap">
	<?php do_action( 'es_trendy_widget_' . $this->id_base . '_page_access_block', $instance ); ?>
</div>
