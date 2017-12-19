<?php

/**
 * Testimonials widget form.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Testimonials_Widget $this
 */

$amount = ! empty( $instance['amount'] ) ? $instance['amount'] : null;
$title  = ! empty( $instance['title'] ) ? $instance['title'] : null;
$attachment_id =  !empty( $instance['attachment_id'] ) ? $instance['attachment_id'] : null;

?>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title:', 'es-trendy' ); ?></label>
	<input type="text" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $title; ?>"/>
</p>
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
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'amount' ) ); ?>"><?php _e( 'Amount of the testimonials', 'es-trendy' ); ?>: </label>
	<input name="<?php echo esc_attr( $this->get_field_name( 'amount' ) ); ?>" type="text" class="widefat" value="<?php echo $amount; ?>">
</p>
<div class="es-widget-wrap es-widget__wrap">
	<?php do_action( 'es_trendy_widget_' . $this->id_base . '_page_access_block', $instance ); ?>
</div>
