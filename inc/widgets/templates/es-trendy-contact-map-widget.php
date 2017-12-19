<?php

/**
 * Contact map widget.
 *
 * @var array $instance
 * @var array $args
 * @var Es_Trendy_Contact_Map_Widget $this
 */

echo $args['before_widget']; ?>

	<div class="es-widget-wrapper">

		<?php do_action( 'es_before_contact_map_widget' ); ?>

		<div class="contact-block__map">
			<div class="js-contact-map"></div>
		</div>

		<?php do_action( 'es_after_contact_map_widget' ); ?>
	</div>
<?php echo $args['after_widget'];
