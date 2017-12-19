<?php

/**
 * Latest News widget form.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Latest_News_Widget_Widget $this
 */

$title  = ! empty( $instance['title'] ) ? $instance['title'] : null;

?>
<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title:', 'es-trendy' ); ?></label>
	<input type="text" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo $title; ?>"/>
</p>
<div class="es-widget-wrap es-widget__wrap">
	<?php do_action( 'es_trendy_widget_' . $this->id_base . '_page_access_block', $instance ); ?>
</div>
